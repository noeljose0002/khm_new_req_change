													
													<table class="table table-bordered table-responsive-md table-striped mb-0 text-nowrap">
																	
																					<tr style="background-color:#c8ead9;">
																					
																						<th class="">Room Details</th>
																						<th class="">Meal Plan</th>
																						<th class="">Room Tariff</th>
																						<th class="">Child With Bed</th>
																						<th class="">Child Without Bed</th>
																						<th class="">Extra Bed</th>
																						<th class="">Action</th>
																					</tr>
																			
																					<?php 
																					if(!empty($tariff_data)){
																					
																					foreach($tariff_data as $key => $val){
																						$tot_rows = count($tariff_data);
																						$tot_row = ($tot_rows / 4) + 1;
																						$pid = $val['hotel_room_meal_id'];
																						$room_id = $val['room_id']; // Get the room ID

																						// Assign a background color based on room_id
																						$background_color = match($room_id % $tot_row) { 
																							0 => "#eceef4", 
																							1 => "#d1e0e0", 
																							2 => "#eceef4",
																							3 => "#d1e0e0",
																							default => "#fff",
																						}; 
																						?>
																						<tr>
																							<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><?php echo $val['room_category_name']; ?> -> <?php echo $val['room_type_name']; ?></td>
																							<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><?php echo $val['meal_plan_name']; ?></td>
																							<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><?php echo $val['tariff']; ?></td>
																							<?php if(!empty($tariff_exist)){ 
																								$c_temp = 0;
																								$cw_temp = 0;
																								$e_temp = 0;
																								
																								foreach($tariff_exist as $key1 => $val1){ 
																									if($val['hotel_room_meal_id'] == $val1['hotel_room_meal_id']){
																										if($val1['pax_id'] == 1){
																											$c_temp = $val1['exclusive_tariff'];
																										}
																										if($val1['pax_id'] == 2){
																											$cw_temp = $val1['exclusive_tariff'];
																										}
																										if($val1['pax_id'] == 3){
																											$e_temp = $val1['exclusive_tariff'];
																										}
																										
																									}
																								}	
																								
																								?>
																								<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="c<?php echo $pid; ?>" value="<?php echo $c_temp; ?>" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																								<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="cw<?php echo $pid; ?>" value="<?php echo $cw_temp; ?>" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																								<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="e<?php echo $pid; ?>" value="<?php echo $e_temp; ?>" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																							<?php } else { ?>
																								<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="c<?php echo $pid; ?>" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																								<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="cw<?php echo $pid; ?>" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																								<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="e<?php echo $pid; ?>" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																							<?php } ?>
																							<td style="background-color:<?php echo $background_color; ?>;">
																								<button type="button" class="btn btn-dark btn-rounded btn-sm my-0"  onclick="save_room_pax(<?php echo $pid; ?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"><i class="fa fa-save"></i></button>
																							</td>
																						</tr>
																					<?php } } else { ?>
																						<tr>
																							<td colspan="7" style="text-align:center;">No basic tariff added to the room yet</td>
																						</tr>
																					<?php } ?>
																				</table>

																