<?php
use App\Models\Enquiry_m;
$Enquiry_model = new Enquiry_m();
$arr_name = $Enquiry_model->getLocationNamebyid($object_det[0]['arrival_location']);
$dep_name = $Enquiry_model->getLocationNamebyid($object_det[0]['departure_location']);
$user_details = $Enquiry_model->getuserdetails(session('user_id'));
$plus = " + ";
$comma = " , ";

if (!empty($iti_cost_datas[0]['itinerary'])) {
?>

<textarea name="iti_sheet_template" id="iti_sheet_template" style="width:100%; height:1000px;"><?php echo $iti_cost_datas[0]['itinerary']; ?></textarea>
<?php } else { ?>
<textarea name="iti_sheet_template" id="iti_sheet_template" style="width:100%; height:1000px;"> 
    <div class="container">
    	<p>Dear Sir / Madam,</p> <p><b><i>Greetings from Touracle – The preferred South India Tour operator.</i></b><p>
    	<p>Thank you for your enquiry. We are pleased to submit the travel itinerary we have prepared exclusively for you</p>
    	
        <p><b>Dates : </b><?php echo date("d-m-Y", strtotime($object_det[0]['start_date'])); ?> to <?php echo date("d-m-Y", strtotime($object_det[0]['end_date'])); ?></p>
    	<p><b>Duration : </b><?php echo $object_det[0]['no_of_night'];?> Nights and <?php echo $object_det[0]['no_of_night']+1; ?> Days</p>
		<p><b>No of Persons : </b>
			<?php if($object_det[0]['no_of_adult'] > 0) { echo $object_det[0]['no_of_adult']; ?> Adults <?php } ?>
			<?php if($object_det[0]['no_of_child_with_bed'] > 0) { echo $comma.$object_det[0]['no_of_child_with_bed']; ?> Child with Bed<?php } ?>
			<?php if($object_det[0]['no_of_child_without_bed'] > 0) { echo $comma.$object_det[0]['no_of_child_without_bed']; ?> Child without Bed <?php } ?>
		</p>
		<p><b>Number of room : </b>
			<?php if($object_det[0]['no_of_double_room'] > 0) { echo $object_det[0]['no_of_double_room']; ?> Double Room <?php } ?>
			<?php if($object_det[0]['no_of_single_room'] > 0) { echo $plus.$object_det[0]['no_of_single_room']; ?> Single Room <?php } ?>
			<?php if($object_det[0]['no_of_extra_bed'] > 0) { echo $plus.$object_det[0]['no_of_extra_bed']; ?> Extra Bed <?php } ?>
		</p>
		<?php if($object_det[0]['is_vehicle_required'] == 1) { ?>
			<p><b>Arrival : </b><?php echo $arr_name[0]['geog_name']; ?></p>
			<p><b>Departure : </b><?php echo $dep_name[0]['geog_name']; ?></p>
		<?php } ?>
        <div style="width: 100%; overflow-x: auto;">
		<table style="width:auto; min-width:600px;border-collapse: collapse;border: 1px solid black;">
                <thead>
                    <tr>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;word-wrap: break-word;padding:6px 10px;"><b>Check In</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;word-wrap: break-word;padding:6px 10px;"><b>Check Out</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;word-wrap: break-word;padding:6px 10px;"><b>No Of Night</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;word-wrap: break-word;padding:6px 10px;"><b>Place</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;word-wrap: break-word;padding:6px 10px;"><b>Hotel</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;word-wrap: break-word;padding:6px 10px;"><b>Room Type</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;word-wrap: break-word;padding:6px 10px;"><b>Room Category</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;word-wrap: break-word;padding:6px 10px;"><b>Meal Plan</b></td>
                        <td style="border:1px solid black;text-align:center;background-color:#4baf58;color:#fff;word-wrap: break-word;padding:6px 10px;"><b>No of Rooms</b></td>
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
                    
                    // Collect all lines
                    $all_lines = array();
                    foreach ($iti_data as $key => $val) {
                        // Skip the last date if it's the end date (no accommodation row for departure)
                        if (isset($val['tour_date']) && date("d-m-Y", strtotime($val['tour_date'])) == date("d-m-Y", strtotime($object_det[0]['end_date']))) {
                            continue;
                        }
                        
                        $meal_name = "";
                        $meal_plan_id = isset($val['meal_plan_id']) ? $val['meal_plan_id'] : 0;
                        
                        if($meal_plan_id == 1){
                            $ep = 1;
							$meal_name = "EP";
                        }
                        if($meal_plan_id == 2){
                            $cp = 1;
							$meal_name = "CP";
                        }
                        if($meal_plan_id == 3){
                            $map = 1;
							$meal_name = "MAP";
                        }
                        if($meal_plan_id == 4){
                            $ap = 1;
							$meal_name = "AP";
                        }
                        
                        $is_own_arrangement = isset($val['is_own_arrangement']) ? $val['is_own_arrangement'] : 0;
                        
                        $tour_date = isset($val['tour_date']) ? $val['tour_date'] : '';
                        
                        if ($is_own_arrangement == 1) {
                            $all_lines[] = array(
                                'checkin' => $tour_date,
                                'place' => isset($val['geog_name']) ? $val['geog_name'] : '',
                                'hotel' => '',
                                'room_type' => 'Own Arrangement',
                                'cat' => '',
                                'meal' => '',
                                'rooms' => 0,
                                'is_own' => true
                            );
                        } else {
                            $tour_details_id = isset($val['tour_details_id']) ? $val['tour_details_id'] : 0;
                            $geog_name = isset($val['geog_name']) ? $val['geog_name'] : '';
                            $object_name = isset($val['object_name']) ? $val['object_name'] : '';
                            $room_category_name = isset($val['room_category_name']) ? $val['room_category_name'] : '';
                            
                            // Get expansion data for this specific date
                            $expansion_rows = array();
                            
                            // Check if expansion data exists for this tour_details_id and date
                            if ($tour_details_id > 0 && !empty($tour_date)) {
                                if (!empty($itinerary_expansion_details[$tour_details_id])) {
                                    foreach ($itinerary_expansion_details[$tour_details_id] as $exp) {
                                        if (isset($exp['tour_expansion_date']) && $exp['tour_expansion_date'] === $tour_date) {
                                            $expansion_rows[] = $exp;
                                        }
                                    }
                                }
                                
                                // If no expansion data, fall back to tour_expansion_details
                                if (empty($expansion_rows) && !empty($tour_expansion_details[$tour_details_id])) {
                                    foreach ($tour_expansion_details[$tour_details_id] as $exp) {
                                        if (isset($exp['tour_expansion_date']) && $exp['tour_expansion_date'] === $tour_date) {
                                            $expansion_rows[] = $exp;
                                        }
                                    }
                                }
                            }
                            
                            // If still no expansion data, use base tour_plan data
                            if (empty($expansion_rows)) {
                                $expansion_rows[] = $val; // Use the itinerary details itself
                            }
                            
                            // Group expansion rows by room type (double/single), room category, and meal plan
                            $grouped_rows = array();
                            foreach ($expansion_rows as $exp_row) {
                                $room_cat = isset($exp_row['room_category_name']) ? $exp_row['room_category_name'] : 
            (isset($room_category_name) ? $room_category_name : 
             (!empty($tour_expansion_details[$tour_details_id][0]['room_category_name']) ? $tour_expansion_details[$tour_details_id][0]['room_category_name'] : 'N/A'));
                                $meal = isset($exp_row['meal_plan_name']) ? $exp_row['meal_plan_name'] : $meal_name;
                                
                                // Create a combined key for grouping by room_category and meal_plan only
                                $combined_key = $room_cat . '|' . $meal;
                                
                                // Initialize the group if it doesn't exist
                                if (!isset($grouped_rows[$combined_key])) {
                                    $grouped_rows[$combined_key] = [
                                        'room_category' => $room_cat,
                                        'meal_plan' => $meal,
                                        'double_count' => 0,
                                        'single_count' => 0
                                    ];
                                }
                                
                                // Determine if this is double or single and add to counts
                                $has_double = (isset($exp_row['room_rate_double']) && $exp_row['room_rate_double'] > 0) || 
                                              (isset($exp_row['double_room']) && $exp_row['double_room'] > 0);
                                $has_single = (isset($exp_row['room_rate_single']) && $exp_row['room_rate_single'] > 0) || 
                                              (isset($exp_row['single_room']) && $exp_row['single_room'] > 0);
                                
                                if ($has_double) {
                                    $grouped_rows[$combined_key]['double_count']++;
                                }
                                
                                if ($has_single) {
                                    $grouped_rows[$combined_key]['single_count']++;
                                }
                            }
                            
                            // If no grouped rows, create default entry
                            if (empty($grouped_rows)) {
                                $default_key = $room_category_name . '|' . $meal_name;
                                $grouped_rows[$default_key] = [
                                    'room_category' => $room_category_name,
                                    'meal_plan' => $meal_name,
                                    'double_count' => isset($val['double_room']) ? $val['double_room'] : $object_det[0]['no_of_double_room'],
                                    'single_count' => isset($val['single_room']) ? $val['single_room'] : $object_det[0]['no_of_single_room']
                                ];
                            }
                            
                            // Collect lines for double and single
                            foreach ($grouped_rows as $group) {
                                if ($group['double_count'] > 0) {
                                    $all_lines[] = array(
                                        'checkin' => $tour_date,
                                        'place' => $geog_name,
                                        'hotel' => $object_name,
                                        'room_type' => 'Double',
                                        'cat' => $group['room_category'],
                                        'meal' => $group['meal_plan'],
                                        'rooms' => $group['double_count'],
                                        'is_own' => false
                                    );
                                }
                                if ($group['single_count'] > 0) {
                                    $all_lines[] = array(
                                        'checkin' => $tour_date,
                                        'place' => $geog_name,
                                        'hotel' => $object_name,
                                        'room_type' => 'Single',
                                        'cat' => $group['room_category'],
                                        'meal' => $group['meal_plan'],
                                        'rooms' => $group['single_count'],
                                        'is_own' => false
                                    );
                                }
                            }
                        }
                    }
                    
                    // Now group consecutive lines with same key
                    $groups = array();
                    $current_group = null;
                    foreach ($all_lines as $line) {
                        $key_parts = array($line['place'], $line['hotel'], $line['room_type'], $line['cat'], $line['meal']);
                        $key = implode('|', $key_parts);
                        $line_checkout = date('Y-m-d', strtotime($line['checkin'] . ' +1 day'));
                        
                        if ($current_group !== null && $current_group['key'] === $key && $current_group['checkout'] === $line['checkin']) {
                            // Extend the group
                            $current_group['nights'] += 1;
                            $current_group['checkout'] = $line_checkout;
                            // Assume rooms are consistent; add check if needed: if ($current_group['rooms'] != $line['rooms']) { /* handle */ }
                        } else {
                            if ($current_group !== null) {
                                $groups[] = $current_group;
                            }
                            $current_group = array(
                                'key' => $key,
                                'checkin' => $line['checkin'],
                                'checkout' => $line_checkout,
                                'nights' => 1,
                                'place' => $line['place'],
                                'hotel' => $line['hotel'],
                                'room_type' => $line['room_type'],
                                'cat' => $line['cat'],
                                'meal' => $line['meal'],
                                'rooms' => $line['rooms'],
                                'is_own' => $line['is_own']
                            );
                        }
                    }
                    if ($current_group !== null) {
                        $groups[] = $current_group;
                    }
                    
                    // Output grouped rows
                    foreach ($groups as $group) {
                        $formatted_checkin = date("d-m-Y", strtotime($group['checkin']));
                        $formatted_checkout = date("d-m-Y", strtotime($group['checkout']));
                        ?>
                        <tr>
                            <td style="border:1px solid black;text-align: center;word-wrap: break-word;"><?php echo $formatted_checkin; ?></td>
                            <td style="border:1px solid black;text-align: center;word-wrap: break-word;"><?php echo $formatted_checkout; ?></td>
                            <?php if ($group['is_own']) { ?>
                                <td style="border:1px solid black;text-align: center;word-wrap: break-word;" colspan="7">Own Arrangements</td>
                            <?php } else { ?>
                                <td style="border:1px solid black;text-align: center;word-wrap: break-word;"><?php echo $group['nights']; ?></td>
                                <td style="border:1px solid black;text-align: center;word-wrap: break-word;"><?php echo htmlspecialchars($group['place']); ?></td>
                                <td style="border:1px solid black;text-align: center;word-wrap: break-word;"><?php echo htmlspecialchars($group['hotel']); ?></td>
                                <td style="border:1px solid black;text-align: center;word-wrap: break-word;"><?php echo $group['room_type']; ?></td>
                                <td style="border:1px solid black;text-align: center;word-wrap: break-word;"><?php echo htmlspecialchars($group['cat']); ?></td>
                                <td style="border:1px solid black;text-align: center;word-wrap: break-word;"><?php echo $group['meal']; ?></td>
                                <td style="border:1px solid black;text-align: center;word-wrap: break-word;"><?php echo $group['rooms']; ?></td>
                            <?php } ?>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>
	<?php
        if($object_det[0]['no_of_adult'] > 0){
            $enquiry_no_of_adult = $object_det[0]['no_of_adult']." Adults";
        }
        else{
            $enquiry_no_of_adult = "";
        }
       if($object_det[0]['no_of_child_with_bed'] > 0){
            $enquiry_no_of_child = " + ".$object_det[0]['no_of_child_with_bed']." Child";
       }
       else{
            $enquiry_no_of_child = "";
       }
       if($object_det[0]['no_of_child_without_bed'] > 0){
            $enquiry_no_of_child_wb = " + ".$object_det[0]['no_of_child_without_bed']." Child Without Bed";
        }
        else{
            $enquiry_no_of_child_wb = "";
        }
        $tpcfor = $enquiry_no_of_adult.$enquiry_no_of_child.$enquiry_no_of_child_wb;
    ?>
    <br>
	<label style="background-color:yellow;"><b>Total Package cost for <?php echo $tpcfor; ?> : Rs.<?php echo $iti_cost_datas[0]['tpc']; ?>/-Inclusive of all taxes.</b></label>
     
        <?php if($is_bifurcation == 1) { 
               if($bifur_double[0]['grand_total'] > 0){
            ?>
                    <p><label><b>Package cost per person on double sharing : Rs.<?php echo $bifur_double[0]['grand_total']; ?>/- inclusive of all taxes</b></label></p>
            <?php } if($bifur_single[0]['grand_total'] > 0){ ?>
                    <p><label><b>Package cost per person on single sharing : Rs.<?php echo $bifur_single[0]['grand_total']; ?>/- inclusive of all taxes</b></label></p>
            <?php } if($bifur_child[0]['grand_total'] > 0){ ?>
                    <p><label><b>Package cost per person on child with bed : Rs.<?php echo $bifur_child[0]['grand_total']; ?>/- inclusive of all taxes</b></label></p>
            <?php } if($bifur_child_wb[0]['grand_total'] > 0){ ?>
                    <p><label><b>Package cost per person on child without bed : Rs.<?php echo $bifur_child_wb[0]['grand_total']; ?></b>/- inclusive of all taxes</label></p>
            <?php } if($bifur_extra[0]['grand_total'] > 0){ ?>
                    <p><label><b>Package cost per person on extra person(Extra person adult) : Rs.<?php echo $bifur_extra[0]['grand_total']; ?>/- inclusive of all taxes</b></label></p>
            <?php } if($bifur_double[0]['grand_total'] > 0){ ?>
                    <p><label><i>Note : Minimum pax required to avail the above rate : <?php echo $object_det[0]['no_of_adult']; ?> Adults (<?php echo $object_det[0]['no_of_double_room']; ?> Double Rooms + <?php echo $object_det[0]['no_of_single_room']; ?> Single Room) , <?php echo $object_det[0]['no_of_child_with_bed']; ?> Child with Bed , <?php echo $object_det[0]['no_of_child_without_bed']; ?> Child without Bed</i></label> </p>
        <?php } } ?>
    
    <?php if ($cp > 0) { ?><p>CP: Room + Breakfast Only</p> <?php } ?>
    <?php if ($map > 0) { ?><p>MAP: Room + Breakfast + Lunch/ Dinner only</p><?php } ?>
    <?php if ($ap > 0) { ?><p>AP: Room + Breakfast + Lunch + Dinner Only</p><?php } ?>

    <p><label style="background-color:#ff99c2;"><b>Rooms are subject to availability at the time of booking.</b></label></p>
    
        
    <?php if($object_det[0]['is_vehicle_required'] == 1) { ?>
    <b><u>Itinerary</u></b>
	<?php
    $k = 1;
    foreach ($iti_data as $keys => $vals) {
        $loc_name = isset($vals['geog_name']) ? $vals['geog_name'] : '';
        $location_id = isset($vals['location_id']) ? intval($vals['location_id']) : 0;
        
        
        // DEBUG LOG
        error_log("=== DAY $k Processing START ===");
        error_log("Location: $loc_name (ID: $location_id)");
        error_log("Raw ss_data_json: " . (isset($vals['ss_data_json']) ? $vals['ss_data_json'] : 'NOT SET'));
        
        // Initialize arrays to track sightseeing types
        $all_sightseeing = [];
        $has_pax_sightseeing = false;
        $has_non_pax_sightseeing = false;
        
        // Parse ss_data_json to extract sightseeing items
        $sightseeing_ids = [];
        $ss_data_json_str = isset($vals['ss_data_json']) ? $vals['ss_data_json'] : '[]';
        $ss_parsed = json_decode($ss_data_json_str, true);
        $sightseeing_items = [];
        
        error_log("JSON parsed successfully: " . (is_array($ss_parsed) ? 'YES' : 'NO'));
        error_log("Parsed data: " . print_r($ss_parsed, true));
        
        if (is_array($ss_parsed)) {
            foreach ($ss_parsed as $item) {
                if (isset($item['ss_data']) && is_array($item['ss_data'])) {
                    $sightseeing_items = array_merge($sightseeing_items, $item['ss_data']);
                } elseif (is_array($item)) {
                    // Fallback if direct array of ss items
                    $sightseeing_items[] = $item;
                }
            }
        }
        
        error_log("Total sightseeing items extracted: " . count($sightseeing_items));
        error_log("Sightseeing items: " . print_r($sightseeing_items, true));
        
        // Process sightseeing items and collect IDs
        foreach ($sightseeing_items as $val1) {
            $ss_id = isset($val1['sightseeing_id']) ? intval($val1['sightseeing_id']) : 0;
            $ss_name = isset($val1['name']) ? trim($val1['name']) : '';
            
            error_log("Processing item - ID: $ss_id, Name: $ss_name");
            
            if ($ss_id > 0) {
                $sightseeing_ids[] = $ss_id;
                error_log("Added to sightseeing_ids array: $ss_id");
            } else {
                // For ID=0 or negative (e.g., Leisure or custom), add directly with generic description
                if (!empty($ss_name)) {
                    error_log("Adding custom/leisure sightseeing: $ss_name");
                    $all_sightseeing[] = [
                        'name' => $ss_name,
                        'description' => ($ss_name !== 'Leisure' ? 'Explore ' . $ss_name . ' at your own pace in ' . $loc_name . '.' : 'Day at leisure to explore ' . $loc_name . ' at your own pace.'),
                        'is_pax' => 0  // Treat custom/leisure as non-pax
                    ];
                    $has_non_pax_sightseeing = true;
                }
            }
        }
        
        error_log("Sightseeing IDs to fetch: " . print_r($sightseeing_ids, true));
        
        // Fetch specific sightseeing details if IDs present (with is_pax field)
        if (!empty($sightseeing_ids)) {
            error_log("Fetching sightseeing details from database...");
            $ss_details = $Enquiry_model->getMultipleSightseeingWithPax($sightseeing_ids);
            error_log("Fetched " . count($ss_details) . " sightseeing records");
            error_log("Fetched details: " . print_r($ss_details, true));
            
            if (!empty($ss_details)) {
                foreach ($ss_details as $ss) {
                    $is_pax = isset($ss['is_pax']) ? intval($ss['is_pax']) : 0;
                    
                    error_log("Sightseeing: " . $ss['sightseeing_name'] . " - is_pax: $is_pax");
                    
                    // Track if we have pax or non-pax sightseeing
                    if ($is_pax == 1) {
                        $has_pax_sightseeing = true;
                        error_log("Found PAX sightseeing");
                    } else {
                        $has_non_pax_sightseeing = true;
                        error_log("Found NON-PAX sightseeing");
                    }
                    
                    $all_sightseeing[] = [
                        'name' => isset($ss['sightseeing_name']) ? trim($ss['sightseeing_name']) : '',
                        'description' => isset($ss['sightseeing_description']) ? trim($ss['sightseeing_description']) : '',
                        'is_pax' => $is_pax
                    ];
                }
            }
        }
        
        error_log("has_pax_sightseeing: " . ($has_pax_sightseeing ? 'TRUE' : 'FALSE'));
        error_log("has_non_pax_sightseeing: " . ($has_non_pax_sightseeing ? 'TRUE' : 'FALSE'));
        error_log("all_sightseeing count: " . count($all_sightseeing));
        
        // Determine what to display based on is_pax conditions
        $final_sightseeing = [];
        
        if ($has_pax_sightseeing && !$has_non_pax_sightseeing) {
            error_log("CASE 1: Only PAX sightseeing - fetching location description from geography table");
            // Case 1: ONLY pax sightseeing exists - use location description from geography table (NOT sightseeing descriptions)
            $location_desc = $Enquiry_model->getLocationDescription($location_id);
            error_log("Location description result: " . print_r($location_desc, true));
            
            if (!empty($location_desc) && !empty($location_desc[0]['geog_description'])) {
                error_log("Using geography description: " . $location_desc[0]['geog_description']);
                $final_sightseeing[] = [
                    'name' => $loc_name,
                    'description' => $location_desc[0]['geog_description']
                ];
            } else {
                error_log("No geography description found, using fallback");
                // Fallback to generic description if geography description is empty
                $final_sightseeing[] = [
                    'name' => $loc_name,
                    'description' => 'Explore ' . $loc_name . ' at your own pace.'
                ];
            }
        } elseif (!$has_pax_sightseeing && $has_non_pax_sightseeing) {
            error_log("CASE 2: Only NON-PAX sightseeing - using non-pax descriptions");
            // Case 2: ONLY non-pax sightseeing exists - use their descriptions
            foreach ($all_sightseeing as $ss) {
                if ($ss['is_pax'] == 0) {
                    error_log("Adding non-pax: " . $ss['name']);
                    $final_sightseeing[] = $ss;
                }
            }
        } elseif ($has_pax_sightseeing && $has_non_pax_sightseeing) {
            error_log("CASE 3: Both PAX and NON-PAX exist - using only non-pax");
            // Case 3: BOTH pax and non-pax exist - use ONLY non-pax descriptions
            foreach ($all_sightseeing as $ss) {
                if ($ss['is_pax'] == 0) {
                    error_log("Adding non-pax: " . $ss['name']);
                    $final_sightseeing[] = $ss;
                }
            }
        } else {
            error_log("CASE 4: NO sightseeing at all - checking geography description first");
            // Case 4: NO sightseeing at all from ss_data_json
            // First priority: Use location description from geography table
            if ($location_id > 0) {
                error_log("Fetching location description for location_id: $location_id");
                $location_desc = $Enquiry_model->getLocationDescription($location_id);
                error_log("Location description result: " . print_r($location_desc, true));
                
                if (!empty($location_desc) && !empty($location_desc[0]['geog_description'])) {
                    error_log("Using geography description: " . $location_desc[0]['geog_description']);
                    $final_sightseeing[] = [
                        'name' => $loc_name,
                        'description' => $location_desc[0]['geog_description']
                    ];
                } else {
                    error_log("No geography description, trying default sightseeing");
                    // If no geography description, try default sightseeing
                    $default_sightseeing = $Enquiry_model->getAllSightseeingByLocation($location_id);
                    error_log("Default sightseeing result: " . print_r($default_sightseeing, true));
                    
                    if (!empty($default_sightseeing)) {
                        foreach ($default_sightseeing as $ss) {
                            $is_pax = isset($ss['is_pax']) ? intval($ss['is_pax']) : 0;
                            
                            // Only include non-pax default sightseeing
                            if ($is_pax == 0) {
                                error_log("Adding default non-pax: " . $ss['sightseeing_name']);
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
            
            // Final fallback: Generic leisure if still empty
            if (empty($final_sightseeing)) {
                error_log("No data found anywhere, using generic leisure");
                $final_sightseeing[] = [
                    'name' => 'Leisure',
                    'description' => 'Day at leisure to explore ' . $loc_name . ' at your own pace.'
                ];
            }
        }
        
        error_log("Final sightseeing count: " . count($final_sightseeing));
        error_log("Final sightseeing data: " . print_r($final_sightseeing, true));
        error_log("=== DAY $k Processing END ===\n");
        
        // Check if this is the departure day
        if (isset($vals['tour_date']) && date("d-m-Y", strtotime($vals['tour_date'])) == date("d-m-Y", strtotime($object_det[0]['end_date']))) {
            $departure_location = isset($vals['departure_location_name']) ? $vals['departure_location_name'] : $dep_name[0]['geog_name'];
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
		$vehicle_details = json_decode($tour_plan_det[0]['vehicle_details']);
        if(!empty($vehicle_details)){
            foreach ($vehicle_details as $keyv => $valv) {
                $veh = $valv->vehicle_model;
                $v_listt = $v_listt.$veh.", ";
                
            }
            $v_lists = rtrim($v_listt, ", ");
        } else {
            $v_lists = "Vehicle as per requirement";
        }
    ?>
    <p><b>Package Includes:</b></p>
    <div><ul>
            <li>Accommodation on twin/double sharing basis on food plan stated above.</li>
            <?php if($object_det[0]['is_vehicle_required'] == 1) { ?>
                <li>All transfers and sightseeing arrangements by<b> <?php echo $v_lists; ?></b> as per itinerary.</li>
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
            <li>There won't be anything for the entertainment in the houseboat like TV / Indoor games. Houseboats are just to experience the back waters of Kerala.</li>
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
        if($object_det[0]['no_of_adult'] > 0){
            $noadults = $object_det[0]['no_of_adult']." Adult"; 
        }
        else{
            $noadults = '';
        }    
        if($object_det[0]['no_of_child_with_bed'] > 0){
            $nocbed = " + ".$object_det[0]['no_of_child_with_bed']." Child With Bed"; 
        }
        else{
            $nocbed = '';
        }    
        if($object_det[0]['no_of_child_without_bed'] > 0){
            $nocwbed = " + ".$object_det[0]['no_of_child_without_bed']." Child Without Bed"; 
        }
        else{
            $nocwbed = '';
        }
        if($object_det[0]['no_of_double_room'] > 0){
            $no_of_double = " ( ".$object_det[0]['no_of_double_room']." Double Room"; 
        }
        else{
            $no_of_double = '';
        }   
        if($object_det[0]['no_of_single_room'] > 0){
            $no_of_single = ", ".$object_det[0]['no_of_single_room']." Single Room"; 
        }
        else{
            $no_of_single = '';
        }   
        if($object_det[0]['no_of_extra_bed'] > 0){
            $noextras = ", ".$object_det[0]['no_of_extra_bed']." Extra Bed"; 
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
<p>Please review the details at your earliest convenience, and we look forward to receiving your confirmation. If you require any amendments or support regarding the itinerary from our end, please do not hesitate to contact us. </p>
    <p><b>Thanks 'N' Regards,</b></p>
    <p><?php echo $user_details[0]['entity_name']; ?></p>
   
    </div>                                
</textarea>
<?php } ?>

<table style="float:right;">
    <tr>
        <td style="padding:5px;">
            <button 
                type="button" 
                id="save_iti_btn" 
                class="btn btn-success btn-sm" 
                style="float:right;margin-right:20px;"
                <?php echo ($iti_cost_datas[0]['cs_confirmed_id'] > 0) ? 'disabled' : ''; ?>
            >
                Save
            </button>
        </td>
    </tr>
</table>