public function itinerary($object_id, $final_save_flag, $edit_id = null, $iti_edit_id = null, $extension_ref_id = null)
    {
        if (!empty(session()->get('user_id'))) {
            $Enquiry_model = new Enquiry_m();
            $Dashboard_model = new Dashboard_m();
            $system_name = session('system_name');
            $markups = $Enquiry_model->get_markup_details($system_name);
            if (!empty($markups)) {
                $mark_up = $markups[0]['mark_up'];
            } else {
                $mark_up = 0;
            }
            $dep_ss = [];
            $tariff_details_iti = [];
            $tour_plan_tariff = [];
            $tour_plan_det = [];
            $itinerary_details = [];
            $itinerary_details_draft = [];
            $itinerary_details_save = [];
            $previous_itinerary_details_save = [];
            $edit_history = [];
            $all_edit_history = [];
            $eighteen_datas_double = [];
            $eighteen_datas_single = [];
            // TWO SEPARATE ARRAYS FOR DIFFERENT PURPOSES
            $tour_expansion_details = []; // For Itinerary Form (old structure)
            $itinerary_expansion_details = []; // For Costing Sheet (new structure)
            $itinerary_details_ids = []; // Collect IDs for costing sheet
            // NEW: Array to store saved sightseeing data by date
            $saved_sightseeing_by_date = [];
            if ($edit_id > 0) {
                $enq_ext_ids = $Enquiry_model->get_enquiry_extensions_byid($edit_id);
                $extension_ref_id_temp = $enq_ext_ids[0]['extension_ref_id'];
            } else {
                $extension_ref_id_temp = 0;
            }
            $object_det = $Enquiry_model->get_object_details($object_id);
            $previous_itinerary_details_save = [];
            $is_fresh = ($edit_id === null);

            if ($edit_id > 0 && $extension_ref_id !== null) {
                // Making a specific tour plan current - load THAT tour plan's previous version
                $enq_ext_ids = $Enquiry_model->get_enquiry_extensions_byid($edit_id);

                if (!empty($enq_ext_ids)) {
                    $tour_plan_ref_id = $enq_ext_ids[0]['tour_plan_ref_id'];
                    $current_extension_ref_id = $enq_ext_ids[0]['extension_ref_id'];

                    log_message('info', '=== MAKE CURRENT MODE ===');
                    log_message('info', 'Loading previous itinerary for tour_plan_ref_id: ' . $tour_plan_ref_id);
                    log_message('info', 'Current extension_ref_id: ' . $current_extension_ref_id);

                    // Load previous version of THIS SPECIFIC tour plan
                    $previous_itinerary_details_save = $Enquiry_model->get_itinerary_previous_details(
                        $current_extension_ref_id,
                        $tour_plan_ref_id,
                        $object_det[0]['enquiry_header_id']
                    );

                    log_message('info', 'Loaded ' . count($previous_itinerary_details_save) . ' records from SPECIFIC tour plan previous version');

                    // Debug: Show what was loaded
                    if (!empty($previous_itinerary_details_save)) {
                        foreach ($previous_itinerary_details_save as $prev) {
                            log_message('debug', 'Previous record: tour_date=' . $prev['tour_date'] . ', tour_details_id=' . $prev['tour_details_id'] . ', extension_ref_id=' . $prev['extension_ref_id']);
                        }
                    }
                }
            } elseif ($is_fresh) {
                // Fresh itinerary - load from last saved (any tour plan)
                log_message('info', '=== FRESH ITINERARY MODE ===');

                $last_itinerary = $Enquiry_model->get_last_itinerary_saved($object_det[0]['enquiry_header_id']);

                if (!empty($last_itinerary)) {
                    log_message('info', 'Loading from last saved itinerary, extension_ref_id: ' . $last_itinerary['extension_ref_id']);

                    // For fresh, use simple extension_ref_id lookup (no tour_plan_ref_id filter)
                    $previous_itinerary_details_save = $Enquiry_model->get_itinerary_previous_details(
                        $last_itinerary['extension_ref_id']
                    );

                    log_message('info', 'Loaded ' . count($previous_itinerary_details_save) . ' records from last saved itinerary');
                } else {
                    log_message('info', 'No previous itinerary found');
                }
            }
            $prev_start_date = null;
            if ($is_fresh && !empty($previous_itinerary_details_save)) {
                $prev_tour_dates = array_column($previous_itinerary_details_save, 'tour_date');
                if (!empty($prev_tour_dates)) {
                    $prev_start_date = min($prev_tour_dates);
                }
            }
                }
            }
            if ($edit_id > 0 && $extension_ref_id !== null && (int)$extension_ref_id === 0) {
                $enq_ext_ids = $Enquiry_model->get_enquiry_extensions_byid($edit_id);
                if (!empty($enq_ext_ids)) {
                    $make_current = $this->make_current_function($object_det[0]['enquiry_header_id'], $enq_ext_ids[0]['enquiry_ref_id'], $enq_ext_ids[0]['tour_plan_ref_id'], $enq_ext_ids[0]['extension_ref_id']);
                    $enquiry_details_id_new = $enq_ext_ids[0]['enquiry_ref_id'];
                    $extension_ref_id_temp = $enq_ext_ids[0]['extension_ref_id'];
                } else {
                    $enquiry_details_id_new = $object_det[0]['enquiry_details_id'];
                }
                $iti_cost_datas = $Enquiry_model->get_iti_cost_byid($edit_id);
            } else {
                $enquiry_details_id_new = $object_det[0]['enquiry_details_id'];
                $iti_cost_datas = $Enquiry_model->get_iti_cost_active($object_det[0]['enquiry_header_id'], $object_det[0]['enquiry_details_id']);
            }
            $tour_plan_det = $Enquiry_model->get_tour_plan_details($object_det[0]['enquiry_header_id'], $enquiry_details_id_new);
            $iti_cost_datas_all = $Enquiry_model->get_iti_cost_all($object_det[0]['enquiry_header_id'], $enquiry_details_id_new);
            foreach ($tour_plan_det as $keys => $vals) {
                $tid = $vals['tour_details_id'];
                $checkindate = $vals['check_in_date'];
                $checkoutdate = $vals['check_out_date'];
                $start1 = new DateTime($checkindate);
                $end1 = new DateTime($checkoutdate);
                // CHECK IF TAX IS APPLICABLE
                // REPLACE THE TAX_STATUS == 1 BLOCK (around line 85-180) with this fixed version:

                if ($vals['tax_status'] == 1) {
                    // TAX APPLICABLE - PRIORITY: itinerary_expansion -> tour_expansion -> tax_tables

                    // STEP 1: Check if itinerary expansion exists (saved/edited state)
                    $itinerary_expansion_for_tour = $Enquiry_model->get_itinerary_expansion_by_tour_id($vals['tour_details_id']);

                    if (!empty($itinerary_expansion_for_tour)) {
                        // PRIORITY 1: Use itinerary expansion (saved data with user modifications)
                        $tour_expansion_details[$tid] = $itinerary_expansion_for_tour;

                        // Calculate totals from itinerary expansion
                        $tac_eighteen = 0;
                        $tac_eighteen_double = 0;
                        $tac_eighteen_single = 0;
                        $adult_eighteen_double = 0;
                        $child_eighteen_double = 0;
                        $child_wb_eighteen_double = 0;
                        $extra_eighteen_double = 0;
                        $adult_eighteen_single = 0;

                        foreach ($itinerary_expansion_for_tour as $exp) {
                            $tac_eighteen += ($exp['double_total_rate'] ?? 0) + ($exp['single_total_rate'] ?? 0);
                            $tac_eighteen_double += ($exp['double_total_rate'] ?? 0);
                            $tac_eighteen_single += ($exp['single_total_rate'] ?? 0);

                            // Apportion by component (simplified - adjust if you have detailed breakdown)
                            $adult_eighteen_double += ($exp['room_rate_double'] ?? 0);
                            $child_eighteen_double += ($exp['child_with_bed_double'] ?? 0);
                            $child_wb_eighteen_double += ($exp['child_without_bed_double'] ?? 0);
                            $extra_eighteen_double += ($exp['extra_bed_double'] ?? 0);
                            $adult_eighteen_single += ($exp['room_rate_single'] ?? 0);
                        }

                        log_message('info', 'Tax case: Using ITINERARY EXPANSION for tour_details_id ' . $tid);
                    } else {
                        // STEP 2: Check if tour expansion exists (fresh load from initial tour plan)
                        $original_tour_expansion = $Enquiry_model->get_tour_expansion_by_tour_id($vals['tour_details_id']);

                        if (!empty($original_tour_expansion)) {
                            // PRIORITY 2: Use tour expansion (initial tour plan data)
                            $tour_expansion_details[$tid] = $original_tour_expansion;

                            // Calculate totals from tour expansion
                            $tac_eighteen = 0;
                            $tac_eighteen_double = 0;
                            $tac_eighteen_single = 0;
                            $adult_eighteen_double = 0;
                            $child_eighteen_double = 0;
                            $child_wb_eighteen_double = 0;
                            $extra_eighteen_double = 0;
                            $adult_eighteen_single = 0;

                            foreach ($original_tour_expansion as $exp) {
                                $tac_eighteen += ($exp['double_total_rate'] ?? 0) + ($exp['single_total_rate'] ?? 0);
                                $tac_eighteen_double += ($exp['double_total_rate'] ?? 0);
                                $tac_eighteen_single += ($exp['single_total_rate'] ?? 0);

                                $adult_eighteen_double += ($exp['room_rate_double'] ?? 0);
                                $child_eighteen_double += ($exp['child_with_bed_double'] ?? 0);
                                $child_wb_eighteen_double += ($exp['child_without_bed_double'] ?? 0);
                                $extra_eighteen_double += ($exp['extra_bed_double'] ?? 0);
                                $adult_eighteen_single += ($exp['room_rate_single'] ?? 0);
                            }

                            log_message('info', 'Tax case: Using TOUR EXPANSION for tour_details_id ' . $tid);
                        } else {
                            // FALLBACK: Generate from tax tables (existing logic)
                            $eighteen_datas_double = $Enquiry_model->get_eighteen_datas_double($vals['tour_details_id']);
                            $eighteen_datas_single = $Enquiry_model->get_eighteen_datas_single($vals['tour_details_id']);

                            $tac_eighteen = 0;
                            $tac_eighteen_double = 0;
                            $tac_eighteen_single = 0;
                            $adult_eighteen_double = 0;
                            $child_eighteen_double = 0;
                            $child_wb_eighteen_double = 0;
                            $extra_eighteen_double = 0;
                            $adult_eighteen_single = 0;

                            // Get room category and meal plan names
                            $room_category_name = $vals['room_category_name'] ?? 'N/A';
                            $meal_plan_name = $vals['meal_plan_name'] ?? 'N/A';

                            if ($room_category_name === 'N/A') {
                                $room_cat_data = $Enquiry_model->get_room_category_by_id($vals['room_category_id']);
                                $room_category_name = $room_cat_data[0]['room_category_name'] ?? 'N/A';
                            }
                            if ($meal_plan_name === 'N/A') {
                                $meal_plan_data = $Enquiry_model->get_meal_plan_by_id($vals['meal_plan_id']);
                                $meal_plan_name = $meal_plan_data[0]['meal_plan_name'] ?? 'N/A';
                            }

                            // Fetch vehicle details from original tour expansion (if exists)
                            $vehicle_details_json = '';
                            $temp_expansion = $Enquiry_model->get_tour_expansion_by_tour_id($vals['tour_details_id']);
                            if (!empty($temp_expansion)) {
                                $vehicle_details_json = $temp_expansion[0]['vehicle_details_json'] ?? '';
                            }

                            // Generate expansion rows from tax tables
                            $tour_expansion_details[$tid] = [];

                            // Process double rooms
                            if (!empty($eighteen_datas_double)) {
                                foreach ($eighteen_datas_double as $geys => $gals) {
                                    $base_total = $gals['room_rate'] +
                                        ($gals['child_rate'] * $gals['no_of_child']) +
                                        ($gals['child_wb_rate'] * $gals['no_of_child_wb']) +
                                        ($gals['extra_rate'] * $gals['no_of_extra']);

                                    $tax_amount = $gals['gst'];
                                    $grand_total = $gals['grand_total'];

                                    $tac_eighteen += $grand_total;
                                    $tac_eighteen_double += $grand_total;

                                    // Apportion tax
                                    $adult_base = $gals['room_rate'];
                                    $adult_tax = ($base_total > 0) ? ($adult_base / $base_total) * $tax_amount : 0;
                                    $adult_eighteen_double += $adult_base + $adult_tax;

                                    $child_base = $gals['child_rate'] * $gals['no_of_child'];
                                    $child_tax = ($base_total > 0) ? ($child_base / $base_total) * $tax_amount : 0;
                                    $child_eighteen_double += $child_base + $child_tax;

                                    $child_wb_base = $gals['child_wb_rate'] * $gals['no_of_child_wb'];
                                    $child_wb_tax = ($base_total > 0) ? ($child_wb_base / $base_total) * $tax_amount : 0;
                                    $child_wb_eighteen_double += $child_wb_base + $child_wb_tax;

                                    $extra_base = $gals['extra_rate'] * $gals['no_of_extra'];
                                    $extra_tax = ($base_total > 0) ? ($extra_base / $base_total) * $tax_amount : 0;
                                    $extra_eighteen_double += $extra_base + $extra_tax;

                                    // Calculate date
                                    $sequence_id = $gals['sequence_id'];
                                    $day_num = floor(($sequence_id % 100) / 10);
                                    $expansion_date = clone $start1;
                                    $expansion_date->modify('+' . ($day_num - 1) . ' days');
                                    $tour_expansion_date = $expansion_date->format('Y-m-d');

                                    // Create expansion row
                                    $expansion_row = [
                                        'tour_details_id' => $vals['tour_details_id'],
                                        'sequence_id' => $gals['sequence_id'],
                                        'room_rate_double' => $gals['room_rate'],
                                        'child_with_bed_double' => $gals['child_rate'],
                                        'child_without_bed_double' => $gals['child_wb_rate'],
                                        'extra_bed_double' => $gals['extra_rate'],
                                        'double_total_rate' => $grand_total,
                                        'single_total_rate' => 0,
                                        'tour_expansion_date' => $tour_expansion_date,
                                        'room_category_id' => $vals['room_category_id'],
                                        'meal_plan_id' => $vals['meal_plan_id'],
                                        'room_category_name' => $room_category_name,
                                        'meal_plan_name' => $meal_plan_name,
                                        'gst' => $gals['gst_percentage'] ?? ($vals['gst'] ?? 0),
                                        'vehicle_details_json' => $vehicle_details_json
                                    ];
                                    $tour_expansion_details[$tid][] = $expansion_row;
                                }
                            }

                            // Process single rooms
                            if (!empty($eighteen_datas_single)) {
                                foreach ($eighteen_datas_single as $sgeys => $sgals) {
                                    $grand_total_single = $sgals['grand_total'];

                                    $tac_eighteen += $grand_total_single;
                                    $tac_eighteen_single += $grand_total_single;

                                    $adult_base_single = $sgals['room_rate'];
                                    $tax_amount_single = $sgals['gst'];
                                    $adult_eighteen_single += $adult_base_single + $tax_amount_single;

                                    // Calculate date
                                    $sequence_id = $sgals['sequence_id'];
                                    $day_num = floor(($sequence_id % 100) / 10);
                                    $expansion_date = clone $start1;
                                    $expansion_date->modify('+' . ($day_num - 1) . ' days');
                                    $tour_expansion_date = $expansion_date->format('Y-m-d');

                                    // Create expansion row
                                    $expansion_row = [
                                        'tour_details_id' => $vals['tour_details_id'],
                                        'sequence_id' => $sgals['sequence_id'],
                                        'room_rate_single' => $sgals['room_rate'],
                                        'child_with_bed_double' => 0,
                                        'child_without_bed_double' => 0,
                                        'extra_bed_double' => 0,
                                        'double_total_rate' => 0,
                                        'single_total_rate' => $grand_total_single,
                                        'tour_expansion_date' => $tour_expansion_date,
                                        'room_category_id' => $vals['room_category_id'],
                                        'meal_plan_id' => $vals['meal_plan_id'],
                                        'room_category_name' => $room_category_name,
                                        'meal_plan_name' => $meal_plan_name,
                                        'gst' => $sgals['gst_percentage'] ?? ($vals['gst'] ?? 0),
                                        'vehicle_details_json' => $vehicle_details_json
                                    ];
                                    $tour_expansion_details[$tid][] = $expansion_row;
                                }
                            }

                            log_message('info', 'Tax case: Generated from TAX TABLES for tour_details_id ' . $tid);
                        }
                    }

                    // Store calculated totals in tour_plan_det
                    $tour_plan_det[$keys]['tac_eighteen'] = $tac_eighteen;
                    $tour_plan_det[$keys]['tac_eighteen_double'] = $tac_eighteen_double;
                    $tour_plan_det[$keys]['tac_eighteen_single'] = $tac_eighteen_single;
                    $tour_plan_det[$keys]['adult_eighteen_double'] = $adult_eighteen_double;
                    $tour_plan_det[$keys]['child_eighteen_double'] = $child_eighteen_double;
                    $tour_plan_det[$keys]['child_wb_eighteen_double'] = $child_wb_eighteen_double;
                    $tour_plan_det[$keys]['extra_eighteen_double'] = $extra_eighteen_double;
                    $tour_plan_det[$keys]['adult_eighteen_single'] = $adult_eighteen_single;

                    // Store names for fallback
                    if (isset($tour_expansion_details[$tid][0])) {
                        $tour_plan_det[$keys]['room_category_name'] = $tour_expansion_details[$tid][0]['room_category_name'] ?? 'N/A';
                        $tour_plan_det[$keys]['meal_plan_name'] = $tour_expansion_details[$tid][0]['meal_plan_name'] ?? 'N/A';
                    }
                } else {
                    // NO TAX - existing logic remains the same
                    $tac_eighteen = 0;
                    $tac_eighteen_double = 0;
                    $tac_eighteen_single = 0;
                    $adult_eighteen_double = 0;
                    $child_eighteen_double = 0;
                    $child_wb_eighteen_double = 0;
                    $extra_eighteen_double = 0;
                    $tax_eighteen_double = 0;
                    $adult_eighteen_single = 0;

                    $tour_plan_det[$keys]['tac_eighteen'] = $tac_eighteen;
                    $tour_plan_det[$keys]['tac_eighteen_double'] = $tac_eighteen_double;
                    $tour_plan_det[$keys]['tac_eighteen_single'] = $tac_eighteen_single;
                    $tour_plan_det[$keys]['adult_eighteen_double'] = $adult_eighteen_double;
                    $tour_plan_det[$keys]['child_eighteen_double'] = $child_eighteen_double;
                    $tour_plan_det[$keys]['child_wb_eighteen_double'] = $child_wb_eighteen_double;
                    $tour_plan_det[$keys]['extra_eighteen_double'] = $extra_eighteen_double;
                    $tour_plan_det[$keys]['adult_eighteen_single'] = $adult_eighteen_single;

                    // Fetch from tour expansion
                    $tour_expansion_details[$tid] = $Enquiry_model->get_tour_expansion_by_tour_id($vals['tour_details_id']);
                }
                // Common for both tax and non-tax
                $tour_plan_tariff[$tid] = $Enquiry_model->get_tour_plan_tariff_bydate($vals['tour_details_id']);
                // NEW: Set SS list per tour location for Select2 population (FIXED: Per-location SS)
                $tour_plan_det[$keys]['ss'] = $Enquiry_model->get_sight_seeing($vals['tour_location']);
                // Fetch itinerary details (draft and save)
                $result1 = $Enquiry_model->get_itinerary_draft_details($object_det[0]['enquiry_header_id'], $enquiry_details_id_new, $vals['tour_details_id']);
                $result2 = $Enquiry_model->get_itinerary_save_details($object_det[0]['enquiry_header_id'], $enquiry_details_id_new, $vals['tour_details_id']);
                if (!empty($result1)) {
                    $itinerary_details_draft = array_merge($itinerary_details_draft, $result1);
                    // FIXED: Always collect IDs, regardless of tax_status (for post-save override)
                    foreach ($result1 as $r) {
                        if (isset($r['itinerary_details_id'])) {
                            $itinerary_details_ids[] = $r['itinerary_details_id'];
                        }
                    }
                }
                if (!empty($result2)) {
                    $itinerary_details_save = array_merge($itinerary_details_save, $result2);
                    // FIXED: Always collect IDs, regardless of tax_status (for post-save override)
                    foreach ($result2 as $r) {
                        if (isset($r['itinerary_details_id'])) {
                            $itinerary_details_ids[] = $r['itinerary_details_id'];
                        }
                    }
                }
                for ($date = clone $start1; $date < $end1; $date->modify('+1 day')) {
                    $tour_date = $date->format('Y-m-d');
                    $tariff_details_iti[] = $this->getTourTariffDetailsbyTourDetails($tour_date, $vals['hotel_id'], $vals['room_category_id'], $vals['meal_plan_id'], $object_det[0]['no_of_double_room'], $object_det[0]['no_of_single_room']);

                    // IMPLEMENTED: Get saved sightseeing for each date
                    $had_saved_record = false;
                    $saved_sightseeing = [];
                    $saved_ss_ids = [];
                    $ss_total_distance = 0;
                    $ss_pax_cost = 0;
                    $ss_total_cost = 0;

                    // CRITICAL: Initialize these at the start (empty by default)
                    $json_special_event = [];
                    $json_addons = [];

                    // FIXED: Only force fresh if explicitly requested via query param
                    $force_fresh = $this->request->getGet('fresh') == '1';

                    // Only load saved data if NOT forcing fresh
                    if (!$force_fresh) {
                        // Check draft itinerary first (if any) and mark that a record existed even if empty
                        if (!empty($itinerary_details_draft)) {
                            foreach ($itinerary_details_draft as $dkey => $dval) {
                                if ($tour_date == $dval['tour_date'] && $vals['tour_details_id'] == $dval['tour_details_id']) {
                                    // Mark that a saved/draft record exists for this date
                                    $had_saved_record = true;

                                    // Decode Sightseeing JSON
                                    $saved_sightseeing = json_decode($dval['ss_data_json'] ?? '[]', true);
                                    $saved_ss_ids = array_column($saved_sightseeing, 'sightseeing_id');

                                    // Calculate totals from JSON
                                    foreach ($saved_sightseeing as $ss) {
                                        if (isset($ss['is_pax']) && $ss['is_pax'] == 1) {
                                            $ss_pax_cost += $ss['calculated_value'] ?? 0;
                                            $ss_total_cost += $ss['calculated_value'] ?? 0;
                                        } else {
                                            $ss_total_distance += $ss['calculated_value'] ?? ($ss['distance_km'] ?? 0);
                                        }
                                    }

                                    // CRITICAL: Load special events and addons from draft
                                    $json_special_event = json_decode($dval['json_special_event'] ?? '[]', true);
                                    if (!is_array($json_special_event)) {
                                        $json_special_event = [];
                                    }

                                    $json_addons = json_decode($dval['json_addons'] ?? '[]', true);
                                    if (!is_array($json_addons)) {
                                        $json_addons = [];
                                    }

                                    log_message('info', 'Loaded from DRAFT for date ' . $tour_date . ': ' .
                                        count($saved_sightseeing) . ' sightseeing, ' .
                                        count($json_special_event) . ' special events, ' .
                                        count($json_addons) . ' hotel facilities');

                                    break;
                                }
                            }
                        }

                        // If not in draft, check saved itinerary (same behavior)
                        if (!$had_saved_record && !empty($itinerary_details_save)) {
                            foreach ($itinerary_details_save as $dkey => $dval) {
                                if ($tour_date == $dval['tour_date'] && $vals['tour_details_id'] == $dval['tour_details_id']) {
                                    $had_saved_record = true;

                                    // Decode Sightseeing JSON
                                    $saved_sightseeing = json_decode($dval['ss_data_json'] ?? '[]', true);
                                    $saved_ss_ids = array_column($saved_sightseeing, 'sightseeing_id');

                                    // Calculate totals
                                    foreach ($saved_sightseeing as $ss) {
                                        if (isset($ss['is_pax']) && $ss['is_pax'] == 1) {
                                            $ss_pax_cost += $ss['calculated_value'] ?? 0;
                                            $ss_total_cost += $ss['calculated_value'] ?? 0;
                                        } else {
                                            $ss_total_distance += $ss['calculated_value'] ?? ($ss['distance_km'] ?? 0);
                                        }
                                    }

                                    // CRITICAL: Load special events and addons from saved
                                    $json_special_event = json_decode($dval['json_special_event'] ?? '[]', true);
                                    if (!is_array($json_special_event)) {
                                        $json_special_event = [];
                                    }

                                    $json_addons = json_decode($dval['json_addons'] ?? '[]', true);
                                    if (!is_array($json_addons)) {
                                        $json_addons = [];
                                    }

                                    log_message('info', 'Loaded from SAVED for date ' . $tour_date . ': ' .
                                        count($saved_sightseeing) . ' sightseeing, ' .
                                        count($json_special_event) . ' special events, ' .
                                        count($json_addons) . ' hotel facilities');

                                    break;
                                }
                            }
                        }
                    }

                    // FIXED: Load from PREVIOUS itinerary if new tour plan (no specific saved record for this segment/date)
                    // Use a separate flag to track preloaded data vs actual saved data
                    // FIXED: Load from PREVIOUS itinerary if new tour plan (no specific saved record for this segment/date)
                    $is_preloaded_from_previous = false;

                    if (
                        !$force_fresh &&
                        !$had_saved_record
                    ) {
                        // Check if current tour plan has a previous_active_tour_id
                        $current_tour_record = $Enquiry_model->get_tour_record_by_id($vals['tour_details_id']);

                        if (!empty($current_tour_record) && !empty($current_tour_record['previous_active_tour_id'])) {
                            $previous_tour_id = $current_tour_record['previous_active_tour_id'];

                            log_message('info', 'Loading previous itinerary data from previous_active_tour_id: ' . $previous_tour_id);

                            // Get the latest itinerary from the previous tour plan
                            $previous_tour_itinerary = $Enquiry_model->get_latest_itinerary_for_tour(
                                $object_det[0]['enquiry_header_id'],
                                $previous_tour_id
                            );

                            if (!empty($previous_tour_itinerary)) {
                                // Match by tour_date (comparing dates, not specific tour_details_id)
                                foreach ($previous_tour_itinerary as $pval) {
                                    if ($tour_date == $pval['tour_date']) {
                                        // CRITICAL FIX: Set BOTH flags
                                        $had_saved_record = true;
                                        $is_preloaded_from_previous = true;

                                        log_message('info', 'Found matching date ' . $tour_date . ' in previous tour plan (preloading)');

                                        // Load Sightseeing
                                        $saved_sightseeing = json_decode($pval['ss_data_json'] ?? '[]', true);
                                        if (!is_array($saved_sightseeing)) {
                                            $saved_sightseeing = [];
                                        }
                                        $saved_ss_ids = array_column($saved_sightseeing, 'sightseeing_id');

                                        // Calculate totals
                                        foreach ($saved_sightseeing as $ss) {
                                            if (isset($ss['is_pax']) && $ss['is_pax'] == 1) {
                                                $ss_pax_cost += $ss['calculated_value'] ?? 0;
                                                $ss_total_cost += $ss['calculated_value'] ?? 0;
                                            } else {
                                                $ss_total_distance += $ss['calculated_value'] ?? ($ss['distance_km'] ?? 0);
                                            }
                                        }

                                        // CRITICAL: Load Special Events
                                        $json_special_event = json_decode($pval['json_special_event'] ?? '[]', true);
                                        if (!is_array($json_special_event)) {
                                            $json_special_event = [];
                                        }

                                        // CRITICAL FIX: Load Hotel Facilities - only if same hotel AND same location
                                        $previous_hotel_id = $pval['hotel_id'] ?? null;
                                        $current_hotel_id = $vals['hotel_id'] ?? null;

                                        log_message('info', 'Addon matching check - Previous hotel_id: ' . $previous_hotel_id .
                                            ' | Current hotel_id: ' . $current_hotel_id);

                                        // Only load addons if same hotel (and hotel_id is not 0 or null)
                                        if (
                                            $previous_hotel_id == $current_hotel_id &&
                                            !empty($previous_hotel_id) &&
                                            $previous_hotel_id > 0
                                        ) {

                                            $json_addons = json_decode($pval['json_addons'] ?? '[]', true);
                                            if (!is_array($json_addons)) {
                                                $json_addons = [];
                                            }
                                            log_message('info', 'Same hotel (ID: ' . $current_hotel_id . ') - loaded ' . count($json_addons) . ' hotel facilities');
                                        } else {
                                            // Different hotel: Don't load addons
                                            $json_addons = [];

                                            $reason = '';
                                            if ($previous_hotel_id != $current_hotel_id) {
                                                $reason = 'hotel mismatch (' . $previous_hotel_id . ' vs ' . $current_hotel_id . ')';
                                            } elseif (empty($previous_hotel_id) || $previous_hotel_id == 0) {
                                                $reason = 'no previous hotel (ID: ' . $previous_hotel_id . ')';
                                            } elseif (empty($current_hotel_id) || $current_hotel_id == 0) {
                                                $reason = 'no current hotel (ID: ' . $current_hotel_id . ')';
                                            }

                                            log_message('info', 'Addons NOT loaded - ' . $reason);
                                        }

                                        log_message('info', 'Preloaded from previous tour for date ' . $tour_date . ': ' .
                                            count($saved_sightseeing) . ' sightseeing, ' .
                                            count($json_special_event) . ' special events, ' .
                                            count($json_addons) . ' hotel facilities');

                                        break;
                                    }
                                }
                            } else {
                                log_message('info', 'No previous itinerary found for previous_active_tour_id: ' . $previous_tour_id);
                            }
                        } else {
                            log_message('info', 'No previous_active_tour_id found for current tour_details_id: ' . $vals['tour_details_id']);
                        }
                    }


                    // Calculate which day number this is (1-indexed)
                    $interval = $start1->diff($date);
                    $day_number = $interval->days + 1; // Day 1, 2, 3, etc.

                    // Calculate total number of days (nights + 1)
                    $total_interval = $start1->diff($end1);
                    $total_days = $total_interval->days + 1; // Total days including departure day

                    // Check if this is the last day (departure day)
                    $is_last_day = ($day_number === $total_days);

                    // Load defaults if: no saved record OR forcing fresh
                    if (!$had_saved_record || $force_fresh) {
                        $saved_sightseeing = [];
                        $saved_ss_ids = [];
                        $ss_total_distance = 0;
                        $ss_pax_cost = 0;
                        $ss_total_cost = 0;
                        // Reset special events and addons when loading defaults
                        $json_special_event = [];
                        $json_addons = [];

                        $totalPax = $object_det[0]['no_of_adult'] + $object_det[0]['no_of_child_with_bed'] + $object_det[0]['no_of_child_without_bed'] + $object_det[0]['no_of_child_below_five'];

                        if ($day_number === 2) {
                            // Day 2: Load default sightseeing for the location
                            $default_ss = $Enquiry_model->get_default_sight_seeing($vals['tour_location']);

                            foreach ($default_ss as $ss) {
                                $ssItem = [
                                    'sightseeing_id' => $ss['sightseeing_id'],
                                    'name' => $ss['object_name'],
                                    'is_pax' => (int)($ss['is_pax'] ?? 0),
                                    'tariff' => (float)($ss['tariff'] ?? 0),
                                    'distance' => (float)($ss['sightseeing_distance'] ?? 0),
                                    'calculated_value' => 0,
                                    'remarks' => '',
                                    'cost' => 0,
                                    'distance_km' => 0
                                ];
                                if ($ssItem['is_pax'] == 1) {
                                    $ssItem['calculated_value'] = $ssItem['tariff'] * $totalPax;
                                    $ssItem['cost'] = $ssItem['calculated_value'];
                                    $ss_pax_cost += $ssItem['calculated_value'];
                                    $ss_total_cost += $ssItem['calculated_value'];
                                } else {
                                    $ssItem['calculated_value'] = $ssItem['distance'];
                                    $ssItem['distance_km'] = $ssItem['calculated_value'];
                                    $ss_total_distance += $ssItem['calculated_value'];
                                }
                                $saved_sightseeing[] = $ssItem;
                                $saved_ss_ids[] = $ss['sightseeing_id'];
                            }
                            log_message('info', 'Loaded default SS for Day 2 (date ' . $tour_date . '): ' . count($saved_sightseeing) . ' items');
                        } elseif ($day_number > 2) {
                            // Days 3 onwards (including last day): Create hardcoded "Leisure" entry
                            $leisure_id = -999;

                            $ssItem = [
                                'sightseeing_id' => $leisure_id,
                                'name' => 'Leisure',
                                'is_pax' => 0,
                                'tariff' => 0,
                                'distance' => 0,
                                'calculated_value' => 0,
                                'remarks' => '',
                                'cost' => 0,
                                'distance_km' => 0,
                                'is_auto_selected' => true,
                                'is_hardcoded' => true
                            ];

                            $saved_sightseeing[] = $ssItem;
                            $saved_ss_ids[] = $leisure_id;

                            $day_type = $is_last_day ? 'Last day/Departure' : 'Day ' . $day_number;
                            log_message('info', 'Hardcoded Leisure SS auto-selected for ' . $day_type . ' (date ' . $tour_date . ', location ' . $vals['tour_location'] . ')');
                        } else {
                            // Day 1: No defaults
                            log_message('info', 'Day 1 (date ' . $tour_date . '): No defaults loaded');
                        }
                    }

                    // Store the sightseeing data with totals
                    if (!isset($saved_sightseeing_by_date[$vals['tour_details_id']])) {
                        $saved_sightseeing_by_date[$vals['tour_details_id']] = [];
                    }

                    // CRITICAL: Ensure arrays are valid before storing
                    if (!is_array($json_special_event)) {
                        $json_special_event = [];
                    }
                    if (!is_array($json_addons)) {
                        $json_addons = [];
                    }

                    

                    $saved_sightseeing_by_date[$vals['tour_details_id']][$tour_date] = [
                        'sightseeing' => $saved_sightseeing,
                        'saved_ss_ids' => $saved_ss_ids,
                        'ss_total_distance' => $ss_total_distance,
                        'ss_pax_cost' => $ss_pax_cost,
                        'ss_total_cost' => $ss_total_cost,
                        'json_special_event' => $json_special_event,  // Now properly loaded
                        'json_addons' => $json_addons,  // Now properly loaded
                        'is_saved' => $had_saved_record,
                        'is_preloaded' => $is_preloaded_from_previous
                    ];
                }
                // NEW: Adjust vehicle distances to base-only model (derive base, no SS addition; JS adds dynamically)
                if (isset($tour_expansion_details[$tid])) {
                    foreach ($tour_expansion_details[$tid] as &$expansion) {
                        // Skip if no date or invalid
                        if (!isset($expansion['tour_expansion_date'])) continue;
                        $expansion_date = $expansion['tour_expansion_date'];

                        // CRITICAL FIX: Only subtract SS distance if ACTUALLY saved (not preloaded)
                        $ss_dist = 0;
                        if (isset($saved_sightseeing_by_date[$tid][$expansion_date])) {
                            $data = $saved_sightseeing_by_date[$tid][$expansion_date];

                            // Only subtract SS if this is a genuinely saved record (not preloaded from previous tour)
                            $is_actually_saved = $data['is_saved'] && !($data['is_preloaded'] ?? false);
                            $ss_dist = $is_actually_saved ? $data['ss_total_distance'] : 0;

                            log_message('info', 'Vehicle adjustment for ' . $expansion_date .
                                ': is_saved=' . ($data['is_saved'] ? 'true' : 'false') .
                                ', is_preloaded=' . (($data['is_preloaded'] ?? false) ? 'true' : 'false') .
                                ', SS distance to subtract=' . $ss_dist . 'km');
                        }

                        $db_total = 0;
                        $base_dist = 0;
                        // Decode vehicle json (assume it's an array of vehicles)
                        $vehicle_details_json = $expansion['vehicle_details_json'] ?? '';
                        $vehicle_details = json_decode($vehicle_details_json, true) ?: [];

                        if (is_array($vehicle_details) && !empty($vehicle_details)) {
                            foreach ($vehicle_details as &$veh) {
                                // Get saved total from DB (previous total or initial base)
                                $db_total = (float)($veh['travel_distance'] ?? 0);

                                // Derive base: saved_total - saved_ss (or db_total - 0 for fresh/default/preloaded)
                                $base_dist = max(0, $db_total - $ss_dist);

                                // Set both to base (display base initially; JS adds current SS)
                                $veh['base_travel_distance'] = $base_dist;
                                $veh['travel_distance'] = $base_dist;  // View displays this as initial total (but it's base)

                                // Optional: Update costing if distance-based (use base for now; JS will recalc total)
                                if (isset($veh['extra_km_rate'])) {
                                    $veh['distance_cost'] = $base_dist * (float)$veh['extra_km_rate'];
                                }
                            }

                            // Re-encode JSON
                            $expansion['vehicle_details_json'] = json_encode($vehicle_details);
                        } else {
                            // No vehicles: Log or set defaults
                            log_message('warning', 'No vehicle details for expansion on ' . $expansion_date);
                        }

                        // Log for debugging
                        log_message('info', 'Expansion date ' . $expansion_date . ': DB Total=' . $db_total . 'km, SS to subtract=' . $ss_dist . 'km, Derived Base=' . $base_dist . 'km');
                    }
                    unset($expansion); // Clean up reference
                }
            }
            // FOR COSTING SHEET: Fetch itinerary expansion details (new structure) for all (including tax post-save)
            if (!empty($itinerary_details_ids)) {
                $itinerary_details_ids = array_unique($itinerary_details_ids);
                // Get expansion data grouped by itinerary_details_id
                $expansion_raw = $Enquiry_model->get_itinerary_expansion_grouped($itinerary_details_ids);
                // Re-group by tour_details_id for easier access in the view
                $itinerary_expansion_details = [];
                // Build a mapping from itinerary_details_id to tour_details_id
                $iti_to_tour_map = [];
                foreach ($itinerary_details_draft as $draft) {
                    $iti_to_tour_map[$draft['itinerary_details_id']] = $draft['tour_details_id'];
                }
                foreach ($itinerary_details_save as $save) {
                    $iti_to_tour_map[$save['itinerary_details_id']] = $save['tour_details_id'];
                }
                // Group expansion data by tour_details_id
                foreach ($expansion_raw as $iti_id => $expansions) {
                    if (isset($iti_to_tour_map[$iti_id])) {
                        $tour_details_id = $iti_to_tour_map[$iti_id];
                        if (!isset($itinerary_expansion_details[$tour_details_id])) {
                            $itinerary_expansion_details[$tour_details_id] = [];
                        }
                        foreach ($expansions as $exp) {
                            $itinerary_expansion_details[$tour_details_id][] = $exp;
                        }
                    }
                }
                // FIXED: Apply base derivation to itinerary_expansion_details (costing sheet structure)
                foreach ($itinerary_expansion_details as $tid => &$exp_group) {
                    foreach ($exp_group as &$expansion) {
                        // Assume structure has 'tour_expansion_date' and 'vehicle_details_json' (adjust if different)
                        if (!isset($expansion['tour_expansion_date'])) continue;
                        $expansion_date = $expansion['tour_expansion_date'];

                        // CRITICAL FIX: Only subtract SS distance if ACTUALLY saved (not preloaded)
                        $ss_dist = 0;
                        if (isset($saved_sightseeing_by_date[$tid][$expansion_date])) {
                            $data = $saved_sightseeing_by_date[$tid][$expansion_date];

                            // Only subtract SS if this is a genuinely saved record (not preloaded from previous tour)
                            $is_actually_saved = $data['is_saved'] && !($data['is_preloaded'] ?? false);
                            $ss_dist = $is_actually_saved ? $data['ss_total_distance'] : 0;
                        }

                        $db_total = 0;
                        $base_dist = 0;
                        // Decode vehicle json (assume similar structure)
                        $vehicle_details_json = $expansion['vehicle_details_json'] ?? '';
                        $vehicle_details = json_decode($vehicle_details_json, true) ?: [];

                        if (is_array($vehicle_details) && !empty($vehicle_details)) {
                            foreach ($vehicle_details as &$veh) {
                                // Get saved total from DB
                                $db_total = (float)($veh['travel_distance'] ?? 0);

                                // Derive base: only subtract SS if genuinely saved
                                $base_dist = max(0, $db_total - $ss_dist);

                                // Set to base
                                $veh['base_travel_distance'] = $base_dist;
                                $veh['travel_distance'] = $base_dist;

                                // Optional costing update
                                if (isset($veh['extra_km_rate'])) {
                                    $veh['distance_cost'] = $base_dist * (float)$veh['extra_km_rate'];
                                }
                            }

                            // Re-encode
                            $expansion['vehicle_details_json'] = json_encode($vehicle_details);
                        }

                        log_message('info', 'Itinerary expansion date ' . $expansion_date . ': Derived Base=' . $base_dist . 'km (SS subtract=' . $ss_dist . 'km)');
                    }
                    unset($expansion); // Clean up
                }
                unset($exp_group); // Clean up
            }
            $all_edit_history = $Enquiry_model->get_all_edit_history($object_det[0]['enquiry_header_id']);
            $data['edit_history'] = $all_edit_history;
            $tour_start_date = $object_det[0]['date_of_tour_start_temp'];
            $today = date('Y-m-d');
            if (empty($tour_plan_det)) {
                session()->setFlashdata('error', 'Tour plan is not created!');
                return redirect()->to('Enquiry/enquiry_list_view/10');
            } else {
                $quick_quote_det = [];
                $object_class_id = 10;
                $entity_id = session('user_id');
                $active_role = session('active_role');
                $all_systems = $Dashboard_model->get_all_systems($entity_id);
                $data['all_systems'] = $all_systems;
                $all_roles = $Dashboard_model->get_all_entity_roles($entity_id);
                if (!empty($all_roles)) {
                    $data['all_roles_assn'] = $all_roles;
                    $all_menus = $Dashboard_model->get_all_role_menus($active_role);
                    if (!empty($all_menus)) {
                        $data['all_menus'] = $all_menus;
                    } else {
                        $data['all_menus'] = [];
                    }
                    $all_permissions = $Dashboard_model->get_all_entity_permissions($active_role, 3);
                    if (!empty($all_permissions)) {
                        $data['all_permissions'] = $all_permissions;
                    } else {
                        $data['all_permissions'] = [];
                    }
                } else {
                    $data['all_roles_assn'] = [];
                    $data['all_menus'] = [];
                    $data['all_permissions'] = [];
                }
                $object_transport_name = '';
                $tour_travel_daily_rate_exist = '';
                $tour_travel_max_km_exist = '';
                $extra_km_rate_exist = '';
                $local_travel_daily_rate_exist = '';
                $local_travel_max_km_exist = '';
                $registration_no_exist = '';
                $is_tour_travel_exist = 1;
                $is_local_travel_exist = 1;
                $is_active_exist = 1;
                $hub_exist = '';
                $mod_exist = '';
                $seat_exist = '';
                $obj_name = '';
                $obj_loc = '';
                $obj_mobile = [];
                $obj_email = [];
                $obj_address = [];
                $all_locations = $Enquiry_model->get_tour_locations();
                $arrival_locations = $Dashboard_model->get_arrival_locations();
                $departure_locations = $Dashboard_model->get_departure_locations();
                $hotel_categories = $Dashboard_model->get_hotel_categories();
                $all_hotels = $Enquiry_model->get_all_hotels();
                $all_room_categories = $Enquiry_model->get_all_room_categories();
                $meal_plans = $Dashboard_model->get_meal_plan();
                $hub_loc = $Dashboard_model->get_hub_location();
                $enterprise_id = 1;
                $object_type_id = 5;
                $parent_menu = $Dashboard_model->get_parent_menus();
                $sub_menu = $Dashboard_model->get_sub_menus();
                $data['parent_menu'] = $parent_menu;
                $data['sub_menu'] = $sub_menu;
                $data['object_class_id'] = $object_class_id;
                $data['object_type_id'] = $object_type_id;
                if (!empty($object_class_det)) {
                    $data['object_class_name'] = $object_class_det[0]['object_class_name'];
                } else {
                    $data['object_class_name'] = null;
                }
                $data['states'] = $Enquiry_model->indian_states();
                $data['all_agents'] = $Enquiry_model->get_all_agents();
                $data['tour_plan_det'] = $tour_plan_det;
                $tour_plan_draft_det = $Enquiry_model->get_tour_plan_draft_details($object_det[0]['enquiry_header_id'], $enquiry_details_id_new);
                $data['tour_plan_draft_det'] = $tour_plan_draft_det;
                if ($object_det[0]['is_quick_quote'] && !empty($tour_plan_det)) {
                    $quick_quote_det = $Enquiry_model->get_quick_quote_details($object_det[0]['enquiry_header_id'], $enquiry_details_id_new, $tour_plan_det[0]['tour_details_id']);
                }
                $dep_ss = $Enquiry_model->get_sight_seeing($object_det[0]['departure_location']);
                $data['dep_ss'] = $dep_ss;
                $data['quick_quote_det'] = $quick_quote_det;
                $data['all_locations'] = $all_locations;
                $data['arrival_locations'] = $arrival_locations;
                $data['departure_locations'] = $departure_locations;
                $data['hotel_categories'] = $hotel_categories;
                $data['all_hotels'] = $all_hotels;
                $data['all_room_categories'] = $all_room_categories;
                $data['meal_plans'] = $meal_plans;
                $data['hub_loc'] = $hub_loc;
                $data['enterprise_id'] = $enterprise_id;
                $data['object_det'] = $object_det;
                $data['obj_name'] = $obj_name;
                $data['obj_loc'] = $obj_loc;
                $data['object_id'] = $object_id;
                $data['tour_plan_tariff'] = $tour_plan_tariff;
                // PASS BOTH EXPANSION ARRAYS TO VIEW

                $data['tour_expansion_details'] = $tour_expansion_details; // For Itinerary Form
                $data['itinerary_expansion_details'] = $itinerary_expansion_details; // For Costing Sheet
                // PASS SAVED SIGHTSEEING DATA TO VIEW
                $data['saved_sightseeing_by_date'] = $saved_sightseeing_by_date;
                $data['itinerary_details_draft'] = $itinerary_details_draft;
                $data['itinerary_details_save'] = $itinerary_details_save;
                $data['tariff_details_iti'] = $tariff_details_iti;
                $data['iti_cost_datas'] = $iti_cost_datas;
                $data['edit_id'] = $edit_id;
                $data['expansion_source'] = [];
                foreach ($tour_plan_det as $tour) {
                    $tid = $tour['tour_details_id'];
                    // If has itinerary_expansion data, mark as itinerary_expansion (saved/edited state)
                    // Otherwise mark as tour_expansion (fresh load)
                    $data['expansion_source'][$tid] = (!empty($itinerary_expansion_details[$tid])) ? 'itinerary_expansion' : 'tour_expansion';
                }
                if (!empty($edit_id)) {
                    if ((int)$iti_edit_id === 0) {
                        $iti_edit_id_temp = 1;
                        $version_count = null;
                    } else {
                        $iti_edit_id_temp = null;
                        $version_count = $iti_edit_id;
                    }
                } else {
                    $iti_edit_id_temp = null;
                    $version_count = null;
                }
                if (!empty($iti_cost_datas_all) && $edit_id == null) {
                    $iti_edit_id_temp = 1;
                    $extension_disable = 1;
                } else {
                    $extension_disable = 0;
                }
                $total_extra_klm_cost = 0;
                $total_permit = 0;
                $data['total_extra_klm_cost'] = $total_extra_klm_cost;
                $data['total_permit'] = $total_permit;
                $data['iti_edit_id'] = $iti_edit_id_temp;
                $data['version_count'] = $version_count;
                $data['mark_up'] = $mark_up;
                $data['final_save_flag'] = $final_save_flag;
                $data['extension_ref_id'] = $extension_ref_id;
                $data['extension_disable'] = $extension_disable;
                $data['extension_ref_id_temp'] = $extension_ref_id_temp;
                $data['tour_plan_ref_id'] = $tour_plan_det[0]['extension_ref_id'];
                $data['previous_itinerary_details_save'] = $previous_itinerary_details_save;
                $data['enquiry_header_id'] = $object_det[0]['enquiry_header_id'];
                $data['enquiry_details_id'] = $object_det[0]['enquiry_details_id'];
                return view('enquiry/itinerary_view', $data);
            }
        } else {
            return redirect()->to('Login');
        }
    }