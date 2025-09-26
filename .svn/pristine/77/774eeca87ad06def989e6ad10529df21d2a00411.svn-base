						<input type="hidden" id="hidden_entity_id" value="<?php echo $entity_id; ?>">
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Assign transaction to <?php echo $role_name; ?> role of <?php echo $entity_name; ?></div>
									</div>
									<div class="card-body">
										<div class="table-responsive forminputs-dt ">
											<table id="entity-role-datatable" class="table table-bordered text-nowrap">
												<thead>
													<tr>
														<th>transaction Name</th>
														<th>Select</th>
														
													</tr>
												</thead>
												<tbody>
													<?php foreach($all_trans as $key => $val){ 
														$checked = "";
														?>
														<tr>
															<td><?php echo $val['entity_trans_name']; ?></td>
															<td>
																<?php if(empty($assigned_trans)) { ?>
																	<input type="checkbox" class="entity-role-input" value="<?php echo $val['entity_trans_id']; ?>">
																<?php } else { 
																	foreach($assigned_roles as $keys => $vals){
                                                                         if($val['entity_trans_id'] == $vals['entity_trans_id']){
																			$checked = "checked";
																		 }
																	}
																	?>
																	<input type="checkbox" class="entity-role-input" value="<?php echo $val['entity_trans_id']; ?>" <?php echo $checked; ?>>
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

