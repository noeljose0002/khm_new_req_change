<?php
    $vehicle_list = '';
    if($cdata[0]['is_vehicle_required'] == 1){
        $vehicles = json_decode($cdata[0]['vehicle_type_id'], true);
        foreach($vehicles as $vehicle){
            $vehicle_list.=$vehicle['vehicle_model_name']." ";
        }
    }
?>
<div class="container">
        <textarea name="proforma_guest_template" id="proforma_guest_template" style="width:100%; height:1000px;">
                    <table style="width:100%;border-collapse: collapse;">  
                           
                                 <tr>
                                    <td style="text-align:center;" colspan="2"><b>Proforma Invoice</b></td>
                                </tr>
                           
                                <tr>
                                    <td style="width:50%;"><b>Order No: </b><?php echo $cdata[0]['ref_no']; ?></td>
                                    <td rowspan="3" style="text-align:right;width:50%;"><img src="<?php echo base_url('assets/images/photos/logo_touracle.png');?>"></td>
                                </tr>
                                <tr>
                                    <td>Date : <?php echo date("d-m-Y"); ?></td>
                                </tr>
                                <tr>    
                                    <td>GSTIN Reg No: 32AADCK1388D1ZV</td>
                                </tr>
                            
                    </table>
                
                    <table style="width:100%;border-collapse: collapse;">  
                         
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
                    ?>
                    <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                            <thead>
                                 <tr>
                                    <td style="text-align:center;background-color:#4baf58;color:#fff;border:1px solid black;" colspan="19"><b>Accomodation</b></td>
                                </tr>
                                <tr>
                                    <td rowspan="9" style="border:1px solid black;"><b>Day</b></td>
                                    <td rowspan="9" style="border:1px solid black;"><b>Check In</b></td>
                                    <td rowspan="9" style="border:1px solid black;"><b>Check Out</b></td>
                                    <td rowspan="9" style="border:1px solid black;"><b>Place</b></td>
                                    <td rowspan="9" style="border:1px solid black;"><b>Hotel</b></td>
                                    <td rowspan="9" style="border:1px solid black;"><b>Category</b></td>
                                    <td rowspan="9" style="border:1px solid black;"><b>Food Plan</b></td>
                                    <td rowspan="9" style="border:1px solid black;"><b>No:Of Rooms</b></td>
                                    <td rowspan="9" style="border:1px solid black;"><b>Room Type</b></td>
                                  
                                </tr>
                               
                               
                            </thead>
                           <tbody>
                            <?php 
                            $k = 1;
                            $sum = 0;
                        
                            foreach($tour_plan as $key => $val) { 
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
                                if($val['is_own_arrangement'] == 1) { ?>
                                    <tr><td style="border:1px solid black;"><?php echo $k++; ?></td>
                                    <td style="border:1px solid black;"><?php echo date("d-m-Y", strtotime($val['check_in_date'])); ?></td>
                                    <td style="border:1px solid black;">Own Arrangements</td></tr> <?php
                                }
                                else {
                                    $sdate = $val['check_in_date'];
                                    $edate = $val['check_out_date'];
                                    $hname = $val['object_name'];
                                    $cat = $val['room_category_name'];
                                    $meals = $val['meal_plan_name'];
                                    ?>
                                        <tr>
                                            <td rowspan="<?php echo $rlen; ?>" style="border:1px solid black;"><?php echo $k++; ?></td>
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
                                               
                                                </tr>
                                            <?php 
                                            } 
                                            if($val['no_of_single_room'] > 0) {
                                            ?>
                                            <tr>
                                             <td style="border:1px solid black;"><?php echo $val['no_of_single_room']; ?></td>
                                                <td style="border:1px solid black;">Single</td>
                                               
                                        </tr> <?php
                                } 
                            } } ?>
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
                                     
                                    </tr>
                                <?php } ?>
                           
                        </table>
                        <?php } ?>                


                        <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                          
                                <tr>
                                    <td style="text-align:left;border:1px solid black;" colspan="2"><b>Payment Details</b></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border:1px solid black;">Taxable Amount</th>
                                    <td style="text-align:right;border:1px solid black;"><?php echo $cdata[0]['total_rate']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border:1px solid black;">IGST (5%)</th>
                                    <td style="text-align:right;border:1px solid black;"><?php echo $cdata[0]['gst_value']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border:1px solid black;">Gross Amount</th>
                                    <td style="text-align:right;border:1px solid black;"><?php echo $cdata[0]['tpc']; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border:1px solid black;">Advance</th>
                                    <td style="text-align:right;border:1px solid black;">0</td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border:1px solid black;">Balance</th>
                                    <td style="text-align:right;border:1px solid black;"><?php echo $cdata[0]['tpc']-0; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border:1px solid black;" colspan="2"><b>Note: The above amount is inclusive of all taxes as applicable</b></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border:1px solid black;" colspan="2"><b>Narration:</b></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;border:1px solid black;" colspan="2"><b>Payment Terms: Full Payment to be made before commencement of the Package/Tour</b></td>
                                </tr>
                       
                        </table>

                   
                            <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                              
                                   

                                    <tr>
                                    <td colspan="3" style="text-align:center;border:1px solid black;"><b>Note : The above amount is inclusive of all taxes as applicable</b></td>
                                    </tr>
                               
                            </table>
                     
                    </textarea>
                </form>  
    </div>
  <script>
$(document).ready(function() {
    tinyMCE.init({
        mode: "exact",
        elements: "proforma_guest_template",  // The ID of your textarea element
        readonly : true,
        setup: function(ed) {
            ed.onInit.add(function(ed) {
                // TinyMCE has been initialized
               
            });
        }
    });
});
</script> 