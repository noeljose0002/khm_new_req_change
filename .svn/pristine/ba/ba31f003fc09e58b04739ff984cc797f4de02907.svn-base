
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Assign Permission to the menu <?php echo $p_trans_name; ?> of <?php echo $p_role_name; ?> role</div>
									</div>
									<div class="card-body">

										<input type="hidden" id="p_role_id" value="<?php echo $p_role_id; ?>">
										<input type="hidden" id="p_trans_id" value="<?php echo $p_trans_id; ?>">
										<input type="hidden" id="p_trans_name" value="<?php echo $p_trans_name; ?>">
										<input type="hidden" id="p_role_name" value="<?php echo $p_role_name; ?>">
										<div class="table-responsive forminputs-dt ">
											<table id="entity-role-datatable" class="table table-bordered text-nowrap">
												<thead>
													<tr>
														<th>Permission</th>
														<th>Select</th>
														
													</tr>
												</thead>
												<tbody>
													
														<tr>
															<td>Add</td>
															<?php if(!empty($per_exist)){ 
																$checked = "";
																foreach($per_exist as $key => $val){
																	if($val['pro_permission_id'] == 1){
																		$checked = "checked";
																	}
																}
																?>
																<td><input type="checkbox" class="entity-per-input" value="1" <?php echo $checked; ?>></td>
															<?php } else { ?>
																<td><input type="checkbox" class="entity-per-input" value="1"></td>
															<?php } ?>
														</tr>
														<tr>
															<td>Modify</td>
															<?php if(!empty($per_exist)){ 
																$checked = "";
																foreach($per_exist as $key => $val){
																	if($val['pro_permission_id'] == 2){
																		$checked = "checked";
																	}
																}
																?>
																<td><input type="checkbox" class="entity-per-input" value="2" <?php echo $checked; ?>></td>
															<?php } else { ?>
																<td><input type="checkbox" class="entity-per-input" value="2"></td>
															<?php } ?>
														</tr>
														<tr>
															<td>View</td>
															<?php if(!empty($per_exist)){ 
																$checked = "";
																foreach($per_exist as $key => $val){
																	if($val['pro_permission_id'] == 3){
																		$checked = "checked";
																	}
																}
																?>
																<td><input type="checkbox" class="entity-per-input" value="3" <?php echo $checked; ?>></td>
															<?php } else { ?>
																<td><input type="checkbox" class="entity-per-input" value="3"></td>
															<?php } ?>
														</tr>
														<tr>
															<td>Print</td>
															<?php if(!empty($per_exist)){ 
																$checked = "";
																foreach($per_exist as $key => $val){
																	if($val['pro_permission_id'] == 4){
																		$checked = "checked";
																	}
																}
																?>
																<td><input type="checkbox" class="entity-per-input" value="4" <?php echo $checked; ?>></td>
															<?php } else { ?>
																<td><input type="checkbox" class="entity-per-input" value="4"></td>
															<?php } ?>
														</tr>
														<tr>
															<td>Delete</td>
															<?php if(!empty($per_exist)){ 
																$checked = "";
																foreach($per_exist as $key => $val){
																	if($val['pro_permission_id'] == 5){
																		$checked = "checked";
																	}
																}
																?>
																<td><input type="checkbox" class="entity-per-input" value="5" <?php echo $checked; ?>></td>
															<?php } else { ?>
																<td><input type="checkbox" class="entity-per-input" value="5"></td>
															<?php } ?>
														</tr>
														<tr>
															<td>Analyze</td>
															<?php if(!empty($per_exist)){ 
																$checked = "";
																foreach($per_exist as $key => $val){
																	if($val['pro_permission_id'] == 6){
																		$checked = "checked";
																	}
																}
																?>
																<td><input type="checkbox" class="entity-per-input" value="6" <?php echo $checked; ?>></td>
															<?php } else { ?>
																<td><input type="checkbox" class="entity-per-input" value="6"></td>
															<?php } ?>
														</tr>
														<tr>
															<td>Execute</td>
															<?php if(!empty($per_exist)){ 
																$checked = "";
																foreach($per_exist as $key => $val){
																	if($val['pro_permission_id'] == 7){
																		$checked = "checked";
																	}
																}
																?>
																<td><input type="checkbox" class="entity-per-input" value="7" <?php echo $checked; ?>></td>
															<?php } else { ?>
																<td><input type="checkbox" class="entity-per-input" value="7"></td>
															<?php } ?>
														</tr>
												
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

