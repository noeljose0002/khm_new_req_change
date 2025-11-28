<?php
$parent_id = session('parent_id');
$user_name = session('user_name');
$hierarchy_id = session('hierarchy_id');

if($is_confirmed && $parent_id < 11){
    $dis_abled = "";
}
else{
    $dis_abled = 'style="pointer-events: none; background-color: #eee;"';
}
?>
<style>
.nav-pills-custom .nav-link {
    color: #aaa;
    background: #fff;
    position: relative;
}

.nav-pills-custom .nav-link.active {
    color: #45b649;
    background: #fff;
}

@media (min-width: 992px) {
    .nav-pills-custom .nav-link::before {
        content: '';
        display: block;
        border-top: 8px solid transparent;
        border-left: 10px solid #fff;
        border-bottom: 8px solid transparent;
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translateY(-50%);
        opacity: 0;
    }
}

.nav-pills-custom .nav-link.active::before {
    opacity: 1;
}
</style>
<style>
    .small-labels {
        font-size: 0.7em;
        font-style: italic;
        color: #333;
        padding: 0px 0px;
}
</style>
<section class="py-5 header">
    <div class="container py-4" style="width: 99% !important;">
        <div class="row">
            <div class="col-md-3" style="width: 19% !important;">
                <!-- Tabs nav -->
                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fa fa-user-circle"></i>
                        <span class="font-weight-bold small text-uppercase">Reassign</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fa fa-star mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Status History</span></a>

                    <!--<a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <i class="fa fa-calendar-minus"></i>
                        <span class="font-weight-bold small text-uppercase">Reminders</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <i class='fas fa-times-circle'></i>
                        <span class="font-weight-bold small text-uppercase">Set Reminders</span></a>-->
                    </div>
            </div>


            <div class="col-md-9" style="width: 80% !important;">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" style="padding: 1rem !important;">
                        <h6 class="font-italic mb-4"><b style="color:#339933">Assigned Users</b></h6>
                        <?php if(!empty($more_enq)){ ?>
                            <table class="table table-sm table-bordered">
                                <thead style="background-color:#c6ecd9;color:#fff">
                                    <tr>
                                        <th>User Role</th><th>Assigned to</th><th>Edit Request</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // Load Dashboard model once
                                    $Dashboard_model = new \App\Models\Dashboard_m();
                                    
                                    foreach($more_enq as $key => $val){ 
                                        $user_role = "";
                                        $role_id_to_fetch = null;
                                        
                                        // Determine user role and corresponding role_id to fetch
                                        if($val['current_status_id'] == 1){
                                            $user_role = "Executive";
                                            $role_id_to_fetch = 5; // Executive role
                                        }
                                        elseif($val['current_status_id'] == 13){
                                            $user_role = "SOP";
                                            $role_id_to_fetch = 8; // Sales Operation Executive role
                                        }
                                        elseif($val['current_status_id'] == 14){
                                            $user_role = "TOP";
                                            $role_id_to_fetch = 10; // Transport Executive role
                                        }
                                        elseif($val['current_status_id'] == 8){
                                            $user_role = "SOP(Availability Check)";
                                            $role_id_to_fetch = 8; // Sales Operation Executive role
                                        }
                                        
                                        // Fetch users based on role and current assignment
                                        // Admin sees all, Team Leads see only their team members
                                        $users_for_row = [];
                                        if($role_id_to_fetch) {
                                            $users_for_row = $Dashboard_model->get_employees_by_role($role_id_to_fetch, $val['assigned_to']);
                                        }
                                        ?>
                                        <tr>
                                            <td><label class="small-labels"><?php echo $user_role; ?></label></td>
                                            
                                            <?php if($hierarchy_id == 5){ ?>
                                                <!-- Executives (hierarchy_id = 5) can only view, not reassign -->
                                                <td><label class="small-labels" id="lblexecutive"><?php echo $val['entity_name']; ?></label></td>
                                            <?php } else { ?>
                                                <!-- Admin and Team Leads can reassign -->
                                                <td>
                                                    <?php if(!empty($users_for_row)) { ?>
                                                        <select class="form-control input-sm reassign_executive" 
                                                                id="reassign_executive_id_<?php echo $key; ?>" 
                                                                data-pid="<?php echo $val['current_status_id']; ?>" 
                                                                data-enq-id="<?php echo $enquiry_header_id; ?>"
                                                                data-current-assigned="<?php echo $val['assigned_to']; ?>">
                                                            <option value="">Select User</option>
                                                            <?php 
                                                            foreach ($users_for_row as $keys => $vals) { 
                                                                $selected = ($vals['entity_id'] == $val['assigned_to']) ? 'selected' : '';
                                                            ?>
                                                                <option value="<?php echo $vals['entity_id'] ?>" <?php echo $selected; ?>>
                                                                    <?php echo $vals['entity_name'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } else { ?>
                                                        <label class="small-labels"><?php echo !empty($val['entity_name']) ? $val['entity_name'] : 'No users available'; ?></label>   
                                                    <?php } ?>
                                                </td>
                                            <?php } ?>

                                            <!-- Edit Request Column (only for SOP roles) -->
                                            <?php if($user_role == "SOP" || $user_role == "SOP(Availability Check)"){ ?>
                                                <td>
                                                    <?php if(!empty($edit_reasons)) { ?>
                                                        <select class="form-control input-sm edit_request" 
                                                                id="edit_request_id_<?php echo $key; ?>" 
                                                                data-oid="<?php echo $object_id; ?>" 
                                                                data-pid="<?php echo $val['current_status_id']; ?>" 
                                                                data-enq-id="<?php echo $enquiry_header_id; ?>" 
                                                                <?php echo $dis_abled; ?>>
                                                            <option value="">Select Reason</option>
                                                            <?php foreach ($edit_reasons as $ekeys => $evals) { ?>
                                                                <option value="<?php echo $evals['edit_request_reason_id'] ?>">
                                                                    <?php echo $evals['edit_request_reason'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } else { ?>
                                                        <label class="small-labels">NA</label>
                                                    <?php } ?>
                                                </td>
                                            <?php } else { ?>
                                                <td><label class="small-labels">NA</label></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="alert alert-info">No enquiry details found.</div>
                        <?php } ?>
                    </div>
                    
                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" style="padding: 1rem !important;">
                        <h6 class="font-italic mb-4"><b style="color:#339933">Status History</b></h6>
                        <?php if(!empty($status_history)){ ?>
                            <table class="table table-bordered" style="width:100%">  
                                <thead style="background-color:#c6ecd9;color:#fff;">
                                    <tr>
                                        <th>Si No</th>
                                        <th>Status</th>
                                        <th>Date & time</th>
                                        <th>Assigned to</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($status_history as $fkey => $fval) { ?>
                                        <tr>
                                            <td><label class="small-labels"><?php echo $fkey+1; ?></label></td>
                                            <td><label class="small-labels"><?php echo $fval['status_name']; ?></label></td>
                                            <td><label class="small-labels"><?php echo date('d-m-Y h:i A', strtotime($fval['updated_time'])); ?></label></td>
                                            <td><label class="small-labels"><?php echo $fval['entity_name']; ?></label></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="alert alert-info">No status history found.</div>
                        <?php } ?>
                    </div>
                    
                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" style="padding: 1rem !important;">
                       
                    </div>
                    
                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" style="padding: 1rem !important;">
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>