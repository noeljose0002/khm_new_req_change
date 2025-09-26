			
						<input type="hidden" id="hidden_entity_id" value="<?php echo $entity_id; ?>">
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Assign Roles to <?php echo $entity_name; ?></div>
									</div>
									<div class="card-body">
										<div class="table-responsive forminputs-dt ">
											<table id="entity-role-datatable" class="table table-bordered text-nowrap">
												<thead>
													<tr>
														<th>Role Name</th>
														<th>Select</th>
														<th>Team Lead</th>
														
													</tr>
												</thead>
												<tbody>
													<?php foreach($all_roles as $key => $val){ 
														$checked = "";
													
														$team_lead_exist = 0;
														?>
														<tr>
															<td><?php echo $val['role_name']; ?></td>
															<td>
																<?php if(empty($assigned_roles)) { ?>
																	<input type="checkbox" class="entity-role-input" value="<?php echo $val['role_id']; ?>" data-role-id="<?php echo $val['role_id']; ?>">
																<?php } else { 
																	foreach($assigned_roles as $keys => $vals){
                                                                         if($val['role_id'] == $vals['role_id']){
																			$checked = "checked";
																			if($vals['team_lead_id']){
																				$team_lead_exist = $vals['team_lead_id'];
																			}
																			
																		 }
																	}
																	?>
																	<input type="checkbox" class="entity-role-input" value="<?php echo $val['role_id']; ?>" data-role-id="<?php echo $val['role_id']; ?>" <?php echo $checked; ?>>
																<?php } ?>
															</td>
															<td>
																<?php if($val['role_id'] == 5 || $val['role_id'] == 8 || $val['role_id'] == 10){ 
																	if($val['role_id'] == 5 ) {
																		if(!empty($team_leads)){
																	?>
																			<select class="form-control input-sm team-lead-select" data-role-id="<?php echo $val['role_id']; ?>">
																				<option value="0">Select</option>
																				<?php
																					foreach ($team_leads as $keys1 => $vals1) {
																						if($team_lead_exist == $vals1['entity_id']){
																							echo '<option value="' . $vals1['entity_id'] . '" selected>' . $vals1['entity_name'] . '</option>';
																						}
																						else{
																							echo '<option value="' . $vals1['entity_id'] . '">' . $vals1['entity_name'] . '</option>';
																						}
																					}
																				?>
																			</select>
																<?php }
																      else{ ?>
																	  		<select class="form-control input-sm team-lead-select" data-role-id="<?php echo $val['role_id']; ?>">
																				<option value="0">Team Leads not found</option>
																			</select>
																<?php }
																	} 
															        else if($val['role_id'] == 8){ 
																	if(!empty($sop_leads)){	
																	?>
																		<select class="form-control input-sm team-lead-select" data-role-id="<?php echo $val['role_id']; ?>">
																			<option value="0">Select</option>
																				<?php
																					foreach ($sop_leads as $keys2 => $vals2) {
																						if($team_lead_exist == $vals2['entity_id']){
																							echo '<option value="' . $vals2['entity_id'] . '" selected>' . $vals2['entity_name'] . '</option>';
																						}
																						else{
																							echo '<option value="' . $vals2['entity_id'] . '">' . $vals2['entity_name'] . '</option>';
																						}
																					}
																				?>
																		</select>
																<?php } else { ?>
																		<select class="form-control input-sm team-lead-select" data-role-id="<?php echo $val['role_id']; ?>">
																			<option value="0">SOP Leads not found</option>
																		</select>
																<?php }
																	}
																else { 
																	if(!empty($top_leads)){	
																?>
																		<select class="form-control input-sm team-lead-select" data-role-id="<?php echo $val['role_id']; ?>">
																			<option value="0">Select</option>
																				<?php
																					foreach ($top_leads as $keys3 => $vals3) {
																						if($team_lead_exist == $vals3['entity_id']){
																							echo '<option value="' . $vals3['entity_id'] . '" selected>' . $vals3['entity_name'] . '</option>';
																						}
																						else{
																							echo '<option value="' . $vals3['entity_id'] . '">' . $vals3['entity_name'] . '</option>';
																						}
																					}
																				?>
																		</select>
																<?php } else { ?>
																		<select class="form-control input-sm team-lead-select" data-role-id="<?php echo $val['role_id']; ?>">
																			<option value="0">TOP Leads not found</option>
																		</select>
																<?php }
																}
															} else { ?>
																<select class="form-control input-sm team-lead-select" data-role-id="<?php echo $val['role_id']; ?>" style="display:none;">
																	<option value="0">No data</option>
																</select>
															<?php } ?>
															</td>
															
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

