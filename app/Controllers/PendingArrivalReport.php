<?php

namespace App\Controllers;

use App\Models\PendingArrivalReportModel;
use App\Models\Dashboard_m;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use CodeIgniter\Controller;

class PendingArrivalReport extends Controller
{
    /** @var PendingArrivalReportModel */
    protected $PendingArrivalReportModel;

    // automatically available helpers:
    protected $helpers = ['url', 'date'];

    /**
     * CI4 will call this with the real Request, Response & Logger.
     */
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        // Do NOT remove this
        parent::initController($request, $response, $logger);

        // now it's safe to use $this->request, $this->response, $this->logger
        $this->PendingArrivalReportModel = new PendingArrivalReportModel();
    }

    public function index()
    {
        $Dashboard_model = new Dashboard_m();
        $entity_id = session('user_id');
        $active_role = session('active_role');
        $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
        $all_systems = $Dashboard_model->get_all_systems($entity_id);
        $data['all_systems'] = $all_systems;
        if(!empty($all_roles)){
            $data['all_roles_assn'] = $all_roles;
            $all_menus = $Dashboard_model->get_all_role_menus($active_role);
            if(!empty($all_menus)){
                $data['all_menus'] = $all_menus;
            }
            else{
                $data['all_menus'] = [];
            }
            $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role,3);
            if(!empty($all_permissions)){
                $data['all_permissions'] = $all_permissions;
            }
            else{
                $data['all_permissions'] = [];
            }
        }
        else{
            $data['all_roles_assn'] = [];
            $data['all_menus'] = [];
            $data['all_permissions'] = [];
        }
        $parent_menu = $Dashboard_model->get_parent_menus();
        $sub_menu = $Dashboard_model->get_sub_menus();
        $data['parent_menu'] = $parent_menu;
        $data['sub_menu'] = $sub_menu;

        return view('masters/pendingarrival_report_list',$data);
    }

   public function data()
    {
        $fromRaw = $this->request->getGet('from_date');
        $toRaw   = $this->request->getGet('to_date');
        $system  = $this->request->getGet('system');

        // Parse dates
        $fromDt = \DateTime::createFromFormat('d-m-Y', $fromRaw);
        $toDt   = \DateTime::createFromFormat('d-m-Y', $toRaw);
        if (! $fromDt || ! $toDt) {
            return $this->response->setJSON(['data' => []]);
        }

        // Normalize: from start of day
        $fromYmd = $fromDt->format('Y-m-d') . ' 00:00:00';
        // Normalize: to end of original day by adding one day at midnight
        $toDt->modify('+1 day')->setTime(0, 0, 0);
        $toYmd = $toDt->format('Y-m-d H:i:s');

        // Fetch data using 2-arg signature
        $rows = $this->PendingArrivalReportModel->getByDateRange($fromYmd, $toYmd,$system);

        return $this->response->setJSON(['data' => $rows]);
    }


    

   
}
?>
