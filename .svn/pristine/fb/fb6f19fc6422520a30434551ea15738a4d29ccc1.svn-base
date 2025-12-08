<?php
use App\Models\Enquiry_m;
$Enquiry_model = new Enquiry_m();
$total_count = count($response)-1;
foreach($response as $index => $item){
$arr_name = $Enquiry_model->getLocationNamebyid($item['object_det'][0]['arrival_location']);
$dep_name = $Enquiry_model->getLocationNamebyid($item['object_det'][0]['departure_location']);
$user_details = $Enquiry_model->getuserdetails(session('user_id'));
$plus = " + ";
$comma = " , ";
if($index == 0){
?>
<textarea name="multiple_iti_sheet_template" id="multiple_iti_sheet_template" style="width:100%; height:1000px;"> 
    <div class="container">
    	<p>Dear Sir / Madam,</p> <p><b><i>Greetings from Touracle – The preferred South India Tour operator.</i></b><p>
    	<p>Thank you for your enquiry. We are pleased to submit the travel itinerary we have prepared exclusively for you</p>
    	<p>Please review the details at your earliest convenience, and we look forward to receiving your confirmation. If you require any amendments or support regarding the itinerary from our end, please do not hesitate to contact us. </p><p>Thank you for the opportunity to assist you with your enquiries.</p>  
        <p><b>Dates : </b><?php echo date("d-m-Y", strtotime($item['object_det'][0]['start_date'])); ?> to <?php echo date("d-m-Y", strtotime($item['object_det'][0]['end_date'])); ?></p>
    	<p><b>Duration : </b><?php echo $item['object_det'][0]['no_of_night'];?> Nights and <?php echo $item['object_det'][0]['no_of_night']+1; ?> Days</p>
		<p><b>No of Persons : </b>
			<?php if($item['object_det'][0]['no_of_adult'] > 0) { echo $item['object_det'][0]['no_of_adult']; ?> Adults <?php } ?>
			<?php if($item['object_det'][0]['no_of_child_with_bed'] > 0) { echo $comma.$item['object_det'][0]['no_of_child_with_bed']; ?> Child with Bed<?php } ?>
			<?php if($item['object_det'][0]['no_of_child_without_bed'] > 0) { echo $comma.$item['object_det'][0]['no_of_child_without_bed']; ?> Child without Bed <?php } ?>
		</p>
		<p><b>Number of room : </b>
			<?php if($item['object_det'][0]['no_of_double_room'] > 0) { echo $item['object_det'][0]['no_of_double_room']; ?> Double Room <?php } ?>
			<?php if($item['object_det'][0]['no_of_single_room'] > 0) { echo $plus.$item['object_det'][0]['no_of_single_room']; ?> Single Room <?php } ?>
			<?php if($item['object_det'][0]['no_of_extra_bed'] > 0) { echo $plus.$item['object_det'][0]['no_of_extra_bed']; ?> Extra Bed <?php } ?>
		</p>
		<?php if($item['object_det'][0]['is_vehicle_required'] == 1) { ?>
			<p><b>Arrival : </b><?php echo $arr_name[0]['geog_name']; ?></p>
			<p><b>Departure : </b><?php echo $dep_name[0]['geog_name']; ?></p>
		<?php } } ?>

		<table style="width:100%;border-collapse: collapse;border: 1px solid black;">
                <thead>
                    <tr>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;"><b>Check In</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;"><b>Check Out</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;"><b>No Of Night</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;"><b>Place</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;"><b>Hotel</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;"><b>Room Type</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;"><b>Meal Plan</b></td>
                        <?php if($item['object_det'][0]['no_of_double_room'] > 0){ ?>
                            <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;"><b>No of Rooms(Dbl)</b></td>
                        <?php } ?>
                        <?php if($item['object_det'][0]['no_of_single_room'] > 0){ ?>
                            <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;"><b>No of Rooms(Sgl)</b></td>
                        <?php } ?>
                    </tr>
                </thead>
				<tbody>
                    <?php
                    $k = 1;
                    $sum = 0;
                    $ep = 0;
                    $cp = 0;
                    $map = 0;
                    $ap = 0;
                    foreach ($item['tour_plan_det'] as $key => $val) {
                        if($val['meal_plan_id'] == 1){
                            $ep = 1;
							$meal_name = "EP";
                        }
                        if($val['meal_plan_id'] == 2){
                            $cp = 1;
							$meal_name = "CP";
                        }
                        if($val['meal_plan_id'] == 3){
                            $map = 1;
							$meal_name = "MAP";
                        }
                        if($val['meal_plan_id'] == 4){
                            $ap = 1;
							$meal_name = "AP";
                        }
                        if ($val['is_own_arrangement'] == 1) { ?>
                            <tr>
                                <td style="border:1px solid black;text-align: center"><?php echo date("d-m-Y", strtotime($val['check_in_date'])); ?></td>
                                <td style="border:1px solid black;text-align: center"><?php echo date("d-m-Y", strtotime($val['check_out_date'])); ?></td>
                                <td style="border:1px solid black;text-align: center">Own Arrangements</td>
                                <td></td><td></td><td></td><td></td><td></td><td></td>
                            </tr>
                            <?php } else {
                            $sdate = $val['check_in_date'];
                            $hname = $val['object_name'];
                            $cat = $val['room_category_name'];
                           ?>
                            <tr><td style="border:1px solid black;text-align: center"><?php echo date("d-m-Y", strtotime($val['check_in_date'])); ?></td>
                            <td style="border:1px solid black;text-align: center"><?php echo date("d-m-Y", strtotime($val['check_out_date'])); ?></td>

                            <td style="border:1px solid black;text-align: center"><?php echo $val['no_of_days']; ?></td>
                            <td style="border:1px solid black;text-align: center"><?php echo $val['geog_name']; ?></td>
                            <td style="border:1px solid black;text-align: center"><?php echo $hname; ?></td>
                            <td style="border:1px solid black;text-align: center"><?php echo $cat; ?></td>
                            <td style="border:1px solid black;text-align: center"><?php echo $meal_name; ?></td>
                            <?php if($item['object_det'][0]['no_of_double_room'] > 0){ ?>
                                <td style="border:1px solid black;text-align: center"><?php echo $val['no_of_double_room']; ?></td>
                            <?php } ?>
                            <?php if($item['object_det'][0]['no_of_single_room'] > 0){ ?>
                                <td style="border:1px solid black;text-align: center"><?php echo $val['no_of_single_room']; ?></td>
                            <?php } ?>
                            </tr>
                        <?php }

                    } ?>
                </tbody>
            </table>

	<?php
        if($item['object_det'][0]['no_of_adult'] > 0){
            $enquiry_no_of_adult = $item['object_det'][0]['no_of_adult']." Adults";
        }
        else{
            $enquiry_no_of_adult = "";
        }
       if($item['object_det'][0]['no_of_child_with_bed'] > 0){
            $enquiry_no_of_child = " + ".$item['object_det'][0]['no_of_child_with_bed']." Child";
       }
       else{
            $enquiry_no_of_child = "";
       }
       if($item['object_det'][0]['no_of_child_without_bed'] > 0){
            $enquiry_no_of_child_wb = " + ".$item['object_det'][0]['no_of_child_without_bed']." Child Without Bed";
        }
        else{
            $enquiry_no_of_child_wb = "";
        }
        $tpcfor = $enquiry_no_of_adult.$enquiry_no_of_child.$enquiry_no_of_child_wb;
    ?>

	<label style="background-color:yellow;"><b>Total Package cost for <?php echo $tpcfor; ?> : Rs.<?php echo $item['iti_cost_datas'][0]['tpc']; ?>/-Inclusive of all taxes.</b></label>
    <?php if ($cp > 0) { ?><p>CP: Room + Breakfast Only</p> <?php } ?>
    <?php if ($map > 0) { ?><p>MAP: Room + Breakfast + Lunch/ Dinner only</p><?php } ?>
    <?php if ($ap > 0) { ?><p>AP: Room + Breakfast + Lunch + Dinner Only</p><?php } ?>
    <?php if($index == $total_count){ ?>
    <p id="dyn_multiple_iti"></p>
    <label style="background-color:#ff99c2;"><b>Rooms/Rates are subject to availability at the time of booking.</b></label><br><br><br>
  <?php if(isset($item['object_det'][0]) && $item['object_det'][0]['is_vehicle_required'] == 1) { ?>
<b><u>Itinerary</u></b>
<?php
$k = 1;
foreach ($item['iti_data'] as $keys => $vals) {
    $loc_name = isset($vals['geog_name']) ? $vals['geog_name'] : '';
    $location_id = isset($vals['location_id']) ? intval($vals['location_id']) : 0;
    
    // Initialize arrays to track sightseeing types
    $all_sightseeing = [];
    $has_pax_sightseeing = false;
    $has_non_pax_sightseeing = false;
    
    // Parse ss_data_json to extract sightseeing items
    $sightseeing_ids = [];
    $ss_data_json_str = isset($vals['ss_data_json']) ? $vals['ss_data_json'] : '[]';
    $ss_parsed = json_decode($ss_data_json_str, true);
    $sightseeing_items = [];
    
    if (is_array($ss_parsed)) {
        foreach ($ss_parsed as $item_ss) {
            if (isset($item_ss['ss_data']) && is_array($item_ss['ss_data'])) {
                $sightseeing_items = array_merge($sightseeing_items, $item_ss['ss_data']);
            } elseif (is_array($item_ss)) {
                $sightseeing_items[] = $item_ss;
            }
        }
    }
    
    // Process sightseeing items and collect IDs
    foreach ($sightseeing_items as $val1) {
        $ss_id = isset($val1['sightseeing_id']) ? intval($val1['sightseeing_id']) : 0;
        $ss_name = isset($val1['name']) ? trim($val1['name']) : '';
        
        if ($ss_id > 0) {
            $sightseeing_ids[] = $ss_id;
        } else {
            // For ID=0 or negative (e.g., Leisure or custom)
            if (!empty($ss_name)) {
                $all_sightseeing[] = [
                    'name' => $ss_name,
                    'description' => ($ss_name !== 'Leisure' ? 'Explore ' . $ss_name . ' at your own pace in ' . $loc_name . '.' : 'Day at leisure to explore ' . $loc_name . ' at your own pace.'),
                    'is_pax' => 0
                ];
                $has_non_pax_sightseeing = true;
            }
        }
    }
    
    // Fetch specific sightseeing details if IDs present (with is_pax field)
    if (!empty($sightseeing_ids)) {
        $ss_details = $Enquiry_model->getMultipleSightseeingWithPax($sightseeing_ids);
        
        if (!empty($ss_details)) {
            foreach ($ss_details as $ss) {
                $is_pax = isset($ss['is_pax']) ? intval($ss['is_pax']) : 0;
                
                if ($is_pax == 1) {
                    $has_pax_sightseeing = true;
                } else {
                    $has_non_pax_sightseeing = true;
                }
                
                $all_sightseeing[] = [
                    'name' => isset($ss['sightseeing_name']) ? trim($ss['sightseeing_name']) : '',
                    'description' => isset($ss['sightseeing_description']) ? trim($ss['sightseeing_description']) : '',
                    'is_pax' => $is_pax
                ];
            }
        }
    }
    
    // Determine what to display based on is_pax conditions
    $final_sightseeing = [];
    
    if ($has_pax_sightseeing && !$has_non_pax_sightseeing) {
        // Case 1: ONLY pax sightseeing - use location description from geography table
        $location_desc = $Enquiry_model->getLocationDescription($location_id);
        
        if (!empty($location_desc) && isset($location_desc[0]['geog_description']) && !empty($location_desc[0]['geog_description'])) {
            $final_sightseeing[] = [
                'name' => $loc_name,
                'description' => $location_desc[0]['geog_description']
            ];
        } else {
            $final_sightseeing[] = [
                'name' => $loc_name,
                'description' => 'Explore ' . $loc_name . ' at your own pace.'
            ];
        }
    } elseif (!$has_pax_sightseeing && $has_non_pax_sightseeing) {
        // Case 2: ONLY non-pax sightseeing - use their descriptions
        foreach ($all_sightseeing as $ss) {
            if ($ss['is_pax'] == 0) {
                $final_sightseeing[] = $ss;
            }
        }
    } elseif ($has_pax_sightseeing && $has_non_pax_sightseeing) {
        // Case 3: BOTH pax and non-pax - use ONLY non-pax descriptions
        foreach ($all_sightseeing as $ss) {
            if ($ss['is_pax'] == 0) {
                $final_sightseeing[] = $ss;
            }
        }
    } else {
        // Case 4: NO sightseeing at all - check geography description first
        if ($location_id > 0) {
            $location_desc = $Enquiry_model->getLocationDescription($location_id);
            
            if (!empty($location_desc) && isset($location_desc[0]['geog_description']) && !empty($location_desc[0]['geog_description'])) {
                $final_sightseeing[] = [
                    'name' => $loc_name,
                    'description' => $location_desc[0]['geog_description']
                ];
            } else {
                // Try default sightseeing
                $default_sightseeing = $Enquiry_model->getAllSightseeingByLocation($location_id);
                
                if (!empty($default_sightseeing)) {
                    foreach ($default_sightseeing as $ss) {
                        $is_pax = isset($ss['is_pax']) ? intval($ss['is_pax']) : 0;
                        
                        // Only include non-pax default sightseeing
                        if ($is_pax == 0) {
                            $final_sightseeing[] = [
                                'name' => isset($ss['sightseeing_name']) ? trim($ss['sightseeing_name']) : '',
                                'description' => isset($ss['sightseeing_description']) ? trim($ss['sightseeing_description']) : '',
                                'is_pax' => $is_pax
                            ];
                        }
                    }
                }
            }
        }
        
        // Final fallback: Generic leisure
        if (empty($final_sightseeing)) {
            $final_sightseeing[] = [
                'name' => 'Leisure',
                'description' => 'Day at leisure to explore ' . $loc_name . ' at your own pace.'
            ];
        }
    }
    
    // Check if this is the departure day
    $end_date = isset($item['object_det'][0]['end_date']) ? $item['object_det'][0]['end_date'] : '';
    if (isset($vals['tour_date']) && !empty($end_date) && date("d-m-Y", strtotime($vals['tour_date'])) == date("d-m-Y", strtotime($end_date))) {
        $departure_location = isset($vals['departure_location_name']) ? $vals['departure_location_name'] : (isset($dep_name[0]['geog_name']) ? $dep_name[0]['geog_name'] : '');
        ?>
        <p><b>Day <?php echo $k++; ?> (<?php echo date("d-m-Y", strtotime($vals['tour_date'])); ?>) - Departure Transfer</b></p>
        <p>Transfer to <?php echo $departure_location; ?>. Back to home with sweet memories of your tour</p>
    <?php } else { 
        // Display the day header
        $day_title = '';
        if (count($final_sightseeing) == 1 && $final_sightseeing[0]['name'] == 'Leisure') {
            $day_title = $loc_name;
        } else {
            // Collect all sightseeing names for the title
            $ss_names = array_filter(array_column($final_sightseeing, 'name'));
            $day_title = !empty($ss_names) ? implode(' & ', $ss_names) : $loc_name;
        }
        ?>
        <p><b>Day <?php echo $k++; ?> (<?php echo isset($vals['tour_date']) ? date("d-m-Y", strtotime($vals['tour_date'])) : ''; ?>) - <?php echo $day_title; ?></b></p>
        <?php
        // Display all sightseeing descriptions
        foreach ($final_sightseeing as $idx => $ss) {
            if (!empty($ss['description'])) {
                // If multiple sightseeing, show the name as a sub-heading
                if (count($final_sightseeing) > 1 && $ss['name'] != 'Leisure') {
                    echo '<p><b>' . htmlspecialchars($ss['name']) . ':</b> ' . htmlspecialchars($ss['description']) . '</p>';
                } else {
                    echo '<p>' . htmlspecialchars($ss['description']) . '</p>';
                }
            }
        }
    } ?>
<?php } ?>
<?php
}
$v_listt = '';
$v_lists = "Vehicle as per requirement";
if(isset($item['tour_plan_det'][0]['vehicle_details'])) {
    $vehicle_details = json_decode($item['tour_plan_det'][0]['vehicle_details']);
    if(!empty($vehicle_details) && is_array($vehicle_details)){
        foreach ($vehicle_details as $keyv => $valv) {
            if(isset($valv->vehicle_model)) {
                $veh = $valv->vehicle_model;
                $v_listt = $v_listt.$veh.", ";
            }
        }
        if(!empty($v_listt)) {
            $v_lists = rtrim($v_listt, ", ");
        }
    }
}
?>

    <p><b>Package Includes:</b></p>
    <div><ul>
            <li>Accommodation on twin/double sharing basis on food plan stated above.</li>
            <?php if($item['object_det'][0]['is_vehicle_required'] == 1) { ?>
                <li>All transfers and sightseeing arrangements by<b><?php echo $v_lists; ?></b> as per itinerary.</li>
            <?php } ?>
            <li>Vehicle at your disposal as per the itinerary.</li>
            <li>Services of well experienced driver.</li>
            <li>Driver Allowance, toll, parking fee, Night halt charges, inter- state permit and govt. applicable service tax.</li>
            <li>Child below 5 years on Complimentary basis.</li>
            <li>All applicable taxes.</li>
            <li style='list-style-type: none;'>
            <b>Houseboat (Applicable, if included in the itinerary).</b><ul>
            <li>Check in 12.30 PM and Check out Time in 09.00 AM at Houseboat.</li>
            <li>One night accommodation with Lunch, Evening Tea Snacks, Dinner, and Breakfast; only Traditional Kerala Food will be Served On Houseboat.</li>
            <li>As per Government Regulation cruising will not permitted after 06.00PM.</li>
            <li>A/c will be provided from 08.30 PM to next day morning 06.00 AM.</li>
            <li>In House boat Air condition will be available only on bedrooms, in all category.</li>
            <li>Stable electricity couldn't be guaranteed being it depends on weather conditions.</li>
            <li>Do not compare Houseboat rooms with the hotel rooms, as they are compact & smaller in size.</li>
            <li>Houseboat shall be sailing through small streams & canals through villages and by the sunset shall be anchored near shore / jetty till morning.</li>
            <li>Because of the water body, just to avoid flying insects / mosquito; lights shall be operational only in the room after sunset.</li>
            <li>There won’t be anything for the entertainment in the houseboat like TV / Indoor games. Houseboats are just to experience the back waters of Kerala.</li>
            <li>Houseboat crew members are not hospitality professionals. Majority are local villagers and could not expect fluent Hindi / English.</li>
            </ul>
    </li></ul></div>
    <p><b>Package Excludes:</b></p>
    <div><ul>
            <li>Any other services or food which are not mentioned in the above "Includes" section.</li>
            <li>Expense of personal nature such as tips, laundry, telephones, beverages etc</li>
            <li>Airfares and Train ticket charges if any</li>
            <li>Christmas Eve /New year Eve supplement charges if applicable.</li>
            <li>Any entrance Fees / Activities charges unless specific in inclusion.</li>
    </ul></div>
    <p><b>Note:</b></p>
        <?php 
        if($item['object_det'][0]['no_of_adult'] > 0){
            $noadults = $item['object_det'][0]['no_of_adult']." Adult"; 
        }
        else{
            $noadults = '';
        }    
        if($item['object_det'][0]['no_of_child_with_bed'] > 0){
            $nocbed = " + ".$item['object_det'][0]['no_of_child_with_bed']." Child With Bed"; 
        }
        else{
            $nocbed = '';
        }    
        if($item['object_det'][0]['no_of_child_without_bed'] > 0){
            $nocwbed = " + ".$item['object_det'][0]['no_of_child_without_bed']." Child Without Bed"; 
        }
        else{
            $nocwbed = '';
        }
        if($item['object_det'][0]['no_of_double_room'] > 0){
            $no_of_double = " ( ".$item['object_det'][0]['no_of_double_room']." Double Room"; 
        }
        else{
            $no_of_double = '';
        }   
        if($item['object_det'][0]['no_of_single_room'] > 0){
            $no_of_single = ", ".$item['object_det'][0]['no_of_single_room']." Single Room"; 
        }
        else{
            $no_of_single = '';
        }   
        if($item['object_det'][0]['no_of_single_room'] > 0){
            $noextras = ", ".$item['object_det'][0]['no_of_single_room']." Extra Bed"; 
        }
        else{
            $noextras = '';
        }     
        $noadults_tot = $noadults.$nocbed.$nocwbed.$no_of_double.$no_of_single.$noextras." ) ";   
        ?>
    <div><ul>
            <li>Given quote is valid for minimum <b><?php echo $noadults_tot ; ?></b> paying persons only.</li>
            <li>Confirmations of hotels are subject to availability.</li>
            <li>Slight alterations in the accommodation may become unavoidable due to unavailability of rooms in mentioned hotels, but the accommodation so provided will be of the same class.</li>
            <li>Check in time 1400 Hrs and Check out time 1200 Hrs for all Hotels</li>
            <li>This quote is valid for 7 days only.</li>
            <li>Rooms mentioned at all Hill Stations (Munnar, Thekkady, Ooty, Wayanad, Kodaikanal etc) are generally Non A/c, Otherwise specified.</li>
            <li>Vehicle at disposable from 8 AM to 8 PM as per above itinerary. Any additional sightseeing will be charged extra.</li>
            <li>Hotels will provide either extra Mattress or extra bed as per the Hotel Policy and availability, in case applicable in the package.</li>
            <li>The food service at respective hotels depends on hotel occupancy. In case of low occupancy a Set Menu for a fixed price will be provided by the hotel as per your chosen food plan.</li>
            <li>Please provide your GST no and billing details at the time of booking. Changes of GST details will not be entertained later.</li>
            <li>Kindly note that if agent does not provided GST number at the time of confirmation the final invoice will be treated as unregistered dealer.</li>
            <li>We will not be responsible for any loss which may happen by availing additional paid activities through the driver or other sources during the tour.</li>
    </ul></div>
    <p><b>Payments</b></p>
    <p><b>Please refer the Proforma Invoice to make the payments</b></p>
    <p><b>Cancellation policy:</b></p>
    <p>
    Cancellation Charges are based on how many days before your booked arrival time KHM receives your cancellation notice. These charges are a percentage of the total cost of your booked accommodation.
    </p>
    <table style='border:1px solid black !important;width:75%;'><tr style='border:1px solid black !important;'><td style='border:1px solid black !important;text-align:center;'>In the case of Holiday Package Bookings Period within which written notice of cancellation is received</td><td style='border:1px solid black !important;text-align:center;'>Cancellation charges will be - -% of total booking price</td></tr>
    <tr style='border:1px solid black !important;'><td style='border:1px solid black !important;text-indent:25%;'>0 – 10 days</td><td style='border:1px solid black !important;text-indent:25%;'>100%</td></tr>
    <tr style='border:1px solid black !important;'><td style='border:1px solid black !important;text-indent:25%;'>11 - 30 days</td><td style='border:1px solid black !important;text-indent:25%;'>30%</td></tr>
    <tr style='border:1px solid black !important;'><td style='border:1px solid black !important;text-indent:25%;'>Greater than 30 days</td><td style='border:1px solid black !important;text-indent:25%;'>0%</td></tr></table>
    <p>However, during the peak season, the cancellation policy will be based on the terms and conditions as applicable at various hotels and houseboats.</p>

    <p><b>Thanks 'N' Regards,</b></p>
    <p><?php echo $user_details[0]['entity_name']; ?></p>
   
    </div>                                
</textarea>
<?php } } ?>
<script>
$(document).ready(function() {
    tinyMCE.init({
        mode: "exact",
        elements: "multiple_iti_sheet_template",  // The ID of your textarea element
        readonly : false,
        setup: function(ed) {
            ed.onInit.add(function(ed) {
                // TinyMCE has been initialized
               
            });
        }
    });
});
</script>
