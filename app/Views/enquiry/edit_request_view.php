<div>
    <?php if(!empty($er_det)){ ?>
                            <table class="table table-sm table-bordered">
                                <thead style="background-color:#c6ecd9;color:#fff">
                                    <tr>
                                        <th>Edit Request Reason</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($er_det as $key => $val){ 
                                        ?>
                                        <tr>
                                            <td><label class="small-labels"><?php echo $val['edit_request_reason_name']; ?></label></td>
                                            <td>
                                                <select class="form-control input-sm edit_request_action" id="edit_request_action" data-oid="<?php echo $object_id; ?>" data-id="<?php echo $val['enquiry_edit_request_id']; ?>" data-enq-id="<?php echo $val['enquiry_header_id']; ?>">
                                                    <option value="">Select</option>
                                                    <option value="1">Accept</option>
                                                    <option value="3">Reject</option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } 
                        else { ?>
                            <label class="small-labels">No Edit Request Exist</label>
                        <?php }
                        ?>
                </div>