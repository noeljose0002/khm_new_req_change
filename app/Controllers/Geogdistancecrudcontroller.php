<?php 
namespace App\Controllers;

use App\Models\Geogdistancecrudmodel;
use CodeIgniter\Controller;
use App\Models\Dashboard_m;

class Geogdistancecrudcontroller extends Controller
{
    public function index()
    {
        $Dashboard_model = new Dashboard_m();
        $entity_id      = session('user_id');
        $active_role    = session('active_role');
        $data['all_systems']      = $Dashboard_model->get_all_systems($entity_id);
        $data['all_roles_assn']   = $Dashboard_model->get_all_entity_roles($entity_id) ?: [];
        $data['all_menus']        = $Dashboard_model->get_all_role_menus($active_role) ?: [];
        $data['all_permissions']  = $Dashboard_model->get_all_entity_permissions($active_role, 3) ?: [];
        $data['parent_menu']      = $Dashboard_model->get_parent_menus();
        $data['sub_menu']         = $Dashboard_model->get_sub_menus();
        $data['geographies']      = $this->getGeographies();

        return view('masters/geog_distance_crud', $data);
    }
    
    private function getGeographies()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('khm_loc_mst_geography')
                      ->where('deleted', 0);
        return $builder->get()->getResult();
    }
    
    public function getAll()
    {
        $model   = new Geogdistancecrudmodel();
        $records = $model->where('deleted', 0)->findAll();
        return $this->response->setJSON($records);
    }
    
    public function create()
    {
        $model    = new Geogdistancecrudmodel();
        $postData = $this->request->getPost();
        $fromId   = $postData['geog_from_id'] ?? null;
        $toId     = $postData['geog_to_id']   ?? null;
        $distance = $postData['geog_km_distance'] ?? null;

        // Validate inputs (allow 0)
        if (
            empty($fromId) ||
            empty($toId) ||
            !isset($distance) ||
            !is_numeric($distance) ||
            $distance < 0
        ) {
            return $this->response
                        ->setStatusCode(422)
                        ->setJSON(['status' => 'error', 'message' => 'Invalid input data']);
        }

        // Check existing directions
        $existsAB = $model
            ->where(['geog_from_id' => $fromId, 'geog_to_id' => $toId, 'deleted' => 0])
            ->countAllResults() > 0;
        $existsBA = $model
            ->where(['geog_from_id' => $toId, 'geog_to_id' => $fromId, 'deleted' => 0])
            ->countAllResults() > 0;

        if ($existsAB && $existsBA) {
            // Both already exist → duplicate create
            return $this->response
                        ->setStatusCode(409)
                        ->setJSON(['status' => 'duplicate']);
        }

        // Insert A → B if missing
        if (! $existsAB) {
            $model->insert([
                'geog_from_id'    => $fromId,
                'geog_to_id'      => $toId,
                'geog_km_distance'=> $distance
            ]);
        }

        // Insert B → A if missing
        if (! $existsBA) {
            $model->insert([
                'geog_from_id'    => $toId,
                'geog_to_id'      => $fromId,
                'geog_km_distance'=> $distance
            ]);
        }

        return $this->response
                    ->setJSON(['status' => 'success']);
    }
    
    public function update()
    {
        $model    = new Geogdistancecrudmodel();
        $postData = $this->request->getPost();
        $fromId   = $postData['geog_from_id'] ?? null;
        $toId     = $postData['geog_to_id']   ?? null;
        $distance = $postData['geog_km_distance'] ?? null;

        // Validate inputs (allow 0)
        if (
            empty($fromId) ||
            empty($toId) ||
            !isset($distance) ||
            !is_numeric($distance) ||
            $distance < 0
        ) {
            return $this->response
                        ->setStatusCode(422)
                        ->setJSON(['status' => 'error', 'message' => 'Invalid input data']);
        }

        // Update A → B
        $model
            ->where(['geog_from_id' => $fromId, 'geog_to_id' => $toId])
            ->set('geog_km_distance', $distance)
            ->update();

        // Update B → A
        $model
            ->where(['geog_from_id' => $toId, 'geog_to_id' => $fromId])
            ->set('geog_km_distance', $distance)
            ->update();

        return $this->response
                    ->setJSON(['status' => 'success']);
    }
    
    public function delete()
    {
        $id    = $this->request->getPost('geog_dist_id');
        $model = new Geogdistancecrudmodel();
        $model->update($id, ['deleted' => 1]);
        return $this->response->setJSON(['status' => 'success']);
    }
    
    public function getRecord()
    {
        $id     = $this->request->getPost('geog_dist_id');
        $model  = new Geogdistancecrudmodel();
        $record = $model->find($id);
        return $this->response->setJSON($record);
    }
}
