<?php
use App\Models\Enquiry_m;
$Enquiry_model = new Enquiry_m();
$user_id = session('user_id');
$user_details = $Enquiry_model->getuserdetails($user_id);
$addressArray = json_decode($user_details[0]['entity_address'], true);
$mobileArray = json_decode($user_details[0]['entity_mobile'], true);
$emailArray = json_decode($user_details[0]['entity_email'], true);
$no_of_double_room_temp = $hotels[0]['no_of_double_room'];
$no_of_single_room_temp = $hotels[0]['no_of_single_room'];
$total_toom_temp = $no_of_double_room_temp + $no_of_single_room_temp;
if($total_toom_temp > 1){
    $special_notes = "Please provide adjacent rooms";
}
else{
    $special_notes = "";
}
if(!empty($hotels[0]['object_email'])){
	$emails = json_decode($hotels[0]['object_email'], true);
	$email = is_array($emails) && count($emails) > 0 ? $emails[0] : '';
}
else{
	$email = '';
}
$room_t_d = 0;
$room_t_s = 0;
$child_t_d = 0;
$child_wb_t_d = 0;
$extra_t_d = 0;
$addon_count = 0;
$facility_id ="";
$fac_name_temp ="";
$facility_tafiff = 0;


                                        foreach($hotels[0]['cost'] as $ckey => $cval) { 
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
                                                    if(!empty($facility_id)){
														$fac_name = $Enquiry_model->getHotelFacilityName($facility_id);
														if(!empty($fac_name)){
															$fac_name_temp = $fac_name[0]['facility_name'];
														}
													}
												if(!empty($cval['tariff']) || !empty($hot_det_count)){
													$addon_count = $addon_count + 1;
												}
											}
											if($cval['cost_component_id'] == "19" && $cval['room_type_id'] == "1"){
												$facility_tafiff = $cval['tariff'];
											}
											if($cval['cost_component_id'] == "17" && $cval['room_type_id'] == "1"){
												$spcl_tariff = $cval['tariff'];
											}
										
										}
    $total_net_rates = ($no_of_double_room_temp*$room_t_d) + ($no_of_single_room_temp*$room_t_s) + ($hotels[0]['no_of_child_with_bed']*$child_t_d) + ($hotels[0]['no_of_child_without_bed']*$child_wb_t_d) + ($hotels[0]['no_of_extra_bed']*$extra_t_d);
    $total_net_rate = $total_net_rates * $hotels[0]['no_of_days'];
?>
    <h6><?php echo $hotels[0]['object_name']; ?> (<?php echo date("d-m-Y", strtotime($hotels[0]['tour_date'])); ?>)</h6>
        <div class="row" style="padding-bottom:10px;">    
            <div class="col">
                <div>
                    <label class="form-label small-label mandatory" for="mobile">To</label>
                    <input type="text" name="hotcon_mail_to" id="hotcon_mail_to" value="<?php echo $email; ?>" class="form-control form-control-sm">
                    <input type="hidden" id="hotcon_mail_guest_name" value="<?php echo $hotels[0]['guest_name']; ?>">
                    <input type="hidden" id="hotcon_mail_ref_no" value="<?php echo $hotels[0]['ref_no']; ?>">
                </div>
            </div>
            <div class="col">
                <div style="padding-top:20px;">
                    <button type="" id="btn_con_send_mail" class="btn btn-success">Send Mail</button>
                </div>
            </div>
        </div>    

        <div class="d-flex justify-content-center">
			<button class="btn btn-primary" id="spinner_draft_hotcon" type="button" style="display: none;">
				<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
				    Sending Mail...Please wait...
			</button>
		</div>

        <textarea name="hot_con_mail" id="hot_con_mail" style="width:100%; height:1000px;">
        <div class="container">
        <p><b>Dear Sir / Madam,</b></p> <p><b><i>Greetings from Touracle – The preferred South India Tour operator.</i></b></p><p><b>As discussed, please confirm the room. Details given below</b></p>
        <table style="width:auto; border-collapse: collapse; table-layout: auto;">
      
            <tr>
                <td style="border: 1px solid black;"><b>Ref No</b></td>
                <td colspan="2" style="border: 1px solid black;"><?php echo $hotels[0]['ref_no']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>Hotel</b></td>
                <td style="border: 1px solid black;" colspan="2"><?php echo $hotels[0]['object_name'].", ".$hotels[0]['geog_name']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>Checkin</b></td>
                <td colspan="2" style="border: 1px solid black;"><?php echo date("d-m-Y", strtotime($hotels[0]['check_in_date'])); ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>Checkout</b></td>
                <td colspan="2" style="border: 1px solid black;"><?php echo date("d-m-Y", strtotime($hotels[0]['check_out_date'])); ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>No Of Night</b></td>
                <td colspan="2" style="border: 1px solid black;"><?php echo $hotels[0]['no_of_days']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>Room Category</b></td>
                <td colspan="2" style="border: 1px solid black;"><?php echo $hotels[0]['room_category_name']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>Guest Name</b></td>
                <td colspan="2" style="border: 1px solid black;"><?php echo $hotels[0]['guest_name']; ?></td>
            </tr>
            
            <tr>
                <td style="border: 1px solid black;"><b>Total No Of Adult</b></td>
                <td colspan="2" style="border: 1px solid black;"><?php echo $hotels[0]['no_of_adult']; ?></td>+
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>Meal Plan</b></td>
                <td colspan="2" style="border: 1px solid black;"><?php echo $hotels[0]['meal_plan_name']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>No Of Double Rooms</b></td>
                <td style="border: 1px solid black;"><?php echo $hotels[0]['no_of_double_room']; ?></td>
                <td style="border: 1px solid black;">&#8377;<?php echo $room_t_d; ?></td>
            </tr>
            <?php if($hotels[0]['no_of_single_room'] > 0){ ?>
                <tr>
                    <td style="border: 1px solid black;"><b>No Of Single Rooms</b></td>
                    <td style="border: 1px solid black;"><?php echo $hotels[0]['no_of_single_room']; ?></td>
                    <td style="border: 1px solid black;">&#8377;<?php echo $room_t_s; ?></td>
                </tr>
            <?php } ?>
            <?php if($hotels[0]['no_of_extra_bed'] > 0){ ?>
            <tr>
                <td style="border: 1px solid black;"><b>No Of Extra Bed(Adult)</b></td>
                <td style="border: 1px solid black;"><?php echo $hotels[0]['no_of_extra_bed']; ?></td>
                <td style="border: 1px solid black;">&#8377;<?php echo $extra_t_d; ?></td>
            </tr>
            <?php } ?>
            <?php if($hotels[0]['no_of_child_with_bed'] > 0){ ?>
            <tr>
                <td style="border: 1px solid black;"><b>No Of Child with Bed</b></td>
                <td style="border: 1px solid black;"><?php echo $hotels[0]['no_of_child_with_bed']; ?></td>
                <td style="border: 1px solid black;">&#8377;<?php echo $child_t_d; ?></td>
            </tr>
             <?php } ?>
             <?php if($hotels[0]['no_of_child_without_bed'] > 0){ ?>
            <tr>
                <td style="border: 1px solid black;"><b>No Of Child without Bed</b></td>
                <td style="border: 1px solid black;"><?php echo $hotels[0]['no_of_child_without_bed']; ?></td>
                <td style="border: 1px solid black;">&#8377;<?php echo $child_wb_t_d; ?></td>
            </tr>
             <?php } ?>
            <tr>
                <td style="border: 1px solid black;background-color:#ff99c2;color:black;"><b>Special Note</b></td>
                <td colspan="2" style="border: 1px solid black;background-color:#ff99c2;color:black;"><?php echo $special_notes; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><b>Total Net Rate</b></td>
                <td colspan="2" style="border: 1px solid black;">&#8377;<?php echo $total_net_rate; ?></td>
            </tr>
            <?php if($addon_count > 0){ ?>
                <tr>
                    <td style="border: 1px solid black;"><b>Addons(<?php echo $fac_name_temp; ?>)</b></td>
                    <td colspan="2" style="border: 1px solid black;">&#8377;<?php echo $facility_tafiff; ?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"><b>Grand Total</b></td>
                    <td colspan="2" style="border: 1px solid black;">&#8377;<?php echo $total_net_rate+$facility_tafiff; ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td style="border: 1px solid black;background-color:#ffe680;color:black;"><b>Payment Through</b></td>
                <td colspan="2" style="border: 1px solid black;background-color:#ffe680;color:black;">KADUNA HOSPITALITY PVT LTD</td>
            </tr>

            <tr>
                <td rowspan="5" style="border: 1px solid black;"><b>Billing Address</b></td>
                <td colspan="2" style="border: 1px solid black;">KADUNA HOSPITALITY PVT LTD</td>
            </tr>
            <tr>
                
                <td colspan="2" style="border: 1px solid black;">602, 6th Floor</td>
            </tr>
            <tr>
                
                <td colspan="2" style="border: 1px solid black;">Hi Lite Platino</td>
            </tr>
            <tr>
                
                <td colspan="2" style="border: 1px solid black;">Sankar Nagar Colony Road, Kannadikadu, Maradu P O,Cochin 682304</td>
            </tr>
            <tr>
                
                <td colspan="2" style="border: 1px solid black;">finance@touracle.in | accounts@touracle.in</td>
            </tr>
            <tr>
               <td style="border: 1px solid black;background-color:#ffe680;color:black;">GSTIN</td>
                <td colspan="2" style="border: 1px solid black;background-color:#ffe680;color:black;">32AADCK1388D1ZV</td>
            </tr>
        
    </table>
    
  
    
    
    
     <p><label style="background-color:#ff99c2;"><b>Note: Extra charges if any, please collect directly from the Guest</b></label></p>
    
    <p>Anticipating your confirmation mail</p>

    <p style="font-family: 'Calibry';font-size: 11px;"><b>Thanks 'N' Regards,</b></p>
    <p style="font-family: 'Calibry';font-size: 11px;"><?php echo $user_details[0]['entity_name']; ?></p> 
    <p style="font-family: 'Calibry';font-size: 11px;"><?php echo isset($addressArray[0]) ? $addressArray[0] : ''; ?></p> 
    <p style="font-family: 'Calibry';font-size: 11px;">Mob : <?php echo isset($mobileArray[0]) ? $mobileArray[0] : ''; ?>, Email : <?php echo isset($emailArray[0]) ? $emailArray[0] : ''; ?></p> 
   
   </div>
        </textarea>
        <button type="button" class="btn btn-success btn-sm sent_hotelconfirm_mail" style="float:right;margin-top:5px;">Send Mail</button>
            
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary" id="spinner_hotelconfirm_mail" type="button" style="display: none;">
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Mail Sending...
                </button>
            </div>
  
</div>

<script>
$(document).ready(function() {
    tinyMCE.init({
        mode: "exact",
        elements: "hot_con_mail",  // The ID of your textarea element
        readonly : false,
        setup: function(ed) {
            ed.onInit.add(function(ed) {
                // TinyMCE has been initialized
               
            });
        }
    });
});
</script>
