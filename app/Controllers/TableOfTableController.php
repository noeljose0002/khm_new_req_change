<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TableModel;

class TableOfTableController extends Controller
{
    public function index()
    {
        return view('table_view');
    }

    // Get all tables with their fields
    public function getItems()
    {
        $model = new TableModel();

        try {
            // findAll() in a soft-delete enabled model automatically excludes soft-deleted records
            $tables = $model->findAll();
            log_message('debug', 'Found tables: ' . json_encode($tables));

            if (empty($tables)) {
                return $this->response->setStatusCode(404)->setJSON([
                    'success' => false,
                    'message' => 'No records found.',
                ]);
            }

            foreach ($tables as &$table) {
                $fieldsResult = $model->getTableWithFields($table['table_id']);
                log_message('debug', 'Fields for table_id ' . $table['table_id'] . ': ' . json_encode($fieldsResult));
                $table['fields'] = [];

                foreach ($fieldsResult as $row) {
                    if (!empty($row->table_field_id)) {
                        $table['fields'][] = [
                            'name'           => $row->table_field_name,
                            'type'           => $row->table_field_type,
                            'attribute_type' => $row->attribute_type,
                        ];
                    }
                }
            }

            return $this->response->setJSON($tables);
        } catch (\Exception $e) {
            log_message('error', 'Database error in getItems(): ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'A database error occurred. Please try again later.',
            ]);
        }
    }

    // Add a new table and its fields
    public function addItem()
    {
        helper(['form', 'url']);

        $data = json_decode(file_get_contents('php://input'), true);

        // Base validation rules for the table
        $validation = \Config\Services::validation();
        $rules = [
            'table_name'    => 'required|min_length[3]|max_length[255]|regex_match[/^(?=.*[A-Za-z]).+$/]',
            'enterprise_id' => 'required|integer'
        ];
        // If fields exist and are not empty, validate each field
        if (isset($data['fields']) && is_array($data['fields']) && count($data['fields']) > 0) {
            $rules['fields.*.name']           = 'required|min_length[3]|max_length[255]|regex_match[/^(?=.*[A-Za-z]).+$/]';
            $rules['fields.*.type']           = 'required';
            $rules['fields.*.attribute_type'] = 'required';
        }

        if (!$validation->setRules($rules)->run($data)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Validation failed. Ensure all required fields are correctly formatted.'
            ]);
        }

        $model = new TableModel();
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $tableData = [
                'table_name'    => $data['table_name'],
                'enterprise_id' => $data['enterprise_id'],
            ];

            $tableId = $model->insertTable($tableData);
            if (!$tableId) {
                throw new \Exception('Failed to insert table.');
            }

            if (isset($data['fields']) && is_array($data['fields']) && count($data['fields']) > 0) {
                foreach ($data['fields'] as $field) {
                    $fieldData = [
                        'table_id'         => $tableId,
                        'table_field_name' => $field['name'],
                        'table_field_type' => $field['type'],
                        'attribute_type'   => $field['attribute_type'],
                        'enterprise_id'    => $data['enterprise_id'],
                    ];

                    if (!$model->insertField($fieldData)) {
                        throw new \Exception('Failed to insert field.');
                    }
                }
            }

            $db->transComplete();
            if ($db->transStatus() === false) {
                throw new \Exception('Transaction failed.');
            }

            return $this->response->setJSON(['success' => true]);
        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error in addItem: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    // Update an existing record including its fields
    public function updateItem($id)
    {
        helper(['form', 'url']);

        $data = json_decode(file_get_contents('php://input'), true);

        // Base validation rules for the table
        $validation = \Config\Services::validation();
        $rules = [
            'table_name'    => 'required|min_length[3]|max_length[255]|regex_match[/^(?=.*[A-Za-z]).+$/]',
            'enterprise_id' => 'required|integer'
        ];
        // If fields exist and are not empty, validate each field
        if (isset($data['fields']) && is_array($data['fields']) && count($data['fields']) > 0) {
            $rules['fields.*.name']           = 'required|min_length[3]|max_length[255]|regex_match[/^(?=.*[A-Za-z]).+$/]';
            $rules['fields.*.type']           = 'required';
            $rules['fields.*.attribute_type'] = 'required';
        }

        if (!$validation->setRules($rules)->run($data)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Validation failed. Ensure all required fields are correctly formatted.'
            ]);
        }

        $model = new TableModel();
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $model->update($id, [
                'table_name'    => $data['table_name'],
                'enterprise_id' => $data['enterprise_id'],
            ]);

            // Soft delete existing fields for this table
            $model->deleteFields($id);

            // Insert new fields if provided
            if (isset($data['fields']) && is_array($data['fields']) && count($data['fields']) > 0) {
                foreach ($data['fields'] as $field) {
                    $fieldData = [
                        'table_id'         => $id,
                        'table_field_name' => $field['name'],
                        'table_field_type' => $field['type'],
                        'attribute_type'   => $field['attribute_type'],
                        'enterprise_id'    => $data['enterprise_id'],
                    ];
                    $model->insertField($fieldData);
                }
            }

            $db->transComplete();
            if ($db->transStatus() === false) {
                throw new \Exception('Transaction failed.');
            }

            return $this->response->setJSON(['success' => true]);
        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error in updateItem: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    // Delete a record by soft deleting both the table and its associated fields.
    public function deleteItem($id)
    {
        $model = new TableModel();
        $db = \Config\Database::connect();

        try {
            // Soft delete associated fields
            $model->deleteFields($id);
            
            // Soft delete the main table (soft delete is enabled in the model)
            if (!$model->delete($id)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Delete failed.'
                ]);
            }

            return $this->response->setJSON(['success' => true]);
        } catch (\Exception $e) {
            log_message('error', 'Delete error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Delete operation failed: ' . $e->getMessage(),
            ]);
        }
    }
}
