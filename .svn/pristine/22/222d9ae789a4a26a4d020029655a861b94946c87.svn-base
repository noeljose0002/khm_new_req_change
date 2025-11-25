<?php
    $vehicle_list = '';
    if($cdata[0]['is_vehicle_required'] == 1){
        $vehicles = json_decode($cdata[0]['vehicle_type_id'], true);
        foreach($vehicles as $vehicle){
            $vehicle_list.=$vehicle['vehicle_model_name']." ";
        }
    }
    if (!empty($proforma_saved_data[0]['proforma_data'])) {
?>
    <textarea name="proforma_office_template" id="proforma_office_template" style="width:100%; height:1000px;"><?php echo $proforma_saved_data[0]['proforma_data']; ?></textarea>
    <?php } else { ?>
    <textarea name="proforma_office_template" id="proforma_office_template" style="width:100%; height:1000px;"> 
        <div class="container" id="printcontent" style="border: 1px solid black; padding: 10px;">

                    <table style="width:100%;border-collapse: collapse;">  
                         
                                 <tr>
                                    <td style="text-align:center;" colspan="2"><b>Proforma Invoice - (Office Copy)</b></td>
                                </tr>
                          
                          
                                <tr>
                                    <td style="width:50%;"><b>Order No: </b><?php echo $cdata[0]['ref_no']; ?></td>
                                    <td rowspan="3" style="text-align:right;width:50%;"><img src="<?php echo base_url('assets/images/photos/logo_touracle.png');?>"></td>
                                </tr>
                                <tr>
                                    <td><b>Date : </b><?php echo date("d-m-y"); ?></td>
                                </tr>
                                <tr>    
                                    <td>GSTIN Reg No: 32AADCK1388D1ZV</td>
                                </tr>
                                <tr>
                                    <td><b>Executive: </b><?php echo $cdata[0]['executive_name']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Sales Operation Executive : </b><?php echo $cdata[0]['sop_name']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Check In : </b><?php echo $cdata[0]['date_of_tour_start']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Check Out : </b><?php echo $cdata[0]['date_of_tour_completion']; ?></td>
                                </tr>
                            
                    </table>
                
                    <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                         
                                 <tr>
                                    <td style="text-align:left;border: 1px solid black;width:50%;">
                                        <b><i>To, </i></b><br>
                                            <?php 
                                            if($cdata[0]['enq_type_id'] == 3){
                                                $a_addresses = json_decode($cdata[0]['agent_address'], true);
	                                            $a_address = is_array($a_addresses) && count($a_addresses) > 0 ? $a_addresses[0] : '';
                                                $a_emails = json_decode($cdata[0]['agent_email'], true);
	                                            $a_email = is_array($a_emails) && count($a_emails) > 0 ? $a_emails[0] : '';
                                                echo $cdata[0]['agent_name'];
                                                echo $a_address;
                                                echo $a_email;
                                                echo $cdata[0]['gstin'];
                                            }
                                            else{
                                                $g_addresses = json_decode($cdata[0]['guest_address'], true);
	                                            $g_address = is_array($g_addresses) && count($g_addresses) > 0 ? $g_addresses[0] : '';
                                                echo $cdata[0]['guest_name'];
                                                echo $g_address;
                                            } 
                                        ?>
                                    
                                    </td>
                                    <td style="text-align:left;border: 1px solid black;width:50%;">
                                        <b><i>Guest Name: </i></b>
                                        <?php 
                                            if($cdata[0]['enq_type_id'] == 3){
                                                $g_addresses = json_decode($cdata[0]['guest_address'], true);
	                                            $g_address = is_array($g_addresses) && count($g_addresses) > 0 ? $g_addresses[0] : '';
                                                echo $cdata[0]['guest_name'];
                                                echo $g_address;
                                            }
                                            else{
                                            } 
                                        ?>
                                        </p>
                                    </td>
                                </tr>
                           
                    </table>

                    <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                           
                                <tr>
                                    <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Si No</b></td>
                                    <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Particulars</b></td>
                                    <td style="background-color:#4baf58;color:#fff;border:1px solid black;"><b>Amount</b></td>
                                </tr>
                           
                          
                                <tr>
                                    <td style="border:1px solid black;"><b><i>1</i><b></td>
                                    <td style="border:1px solid black;"><b><i>Package</i><b></td>
                                    <td style="border:1px solid black;"><b><i>Rs.<?php echo $cdata[0]['tpc']; ?></i><b></td>
                                </tr>
                                <tr>
                                    <td rowspan="8" style="border:1px solid black;"></td>
                                    <td style="border:1px solid black;">&nbsp;No of Adults : </td>
                                    <td style="border:1px solid black;">&nbsp;<?php echo $cdata[0]['no_of_adult']; ?></td>
                                </tr>
                                <tr>  
                                    <td style="border:1px solid black;">&nbsp;No of Child with bed : </td>
                                    <td style="border:1px solid black;">&nbsp;<?php echo $cdata[0]['no_of_child_with_bed']; ?></td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid black;">&nbsp;No of Child without bed  : </td> 
                                    <td style="border:1px solid black;">&nbsp;<?php echo $cdata[0]['no_of_child_without_bed']; ?></td>
                                </tr>
                            
                                <tr>
                                    <td style="border:1px solid black;">&nbsp;No of Double Rooms  : </td>   
                                    <td style="border:1px solid black;">&nbsp;<?php echo $cdata[0]['no_of_double_room']; ?></td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid black;">&nbsp;No of Single Rooms : </td>
                                    <td style="border:1px solid black;">&nbsp;<?php echo $cdata[0]['no_of_single_room']; ?></td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid black;">&nbsp;No of Extra Rooms : </td>
                                    <td style="border:1px solid black;">&nbsp;<?php echo $cdata[0]['no_of_extra_bed']; ?></td>
                                </tr>
                                <?php if($cdata[0]['is_vehicle_required'] == 1) { ?>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;Vehicle : </td>
                                        <td style="border:1px solid black;">&nbsp;<?php echo $vehicle_list; ?></td>
                                    </tr>
                                <?php } ?>
                            
                    </table>
                    <?php 
                      $nop = 0;
                      if($cdata[0]['no_of_adult'] > 0){
                        $nop = $nop  + 1;
                      }
                      if($cdata[0]['no_of_child_with_bed'] > 0){
                        $nop = $nop  + 1;
                      }
                      if($cdata[0]['no_of_child_without_bed'] > 0){
                        $nop = $nop  + 1;
                      }
                      if($cdata[0]['no_of_extra_bed'] > 0){
                        $nop = $nop  + 1;
                      }
                      
                      // CREATE DATE TO DAY MAPPING
                      $date_to_day_map = [];
                      $day_counter = 1;
                      
                      foreach($tour_plan as $key => $val) {
                          if($val['is_own_arrangement'] == 1) {
                              $check_in = date("Y-m-d", strtotime($val['check_in_date']));
                              if (!isset($date_to_day_map[$check_in])) {
                                  $date_to_day_map[$check_in] = $day_counter++;
                              }
                          } else {
                              if(!empty($val['expansion_details']) && count($val['expansion_details']) > 0) {
                                  foreach($val['expansion_details'] as $exp_key => $exp) {
                                      $check_in = date("Y-m-d", strtotime($exp['tour_expansion_date']));
                                      if (!isset($date_to_day_map[$check_in])) {
                                          $date_to_day_map[$check_in] = $day_counter++;
                                      }
                                  }
                              } else {
                                  $check_in = date("Y-m-d", strtotime($val['check_in_date']));
                                  if (!isset($date_to_day_map[$check_in])) {
                                      $date_to_day_map[$check_in] = $day_counter++;
                                  }
                              }
                          }
                      }
                    ?>
                    <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                            <thead>
                                 <tr>
                                    <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;" colspan="19"><b>Accomodation</b></td>
                                </tr>
                                <tr>
                                    <td rowspan="2" style="border:1px solid black;"><b>Day</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>Check In</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>Check Out</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>Place</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>Hotel</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>Category</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>Food Plan</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>No:Of Rooms</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>Room Type</b></td>
                                    <td colspan="<?php echo $nop; ?>" style="text-align:center;border:1px solid black;"><b>No Of Pax</b></td>
                                    <td colspan="<?php echo $nop; ?>" style="text-align:center;border:1px solid black;"><b>Rate</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>Total</b></td>
                                    <td rowspan="2" style="border:1px solid black;"><b>ITC</b></td>
                                </tr>
                                <tr>
                                    <?php if($cdata[0]['no_of_adult'] > 0){ ?>
                                        <td style="border:1px solid black;"><b>Adult</b></td>
                                    <?php } ?>
                                    <?php if($cdata[0]['no_of_child_with_bed'] > 0){ ?>
                                        <td style="border:1px solid black;"><b>Child</b></td>
                                    <?php } ?>
                                    <?php if($cdata[0]['no_of_child_without_bed'] > 0){ ?>
                                        <td style="border:1px solid black;"><b>Child WB</b></td>
                                    <?php } ?>
                                    <?php if($cdata[0]['no_of_extra_bed'] > 0){ ?>
                                        <td style="border:1px solid black;"><b>Extra</b></td>
                                    <?php } ?>
                                    
                                    <?php if($cdata[0]['no_of_adult'] > 0){ ?>
                                        <td style="border:1px solid black;"><b>Adult</b></td>
                                    <?php } ?>
                                    <?php if($cdata[0]['no_of_child_with_bed'] > 0){ ?>
                                        <td style="border:1px solid black;"><b>Child</b></td>
                                    <?php } ?>
                                    <?php if($cdata[0]['no_of_child_without_bed'] > 0){ ?>
                                        <td style="border:1px solid black;"><b>Child WB</b></td>
                                    <?php } ?>
                                    <?php if($cdata[0]['no_of_extra_bed'] > 0){ ?>
                                        <td style="border:1px solid black;"><b>Extra</b></td>
                                    <?php } ?>
                                </tr>
                               
                            </thead>
                           <tbody>
                            <?php 
                            $grand_total_accommodation = 0;
                            
                            foreach($tour_plan as $key => $val) { 
                                if($val['is_own_arrangement'] == 1) { 
                                    $check_in = date("Y-m-d", strtotime($val['check_in_date']));
                                    $current_day = $date_to_day_map[$check_in];
                                    ?>
                                    <tr>
                                        <td style="border:1px solid black;"><?php echo $current_day; ?></td>
                                        <td style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($val['check_in_date'])); ?></td>
                                        <td style="border:1px solid black;" colspan="11">Own Arrangements</td>
                                    </tr>
                                <?php } else {
                                    // Check if expansion details exist
                                    if(!empty($val['expansion_details']) && count($val['expansion_details']) > 0) {
                                        // Use expansion data for dynamic rows
                                        foreach($val['expansion_details'] as $exp_key => $exp) {
                                            $sdate = $exp['tour_expansion_date'];
                                            $check_in = date("Y-m-d", strtotime($sdate));
                                            $current_day = $date_to_day_map[$check_in];
                                            $edate = date('Y-m-d', strtotime($sdate . ' +1 day'));
                                            $hname = $val['object_name'];
                                            $cat = $exp['exp_room_category_name'] ?? $val['room_category_name'];
                                            $meals = $exp['exp_meal_plan_name'] ?? $val['meal_plan_name'];
                                            
                                            // Count room types for this expansion entry
                                            $has_double = ($exp['room_rate_double'] > 0);
                                            $has_single = ($exp['room_rate_single'] > 0);
                                            $rlen = ($has_double ? 1 : 0) + ($has_single ? 1 : 0);
                                            
                                            if($rlen > 0) {
                                                $first_row = true;
                                                
                                                // Double Room Row
                                                if($has_double) { 
                                                    $double_room_total = $exp['double_total_rate'];
                                                    $grand_total_accommodation += $double_room_total;
                                                    ?>
                                                    <tr>
                                                        <?php if($first_row) { ?>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $current_day; ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($sdate)); ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($edate)); ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $val['geog_name']; ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $hname; ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $cat; ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $meals; ?></td>
                                                            <?php $first_row = false; ?>
                                                        <?php } ?>
                                                        
                                                        <td style="border:1px solid black;">1</td>
                                                        <td style="border:1px solid black;">Double</td>
                                                        
                                                        <?php if($val['no_of_adult'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $val['no_of_adult']; ?></td>
                                                        <?php } ?>
                                                        <?php if($val['no_of_child_with_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $val['no_of_child_with_bed']; ?></td>
                                                        <?php } ?>
                                                        <?php if($val['no_of_child_without_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $val['no_of_child_without_bed']; ?></td>
                                                        <?php } ?>
                                                        <?php if($val['no_of_extra_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $val['no_of_extra_bed']; ?></td>
                                                        <?php } ?>

                                                        <?php if($cdata[0]['no_of_adult'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $exp['room_rate_double']; ?></td>
                                                        <?php } ?>
                                                        <?php if($cdata[0]['no_of_child_with_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $exp['child_with_bed_double']; ?></td>
                                                        <?php } ?>
                                                        <?php if($cdata[0]['no_of_child_without_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $exp['child_without_bed_double']; ?></td>
                                                        <?php } ?>
                                                        <?php if($cdata[0]['no_of_extra_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $exp['extra_bed_double']; ?></td>
                                                        <?php } ?>
                                                        
                                                        <td style="border:1px solid black;"><?php echo $double_room_total; ?></td>
                                                        <td style="border:1px solid black;">0</td>
                                                    </tr>
                                                <?php 
                                                } 
                                                
                                                // Single Room Row
                                                if($has_single) {
                                                    $single_room_total = $exp['single_total_rate'];
                                                    $grand_total_accommodation += $single_room_total;
                                                    ?>
                                                    <tr>
                                                        <?php if($first_row) { ?>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $current_day; ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($sdate)); ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($edate)); ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $val['geog_name']; ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $hname; ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $cat; ?></td>
                                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $meals; ?></td>
                                                            <?php $first_row = false; ?>
                                                        <?php } ?>
                                                        
                                                        <td style="border:1px solid black;">1</td>
                                                        <td style="border:1px solid black;">Single</td>
                                                        
                                                        <?php if($val['no_of_adult'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $val['no_of_adult']; ?></td>
                                                        <?php } ?>
                                                        <?php if($val['no_of_child_with_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $val['no_of_child_with_bed']; ?></td>
                                                        <?php } ?>
                                                        <?php if($val['no_of_child_without_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $val['no_of_child_without_bed']; ?></td>
                                                        <?php } ?>
                                                        <?php if($val['no_of_extra_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $val['no_of_extra_bed']; ?></td>
                                                        <?php } ?>

                                                        <?php if($cdata[0]['no_of_adult'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $exp['room_rate_single']; ?></td>
                                                        <?php } ?>
                                                        <?php if($cdata[0]['no_of_child_with_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $exp['child_with_bed_single']; ?></td>
                                                        <?php } ?>
                                                        <?php if($cdata[0]['no_of_child_without_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $exp['child_without_bed_single']; ?></td>
                                                        <?php } ?>
                                                        <?php if($cdata[0]['no_of_extra_bed'] > 0){ ?>
                                                            <td style="border:1px solid black;"><?php echo $exp['extra_bed_single']; ?></td>
                                                        <?php } ?>
                                                        
                                                        <td style="border:1px solid black;"><?php echo $single_room_total; ?></td>
                                                        <td style="border:1px solid black;">0</td>
                                                    </tr>
                                                <?php 
                                                }
                                            }
                                        }
                                    } else {
                                        // Fallback to old logic if no expansion data
                                        $check_in = date("Y-m-d", strtotime($val['check_in_date']));
                                        $current_day = $date_to_day_map[$check_in];
                                        
                                        foreach($val['cost'] as $tkey => $tval){
                                            if($tval['cost_component_id'] == 6 && $tval['room_type_id'] == 2){
                                                $d_adult = $tval['quick_quote_tariff'];
                                            }
                                            if($tval['cost_component_id'] == 12 && $tval['room_type_id'] == 2){
                                                $d_child = $tval['quick_quote_tariff'];
                                            }
                                            if($tval['cost_component_id'] == 15 && $tval['room_type_id'] == 2){
                                                $d_child_wb = $tval['quick_quote_tariff'];
                                            }
                                            if($tval['cost_component_id'] == 9 && $tval['room_type_id'] == 2){
                                                $d_extra = $tval['quick_quote_tariff'];
                                            }

                                            if($tval['cost_component_id'] == 6 && $tval['room_type_id'] == 1){
                                                $s_adult = $tval['quick_quote_tariff'];
                                            }
                                            if($tval['cost_component_id'] == 12 && $tval['room_type_id'] == 1){
                                                $s_child = $tval['quick_quote_tariff'];
                                            }
                                            if($tval['cost_component_id'] == 15 && $tval['room_type_id'] == 1){
                                                $s_child_wb = $tval['quick_quote_tariff'];
                                            }
                                            if($tval['cost_component_id'] == 9 && $tval['room_type_id'] == 1){
                                                $s_extra = $tval['quick_quote_tariff'];
                                            }
                                        }

                                        $double_room_total = ($val['no_of_double_room']*$d_adult) + ($cdata[0]['no_of_child_with_bed']*$d_child) + ($cdata[0]['no_of_child_without_bed']*$d_child_wb) + ($cdata[0]['no_of_extra_bed']*$d_extra);
                                        $single_room_total = $val['no_of_single_room']*$s_adult;
                                        $rlen = 0;
                                        if($val['no_of_double_room'] > 0){
                                            $rlen = $rlen + 1;
                                        }
                                        if($val['no_of_single_room'] > 0){
                                            $rlen = $rlen + 1;
                                        }
                                        
                                        $sdate = $val['check_in_date'];
                                        $edate = $val['check_out_date'];
                                        $hname = $val['object_name'];
                                        $cat = $val['room_category_name'];
                                        $meals = $val['meal_plan_name'];
                                        ?>
                                            <tr>
                                                <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $current_day; ?></td>
                                                <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($sdate)); ?></td>
                                                <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($edate)); ?></td>
                                                <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $val['geog_name']; ?></td>
                                                <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $hname; ?></td>
                                                <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $cat; ?></td>
                                                <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $meals; ?></td>
                                                <?php
                                                if($val['no_of_double_room'] > 0) {  
                                                ?>   
                                                    <td style="border:1px solid black;"><?php echo $val['no_of_double_room']; ?></td>
                                                    <td style="border:1px solid black;">Double</td>
                                                    <?php if($val['no_of_adult'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_adult']; ?></td>
                                                    <?php } ?>
                                                    <?php if($val['no_of_child_with_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_child_with_bed']; ?></td>
                                                    <?php } ?>
                                                    <?php if($val['no_of_child_without_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_child_without_bed']; ?></td>
                                                    <?php } ?>
                                                    <?php if($val['no_of_extra_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_extra_bed']; ?></td>
                                                    <?php } ?>

                                                    <?php if($cdata[0]['no_of_adult'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $d_adult; ?></td>
                                                    <?php } ?>
                                                    <?php if($cdata[0]['no_of_child_with_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $d_child; ?></td>
                                                    <?php } ?>
                                                    <?php if($cdata[0]['no_of_child_without_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $d_child_wb; ?></td>
                                                    <?php } ?>
                                                    <?php if($cdata[0]['no_of_extra_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $d_extra; ?></td>
                                                    <?php } ?>
                                                  
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_days']*$double_room_total; ?></td>
                                                        <td style="border:1px solid black;">0</td>
                                                    
                                                    </tr>
                                                <?php 
                                                $grand_total_accommodation += $val['no_of_days']*$double_room_total;
                                                } 
                                                if($val['no_of_single_room'] > 0) {
                                                ?>
                                                <tr>
                                                 <td style="border:1px solid black;"><?php echo $val['no_of_single_room']; ?></td>
                                                    <td style="border:1px solid black;">Single</td>
                                                    <?php if($val['no_of_adult'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_adult']; ?></td>
                                                    <?php } ?>
                                                    <?php if($val['no_of_child_with_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_child_with_bed']; ?></td>
                                                    <?php } ?>
                                                    <?php if($val['no_of_child_without_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_child_without_bed']; ?></td>
                                                    <?php } ?>
                                                    <?php if($val['no_of_extra_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_extra_bed']; ?></td>
                                                    <?php } ?>

                                                    <?php if($cdata[0]['no_of_adult'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $s_adult; ?></td>
                                                    <?php } ?>
                                                    <?php if($cdata[0]['no_of_child_with_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $s_child; ?></td>
                                                    <?php } ?>
                                                    <?php if($cdata[0]['no_of_child_without_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $s_child_wb; ?></td>
                                                    <?php } ?>
                                                    <?php if($cdata[0]['no_of_extra_bed'] > 0){ ?>
                                                        <td style="border:1px solid black;"><?php echo $s_extra; ?></td>
                                                    <?php } ?>
                                                        <td style="border:1px solid black;"><?php echo $val['no_of_days']*$single_room_total; ?></td>
                                                        <td style="border:1px solid black;">0</td>
                                                        
                                            </tr> <?php
                                            $grand_total_accommodation += $val['no_of_days']*$single_room_total;
                                        } 
                                    } 
                                } 
                            } ?>
                           </tbody>
                        </table>
                      
                       
                        <?php if($cdata[0]['is_vehicle_required'] == 1) { ?>
                        <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                          
                                 <tr>
                                    <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;" colspan="14"><b>Transportation</b></td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid black;"><b>Si No</b></td>
                                    <td style="border:1px solid black;"><b>Check In</b></td>
                                    <td style="border:1px solid black;"><b>Check Out</b></td>
                                    <td style="border:1px solid black;"><b>No Of Days</b></td>
                                    <td style="border:1px solid black;"><b>Vehicle</b></td>
                                    <td style="border:1px solid black;"><b>Transporter</b></td>
                                    <td style="border:1px solid black;"><b>Max KM</b></td>
                                    <td style="border:1px solid black;"><b>Total KM</b></td>
                                    <td style="border:1px solid black;"><b>Extra KM</b></td>
                                    <td style="border:1px solid black;"><b>Extra KM Rate</b></td>
                                    <td style="border:1px solid black;"><b>Extra Km Cost</b></td>
                                    <td style="border:1px solid black;"><b>Others</b></td>
                                    <td style="border:1px solid black;"><b>Cost</b></td>
                                    <td style="border:1px solid black;"><b>Total</b></td>
                                </tr>
                           
                          
                                <?php 
                                    $no_of_days_temp = $cdata[0]['no_of_night']+1;

                                $vehs = json_decode($cdata[0]['vehicle_details'], true);
                                foreach($vehs as $vkey => $vval) { 
                                 
                                    $total_permit = 0;
                                    $temp_extra_cost = 0;
                                    $temp_cost = 0;
                                    $temp_totkm = 0;
                                    foreach($cdata as $ckey => $cval){

                                        $total_permit = $total_permit + $cval['permit'];
                                        $temp_veh_details = json_decode($cval['vehicle_details'],true);
                                        foreach($temp_veh_details as $tkey => $tval){
                                            if($vval['veh_type_id'] == $tval['veh_type_id']){
                                                $temp_total_extra_kilometer = $tval['total_extra_kilometer'];
                                                $temp_extra_km_rate = $tval['extra_km_rate'];
                                            }
                                        }
                                    }
                                    $temp_extra_cost = $temp_total_extra_kilometer*$temp_extra_km_rate;
                                    $temp_cost = $cdata[0]['ttc'] - ($temp_extra_cost + $total_permit);
                                    if($temp_total_extra_kilometer > 0){
                                        $temp_totkm = $temp_total_extra_kilometer + ($vval['max_km_day']*$no_of_days_temp);
                                    }
                                    else{
                                        $temp_totkm = $temp_total_extra_kilometer;
                                    }

                                    ?>
                                    <tr>
                                        <td style="border:1px solid black;"><?php echo $vkey+1; ?></td>
                                        <td style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($cdata[0]['date_of_tour_start'])); ?></td>
                                        <td style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($cdata[0]['date_of_tour_completion'])); ?></td>
                                        <td style="border:1px solid black;"><?php echo $no_of_days_temp; ?></td>
                                        <td style="border:1px solid black;"><?php echo $vval['vehicle_model']; ?></td>
                                        <td style="border:1px solid black;"></td>
                                        <td style="border:1px solid black;"><?php echo $vval['max_km_day']*$no_of_days_temp; ?></td>
                                        <td style="border:1px solid black;"><?php echo $temp_totkm; ?></td>
                                        <td style="border:1px solid black;"><?php echo $temp_total_extra_kilometer; ?></td>
                                        <td style="border:1px solid black;"><?php echo $vval['extra_km_rate']; ?></td>
                                        <td style="border:1px solid black;"><?php echo $temp_extra_cost; ?></td>
                                        <td style="border:1px solid black;"><?php echo $total_permit; ?></td>
                                        <td style="border:1px solid black;"><?php echo $temp_cost; ?></td>
                                        <td style="border:1px solid black;"><?php echo $cdata[0]['ttc']; ?></td>
                                    </tr>
                                <?php } ?>
                           
                        </table>
                        <?php } ?>
                       
                       <?php 
                            $profit = $cdata[0]['margin_value']+$cdata[0]['tour_addon'];
                            $margin_per = ($profit/$cdata[0]['total_rate'])*100;   
                       ?>

                        <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                                <tr>
                                    <b></i>Narration</i></b>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid black;"colspan="2"><p></p></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;border: 1px solid black;background-color:#4baf58;color:#fff;"><b>Summary</b></td>
                                    <td style="text-align:center;border: 1px solid black;background-color:#4baf58;color:#fff;"><b>Amount</b></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border: 1px solid black;">Accommodation</td>
                                    <td style="text-align:right;border: 1px solid black;"><?php echo $cdata[0]['tac']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border: 1px solid black;">Transportation</td>
                                    <td style="text-align:right;border: 1px solid black;"><?php echo $cdata[0]['ttc']; ?></td>
                                </tr>
                             
                                <tr>
                                    <td style="text-align:left;border: 1px solid black;">Total Net Rate (Cost of Sales)</td>
                                    <td style="text-align:right;border: 1px solid black;"><?php echo $cdata[0]['tnr']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border: 1px solid black;">TAC%</td>
                                    <td style="text-align:right;border: 1px solid black;"><?php echo round($margin_per,2); ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border: 1px solid black;">TAC</td>
                                    <td style="text-align:right;border: 1px solid black;"><?php echo $profit; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border: 1px solid black;">Total (Taxable Sales Total)</td>
                                    <td style="text-align:right;border: 1px solid black;"><?php echo $cdata[0]['total_rate']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border: 1px solid black;">GST (Tax)</td>
                                    <td style="text-align:right;border: 1px solid black;"><?php echo $cdata[0]['gst_value']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border: 1px solid black;">Grand Total (Sale Value)</td>
                                    <td style="text-align:right;border: 1px solid black;"><?php echo round($cdata[0]['tpc'],2); ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;border: 1px solid black;" colspan="2"><b> Gross Amount (Sale Value): <?php echo $cdata[0]['tpc']; ?></b></td>
                                </tr>
                           
                        </table>

                       
                        </div>
                    
    </textarea>
    <?php } ?>

    <table style="float:right;">
        <?php if ($proforma_saved_data[0]['approved_status']==1){ ?>     
            <tr>
                <td style="padding:5px;"><label style="font-weight: bold; font-style: italic; font-size: 16px;">Proforma Approved</label></td>   
            </tr>
        <?php } else if ($proforma_saved_data[0]['approved_status']==2){ ?>
            <tr>
                <td style="padding:5px;"><label style="font-weight: bold; font-style: italic; font-size: 16px;">Proforma Rejected</label></td>   
            </tr>
        <?php } else { ?>
            <tr>
                <td style="padding:5px;"><button type="button" id="save_pro_btn" class="btn btn-success btn-sm" style="float:right;margin-right:20px;">Update</button></td>
                <td style="padding:5px;"><label style="font-weight: bold; font-style: italic; font-size: 16px;">Waiting for approval</label></td>   
            </tr>
        <?php } ?>
    </table>