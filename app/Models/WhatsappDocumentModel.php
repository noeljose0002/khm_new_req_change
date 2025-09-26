<?php

namespace App\Models;

use CodeIgniter\Model;

class WhatsappDocumentModel extends Model
{
    protected $table            = 'khm_obj_mst_whatsapp_document';
    protected $primaryKey       = 'whatsapp_document_id';
    protected $allowedFields    = [
        'object_id', 
        'template_name', 
        'template_path', 
        'deleted', 
        'enterprise_id'
    ];
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    /**
     * Get all active WhatsApp document templates.
     */
    public function getActiveDocuments()
    {
        return $this->where('deleted', 0)
                    ->orderBy('whatsapp_document_id', 'DESC')
                    ->findAll();
    }
    
    /**
     * Insert a new WhatsApp document record.
     * Also creates a corresponding master object record (khm_obj_mst)
     * with object_type_id=5 and object_class_id=18.
     */
    public function insertDocument($templateName, $templatePath, $enterpriseId)
    {
        $db = \Config\Database::connect();

        // 1) Insert into the master object table (khm_obj_mst)
        $builderObj = $db->table('khm_obj_mst');
        $dataObj = [
            'object_type_id'   => 5,
            'object_class_id'  => 18,
            'object_name'      => $templateName, // using template name as object name
            'deleted'       => 0,
            'enterprise_id'    => $enterpriseId
        ];
        $builderObj->insert($dataObj);
        $objectId = $db->insertID();

        // 2) Insert into whatsapp document table
        $data = [
            'object_id'      => $objectId,
            'template_name'  => $templateName,
            'template_path'  => $templatePath,
            'deleted'        => 0,
            'enterprise_id'  => $enterpriseId
        ];
        return $this->insert($data);
    }

    /**
     * Update an existing WhatsApp document record.
     * Also updates the corresponding record in the master table.
     */
    public function updateDocument($id, $templateName, $templatePath, $enterpriseId)
    {
        // Update in this table
        $this->update($id, [
            'template_name' => $templateName,
            'template_path' => $templatePath,
            'enterprise_id' => $enterpriseId
        ]);

        // Update the master object record
        $db  = \Config\Database::connect();
        $row = $this->find($id);
        if ($row && isset($row['object_id'])) {
            $objectId   = $row['object_id'];
            $builderObj = $db->table('khm_obj_mst');
            $builderObj->where('object_id', $objectId)
                       ->update(['object_name' => $templateName]);
        }
        return true;
    }

    /**
     * Soft-delete a WhatsApp document record.
     * Also soft-deletes the corresponding master object record.
     */
    public function softDeleteDocument($id)
    {
        // Soft-delete in this table
        $this->update($id, ['deleted' => 1]);

        // Soft-delete in master table
        $db  = \Config\Database::connect();
        $row = $this->find($id);
        if ($row && isset($row['object_id'])) {
            $objectId   = $row['object_id'];
            $builderObj = $db->table('khm_obj_mst');
            $builderObj->where('object_id', $objectId)
                       ->update(['deleted' => 1]);
        }
        return true;
    }
}
