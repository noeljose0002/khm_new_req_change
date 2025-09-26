<?php
use App\Models\Enquiry_m;
$Enquiry_model = new Enquiry_m();
$dep_name = $Enquiry_model->getLocationNamebyid($object_det[0]['departure_location']);
if (!empty($iti_cost_datas[0]['costing_sheet'])) {
?>
<textarea name="cost_sheet_template" id="cost_sheet_template" style="width:100%; height:1000px;"><?php echo $iti_cost_datas[0]['costing_sheet']; ?></textarea>
<?php } else { ?>
<textarea name="cost_sheet_template" id="cost_sheet_template" style="width:100%; height:1000px;"> 
    <div class="container">
      
        <table style="width:100%;border-collapse: collapse;">  
            <tr>
                <td style="background-color:#ffe680;color:black;"><b>Guest Name</b></td>
                <td style="background-color:#ffe680;color:black;"><b><?php echo $object_det[0]['guest_name']; ?></b></td>
               
                <?php if($object_det[0]['enq_type_id'] == 3){ ?>
                    <td style="background-color:#ffe680;color:black;"><b>Agent Name</b></td>
                    <td style="background-color:#ffe680;color:black;"><b><?php echo $object_det[0]['agent_name']; ?></b></td>
                <?php } ?>
            </tr>
        </table>
           <?php 
		   $rt_count = 0;
			if($object_det[0]['no_of_double_room'] > 0){
				$rt_count = $rt_count + 1;
			}
			if($object_det[0]['no_of_single_room'] > 0){
				$rt_count = $rt_count + 1;
			}
		   ?>
                        <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                          
                                 <tr>
                                    <td colspan="22" style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Accommodation</b></td>
                                </tr>
								
                                <tr>
                                    <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Day</b></td>
                                    <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Date</b></td>
                                    <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Destination</b></td>
									
                                    <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Remarks</b></td>
                                    <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Hotel</b></td>
                                    <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Room Category</b></td>
                                    <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Meal Plan</b></td>
								
									
									<td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>No Of Adult</b></td>

                                    <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Room Type</b></td>
                                    <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>No:Of Rooms</b></td>
                                  
                                    <td style="text-align:right;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Adult Rate</b></td>
									<?php if($object_det[0]['no_of_child_with_bed'] > 0){ ?>
                                        <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>No:Of Child with Bed</b></td>
                                        <td style="text-align:right;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Child with Bed Rate</b></td>
                                    <?php } ?>
										
									<?php if($object_det[0]['no_of_child_without_bed'] > 0){ ?>
                                        <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>No:Of Child without Bed</b></td>
                                        <td style="text-align:right;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Child without Bed Rate</b></td>
									<?php } ?>
									<?php if($object_det[0]['no_of_extra_bed'] > 0){ ?>
                              
                                        <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>No:Of Extra Bed</b></td>
                                        <td style="text-align:right;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Extra Bed Rate</b></td>
									<?php } ?>	
                                  
                                    <td style="text-align:right;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Total</b></td>
                                </tr>
                         
                            <?php 
							$special_event_count = 0;
							$addon_count = 0;
                            $k = 1;
                            $sum = 0;
                            $gtot = 0;
							$ss_name_temp = '';
							$itinerary_details_save_count = count($iti_data)-1;
                            foreach($iti_data as $key => $val) {
								if($key < $itinerary_details_save_count){ 
								$hot_det_count = json_decode($val['hotel_details']);
								if(!empty($val['special_event_name'])){
									$special_event_count = $special_event_count + 1;
								}
								$json_addons = json_decode($val['json_addons'],true);
								if(!empty($json_addons)){
									$addon_count = $addon_count + 1;
								}
								foreach($val['cost'] as $ckey => $cval) { 
									if($cval['cost_component_id'] == "6" && $cval['room_type_id'] == "2"){
										$room_t_d = $cval['tariff'];
									}
									if($cval['cost_component_id'] == "12" && $cval['room_type_id'] == "2"){
										$child_t_d = $cval['tariff'];
									}
									if($cval['cost_component_id'] == "15" && $cval['room_type_id'] == "2"){
										$child_wb_t_d = $cval['tariff'];
									}
									if($cval['cost_component_id'] == "9" && $cval['room_type_id'] == "2"){
										$extra_t_d = $cval['tariff'];
									}

									if($cval['cost_component_id'] == "6" && $cval['room_type_id'] == "1"){
										$room_t_s = $cval['tariff'];
									}
									if($cval['cost_component_id'] == "12" && $cval['room_type_id'] == "1"){
										$child_t_s = $cval['tariff'];
									}
									if($cval['cost_component_id'] == "15" && $cval['room_type_id'] == "1"){
										$child_wb_t_s = $cval['tariff'];
									}
									if($cval['cost_component_id'] == "9" && $cval['room_type_id'] == "1"){
										$extra_t_s = $cval['tariff'];
									}
									if($cval['cost_component_id'] == "18" && $cval['room_type_id'] == "1"){
										$facility_id = $cval['tariff'];
										/*if(!empty($cval['tariff']) || !empty($hot_det_count)){
											$addon_count = $addon_count + 1;
										}*/
									}
									if($cval['cost_component_id'] == "19" && $cval['room_type_id'] == "1"){
										$facility_tafiff = $cval['tariff'];
									}
									if($cval['cost_component_id'] == "17" && $cval['room_type_id'] == "1"){
										$spcl_tariff = $cval['tariff'];
									}
									if($cval['cost_component_id'] == "21" && $cval['room_type_id'] == "1"){
										$sight_seeing_id = $cval['tariff'];
										$ss_name = $Enquiry_model->getSightName($sight_seeing_id);
										if(!empty($ss_name)){
											$ss_name_temp = $ss_name[0]['object_name'];
										}
										else{
											$ss_name_temp = "";
										}
									}
								}
								$dtotal = ($val['double_room']*$room_t_d) + ($val['child_with_bed']*$child_t_d) + ($val['child_without_bed']*$child_wb_t_d) + ($val['extra_bed']*$extra_t_d);
								$stotal = $val['single_room']*$room_t_s;
								
								?>
								<tr>
								<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $k; ?></td>
								<td rowspan="<?php echo $rt_count; ?>" style="text-align:center;border:1px solid black;"><?php echo date("d-m-Y", strtotime($val['tour_date'])); ?></td>
								<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val['geog_name']; ?></td>
								
								<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val['remarks']; ?></td>
								<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val['object_name']?$val['object_name']:"Own Arrangements"; ?></td>
								<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val['room_category_name']; ?></td>
								<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val['meal_plan_name']; ?></td>
								
								<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $object_det[0]['no_of_adult']; ?></td>
								<?php 
								    if($object_det[0]['no_of_double_room'] > 0) { ?>
										<td style="border:1px solid black;">Double</td>
										<td style="border:1px solid black;"><?php echo $val['double_room']; ?></td>
										
										<td style="border:1px solid black;"><?php echo $room_t_d; ?></td>
										<?php if($object_det[0]['no_of_child_with_bed'] > 0){ ?>
											<td style="border:1px solid black;"><?php echo $val['child_with_bed']; ?></td>
											<td style="border:1px solid black;"><?php echo $child_t_d; ?></td>
										<?php } ?>
										<?php if($object_det[0]['no_of_child_without_bed'] > 0){ ?>	
											<td style="border:1px solid black;"><?php echo $val['child_without_bed']; ?></td>
											<td style="border:1px solid black;"><?php echo $child_wb_t_d; ?></td>
										<?php } ?>
										<?php if($object_det[0]['no_of_extra_bed'] > 0){ ?>	
											<td style="border:1px solid black;"><?php echo $val['extra_bed']; ?></td>
											<td style="border:1px solid black;"><?php echo $extra_t_d; ?></td>
										<?php } ?>	
										<td style="border:1px solid black;text-align:right;"><?php echo $dtotal; ?></td>
										</tr>
								<?php } ?>
								<?php 
								    if($object_det[0]['no_of_single_room'] > 0) { 
										if($object_det[0]['no_of_double_room'] > 0) {
										?>
									    <tr>
										<?php } ?>
										<td style="border:1px solid black;">Single</td>
										<td style="border:1px solid black;"><?php echo $val['single_room']; ?></td>
									
										<td style="border:1px solid black;"><?php echo $room_t_s; ?></td>
										<?php if($object_det[0]['no_of_child_with_bed'] > 0){ ?>	
											<td style="border:1px solid black;">0</td>
											<td style="border:1px solid black;"><?php echo $child_t_s; ?></td>
										<?php } ?>
										<?php if($object_det[0]['no_of_child_without_bed'] > 0){ ?>	
											<td style="border:1px solid black;">0</td>
											<td style="border:1px solid black;"><?php echo $child_wb_t_s; ?></td>
										<?php } ?>
										<?php if($object_det[0]['no_of_extra_bed'] > 0){ ?>	
											<td style="border:1px solid black;">0</td>
											<td style="border:1px solid black;"><?php echo $extra_t_s; ?></td>
										<?php } ?>	
										<td style="border:1px solid black;text-align:right;"><?php echo $stotal; ?></td>
										</tr>
								<?php } 
								$hot_details = json_decode($val['hotel_details']);
								if(!empty($hot_details)){ 
									foreach($hot_details as $key1 => $val1) { 
										if($val1->tour_date == $val['tour_date']){
											$dtotal1 = ($val1->double*$val1->d_adult_rate) + ($val1->no_of_ch*$val1->d_child_rate) + ($val1->no_of_cw*$val1->d_child_wb_rate) + ($val1->no_of_extra*$val1->d_extra_bed_rate);
											$stotal1 = $val1->single*$val1->s_adult_rate;
									?>
									<tr>
									<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo "Day ".$k; ?></td>
									<td rowspan="<?php echo $rt_count; ?>" style="text-align:center;border:1px solid black;"><?php echo date("d-m-Y", strtotime($val['tour_date'])); ?></td>
									<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val['geog_name']; ?></td>
								
									<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val1->remarks; ?></td>
									<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val1->hotel_name; ?></td>
									<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val1->room_category_name; ?></td>
									<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $val['meal_plan_name']; ?></td>
								
									<td rowspan="<?php echo $rt_count; ?>" style="border:1px solid black;"><?php echo $object_det[0]['no_of_adult']; ?></td>
									<?php 
										if($object_det[0]['no_of_double_room'] > 0) { ?>
											<td style="border:1px solid black;">Doubles</td>
											<td style="border:1px solid black;"><?php echo $val1->double; ?></td>
											
											<td style="border:1px solid black;"><?php echo $val1->d_adult_rate; ?></td>
											<?php if($object_det[0]['no_of_child_with_bed'] > 0){ ?>
												<td style="border:1px solid black;"><?php echo $val1->no_of_ch; ?></td>
												<td style="border:1px solid black;"><?php echo $val1->d_child_rate; ?></td>
											<?php } ?>
											<?php if($object_det[0]['no_of_child_without_bed'] > 0){ ?>		
												<td style="border:1px solid black;"><?php echo $val1->no_of_cw; ?></td>
												<td style="border:1px solid black;"><?php echo $val1->d_child_wb_rate; ?></td>
											<?php } ?>
											<?php if($object_det[0]['no_of_extra_bed'] > 0){ ?>		
												<td style="border:1px solid black;"><?php echo $val1->no_of_extra; ?></td>
												<td style="border:1px solid black;"><?php echo $val1->d_extra_bed_rate; ?></td>
											<?php } ?>		
											<td style="border:1px solid black;text-align:right;"><?php echo $dtotal1; ?></td>
											</tr>
									<?php } ?>
									<?php 
										if($object_det[0]['no_of_single_room'] > 0) { ?>
										<tr>
											<td style="border:1px solid black;">Single</td>
											<td style="border:1px solid black;"><?php echo $val1->single; ?></td>
											
											<td style="border:1px solid black;"><?php echo $val1->s_adult_rate; ?></td>
											<?php if($object_det[0]['no_of_child_with_bed'] > 0){ ?>
												<td style="border:1px solid black;">0</td>
												<td style="border:1px solid black;"><?php echo $val1->s_child_rate; ?></td>
											<?php } ?>
											<?php if($object_det[0]['no_of_child_without_bed'] > 0){ ?>			
												<td style="border:1px solid black;">0</td>
												<td style="border:1px solid black;"><?php echo $val1->s_child_wb_rate; ?></td>
											<?php } ?>
											<?php if($object_det[0]['no_of_extra_bed'] > 0){ ?>			
												<td style="border:1px solid black;">0</td>
												<td style="border:1px solid black;"><?php echo $val1->s_extra_bed_rate; ?></td>
											<?php } ?>		
											<td style="border:1px solid black;text-align:right;"><?php echo $stotal1; ?></td>
											</tr>
									<?php } 
										}
									}
								}
								$k = $k + 1;
							} }
								?>
                        </table> 
						<br/>
						<?php 
							if($addon_count > 0){ 
								$fac_count = 1;
								?>
								<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
						  			<tr>
							 			<td colspan="6" style="text-align:center;background-color:#ffe680;color:black;"><b>Hotel Facility Tariff</b></td>
						 			</tr>
									<tr>
                                    	<td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Si No</b></td>
                                    	<td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Date</b></td>
										<td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Destination</b></td>
										<td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Hotel</b></td>
										<td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Hotel Facility</b></td>
										<td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Tariff</b></td>
									</tr>
									<?php
									$fac_name_temp = "";
								
									    foreach($iti_data as $keyh => $valh) { 
										
											$addon_tourDate = $valh['tour_date'];
													$addonDetailsAll = json_decode($valh['json_addons'] ?? '[]');						
													$addon_events = array_filter(
														$addonDetailsAll,
														fn($v) => $v->tour_date == $addon_tourDate
													);

													if (!$addon_events) { continue; }
													foreach ($addon_events as $adn) { ?>
										<tr>
											<td style="border:1px solid black;"><?php echo $fac_count++; ?></td>
											<td style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($valh['tour_date'])); ?></td>
											<td><?php echo $valh['geog_name']; ?></td>
											<td><?php echo $valh['object_name']; ?></td>
											<td><?php echo $adn->addon_event; ?></td>
											<td><?php echo $adn->addon_tariff; ?></td>
										</tr>
									<?php } }
								        $dhot_details = json_decode($valh['hotel_details']);
										if(!empty($dhot_details)){ 
											foreach($dhot_details as $keyd => $vald) { 
												if($vald->tour_date == $valh['tour_date']){
													if(!empty($vald->hotfac)){
														$fac_name = $Enquiry_model->getHotelFacilityName($vald->hotfac);
														if(!empty($fac_name)){
															$fac_name_temp = $fac_name[0]['facility_name'];
														}
													//}
												?>
                                    	<tr>
											<td style="border:1px solid black;"><?php echo $fac_count++; ?></td>
											<td style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($vald->tour_date)); ?></td>
											<td style="border:1px solid black;"><?php echo $fac_name_temp; ?></td>
											<td style="border:1px solid black;"><?php echo $vald->fac_rate; ?></td>
										</tr>

										<?php	
													}
												}	
											}
										}
								
								 ?>	
								</table>
						<?php
							}
						?>
						<table style="width:100%;border-collapse: collapse;">  
							<tr>
								<td><b>Total Accommodation Cost</b></td>
								<td style="text-align:right;"><b><?php echo $tac_hidden; ?></b></td>
							</tr>
						</table>
						<br/>
						<?php 
							if($special_event_count > 0){ 
								$sp_count = 1;
								?>
								<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
						  			<tr>
							 			<td colspan="4" style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Special Event Tariff</b></td>
						 			</tr>
									<tr>
                                    	<td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Si No</b></td>
                                    	<td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Date</b></td>
										<td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Name</b></td>
										<td style="background-color:#4baf58;color:#fff;border:1px solid black;text-align:right;"><b>Tariff</b></td>
									</tr>
									<?php
									    foreach($iti_data as $keys => $vals) {
										
											foreach($vals['cost'] as $cskey => $csval) { 
												if($csval['cost_component_id'] == "17" && $csval['room_type_id'] == "1"){
													$spcl_tariff_rate = $csval['tariff'];
												}
											}
											if(!empty($spcl_tariff_rate)){
										?>
										<tr>
											<td style="border:1px solid black;"><?php echo $sp_count++; ?></td>
											<td style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($vals['tour_date'])); ?></td>
											<td style="border:1px solid black;"><?php echo $vals['special_event_name']; ?></td>
											<td style="border:1px solid black;text-align:right;"><?php echo $spcl_tariff_rate; ?></td>
										</tr>
									<?php } 
									$tourDate    = $vals['tour_date'];
									$spDetailsAll = json_decode($vals['json_special_event'] ?? '[]');

																
									$special_events = array_filter(
										$spDetailsAll,
										fn($v) => $v->tour_date == $tourDate
									);

									if (!$special_events) { continue; }
									foreach ($special_events as $sp) { ?>
									 	<tr>
											<td style="border:1px solid black;"><?php echo $sp_count++; ?></td>
											<td style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($vals['tour_date'])); ?></td>
											<td style="border:1px solid black;"><?php echo $sp->spcl_event; ?></td>
											<td style="border:1px solid black;text-align:right;"><?php echo $sp->spcl_tariff; ?></td>
										</tr>
									<?php			
									}
								
								} 	
									?>	
								</table>
						<?php
							}
						?>

						
					
					<table style="width:100%;border-collapse: collapse;">  
					
						<tr>  
							<td><b>Total Special Event Cost</b></td>
							<td style="text-align:right;"><b><?php echo $spcl_hidden; ?></b></td>
						</tr>
						<tr> 
							<td><b>Total Daily Addon Cost</b></td>
							<td style="text-align:right;"><b><?php echo $daily_hidden; ?></b></td>
							
						</tr>
					</table>	
					<br/>
					<?php if($object_det[0]['is_vehicle_required'] == 1){ ?>
					<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                          
						  <tr>
							 <td colspan="22" style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Transportation</b></td>
						 </tr>
						 <tr>
							 <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Day</b></td>
							 <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Date</b></td>
							 <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Description</b></td>
							 <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Destination</b></td>
							 <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>KM Used</b></td>
							 <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Vehicle Model</b></td>
							 <td style="background-color:#4baf58;color:#fff;border:1px solid black;text-align:right;"><b>Rate</b></td>
							
	
						</tr>
						<?php
						$cs_trans_total = 0;
						$total_permit = 0;
						$total_extra_klm_cost = 0;
						$dayNo = 1;                                      
                    	$itinerary_details_save_cnt = count($iti_data)-1;
						$kv = 1;
						foreach($iti_data as $dkey => $day) { 
							$total_permit = $total_permit + $day['permit'];
							foreach($day['cost'] as $ckey => $cval) { 
														
								if($cval['cost_component_id'] == "21" && $cval['room_type_id'] == "1"){
									$sight_seeing_id = $cval['tariff'];
									$ss_name = $Enquiry_model->getSightName($sight_seeing_id);
									if(!empty($ss_name)){
										$ss_name_temp = $ss_name[0]['object_name'];
									}
									else{
										//$ss_name_temp = "";
										$trimmed = substr((string)$sight_seeing_id, 0, -3);
													
										$ss_name = $Enquiry_model->getDefaultSightName($trimmed);
																
										if(!empty($ss_name)){
											$ss_name_temp = $ss_name[0]['geog_name'];
										}
										else{
											$ss_name_temp = "";
										}
									}
								}
							}
						$tourDate    = $day['tour_date'];
						$vDetailsAll = json_decode($day['vehicle_details'] ?? '[]');

													
						$vehicles = array_filter(
							$vDetailsAll,
							fn($v) => $v->tour_date == $tourDate
						);

						if (!$vehicles) { continue; }

							$rowspan = count($vehicles);                
							$first   = true;                              

							foreach ($vehicles as $v) {
								echo '<tr>';

													
								if ($first) {
									echo '<td rowspan="'.$rowspan.'" style="border:1px solid black;">'.$dayNo.'</td>';
									echo '<td rowspan="'.$rowspan.'" style="border:1px solid black;">'.date('d-m-Y', strtotime($tourDate)).'</td>';
									echo '<td rowspan="'.$rowspan.'" style="border:1px solid black;">'.$day['transport_remarks'].'</td>';
									//echo '<td rowspan="'.$rowspan.'" style="border:1px solid black;">'.$ss_name_temp.'</td>';

															if(date("d-m-Y", strtotime($tourDate)) == date("d-m-Y", strtotime($object_det[0]['date_of_tour_completion']))){
																if(!empty($ss_name_temp)){
																	$final_ss_name = $ss_name_temp." - ".$dep_name[0]['geog_name'];
																}
																else{
																	$final_ss_name = $dep_name[0]['geog_name'];
																}
																echo '<td rowspan="'.$rowspan.'" style="border:1px solid black;">'.$final_ss_name.'</td>';
															}
															else{
																echo '<td rowspan="'.$rowspan.'" style="border:1px solid black;">'.$ss_name_temp.'</td>';
															}
									$dayNo++;                          
									$first = false;
								}

													
														echo '<td style="border:1px solid black;">'.$v->travel_distance.'</td>';
														echo '<td style="border:1px solid black;">'.$v->vehicle_model.'</td>';
														echo '<td style="border:1px solid black;text-align:right;">'.$v->day_rent.'</td>';
														echo '</tr>';
														$cs_trans_total = $cs_trans_total + $v->day_rent;
													}
													if($dkey == $itinerary_details_save_cnt){
													
														$first1   = true;   
														foreach ($vehicles as $v) {
															echo '<tr>';

															if ($first1) {
																echo '<td rowspan="'.$rowspan.'" colspan="4" style="border:1px solid black;">Extra Kilometer (Rate : '.$v->extra_km_rate.')</td>';               
																$first1 = false;
															}

															echo '<td style="border:1px solid black;">'.$v->total_extra_kilometer.'</td>';
															echo '<td style="border:1px solid black;">'.$v->vehicle_model.'</td>';
															echo '<td style="border:1px solid black;text-align:right;">'.$v->total_extra_cost.'</td>';
															echo '</tr">';
															$cs_trans_total = $cs_trans_total + $v->total_extra_cost;
															$total_extra_klm_cost = $total_extra_klm_cost + $v->total_extra_cost;
														}
															
													}
						} ?>
						
					</table>
                <?php } ?>
				<table style="width:100%;border-collapse: collapse;">  
						<?php if($object_det[0]['is_vehicle_required'] == 1){ ?>
							<tr>
								<td><b>Total Transportaion Cost</b></td>
								<td style="text-align:right;"><b><?php echo $cs_trans_total; ?></b></td>
							</tr>
							<tr>
								<td><b>Other Charges / Permit</b></td>
								<td style="text-align:right;"><b><?php echo $total_permit; ?></b></td>
							</tr>
						<?php } ?>
						<tr> 
							<td><b>Total Net Rate</b></td>
							<td style="text-align:right;"><b><?php echo $tnr_hidden; ?></b></td>
							
						</tr>
				</table>	


				<?php if(!empty($iti_cost_datas)){ ?>

					<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                          
						  <tr>
							 <td colspan="2" style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;"><b>Total Cost</b></td>
						 </tr>
						 <tr>
							 <td><b>Margin Percentage</b></td>
							 <td style="text-align:right;"><?php echo $iti_cost_datas[0]['margin_per']; ?></td>
						</tr>
						<tr>
							 <td><b>Margin Total</b></td>
							 <td style="text-align:right;"><?php echo $iti_cost_datas[0]['margin_value']; ?></td>
						</tr>
						<tr>
							 <td><b>Tour Addon</b></td>
							 <td style="text-align:right;"><?php echo $iti_cost_datas[0]['tour_addon']; ?></td>
						</tr>
						<tr>
							 <td><b>Total Net Rate</b></td>
							 <td style="text-align:right;"><?php echo $iti_cost_datas[0]['total_rate']; ?></td>
						</tr>
						<tr>
							 <td><b>GST Percentage</b></td>
							 <td style="text-align:right;"><?php echo $iti_cost_datas[0]['gst_per']; ?></td>
						</tr>
						<tr>
							 <td><b>GST Total</b></td>
							 <td style="text-align:right;"><?php echo $iti_cost_datas[0]['gst_value']; ?></td>
						</tr>
						<tr>
							 <td><b>Total Package Cost</b></td>
							 <td style="text-align:right;"><?php echo $iti_cost_datas[0]['tpc']; ?></td>
						</tr>
				</table>

				<?php } ?>
            
    </div>                                
</textarea>
<?php } ?>

       
<table style="float:right;">
    <tr>
        <td style="padding:5px;"><button type="button" id="save_cs_btn" class="btn btn-success btn-sm" style="float:right;margin-right:20px;">Save</button></td>
    </tr>
</table>