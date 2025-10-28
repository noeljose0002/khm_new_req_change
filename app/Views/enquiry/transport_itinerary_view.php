<?php
use App\Models\Enquiry_m;
$Enquiry_model = new Enquiry_m();
    $g_mobiles = json_decode($cdata[0]['guest_mobile'], true);
    //$g_mobile = is_array($g_mobiles) && count($g_mobiles) > 0 ? $g_mobiles[0] : '';
if(!empty($cdata[0]['transporter_mail'])){
	$emails = json_decode($cdata[0]['transporter_mail'], true);
	$email = is_array($emails) && count($emails) > 0 ? $emails[0] : '';
}
else{
	$email = '';
}
?>
        <div class="row" style="padding-bottom:10px;">    
            <div class="col">
                <div>
                    <label class="form-label small-label mandatory" for="mobile">To</label>
                    <input type="text" name="transport_mail_to" id="transport_mail_to" value="<?php echo $email; ?>" class="form-control form-control-sm">
                  
                </div>
            </div>
            <div class="col">
                <div style="padding-top:20px;">
                    <button type="" id="btn_transport_send_mail" class="btn btn-success">Send Mail</button>
                </div>
            </div>
        </div>   
        <div class="d-flex justify-content-center">
			<button class="btn btn-primary" id="spinner_draft_transport" type="button" style="display: none;">
				<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
				    Sending Mail...Please wait...
			</button>
		</div>
<div class="container">
    <textarea name="transport_itinerary_template" id="transport_itinerary_template" style="width:100%; height:1000px;">
    <table style="width:100%;border-collapse: collapse;">
            <tr>
                <td style="text-align:center;"><img src="<?php echo base_url('assets/images/photos/logo_touracle.png');?>"></td>
            </tr>
    </table>
    <table style="width:100%;border-collapse: collapse;border: 1px solid black;">
            <tr>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Guest Name</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['guest_name'];?>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Ref Number</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['ref_no'];?>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Mobile Number(Guest)</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                    <?php echo $g_mobiles;?>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Departure Date</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo date("d-m-Y", strtotime($cdata[0]['date_of_tour_completion']));?>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Arrival Date</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo date("d-m-Y", strtotime($cdata[0]['date_of_tour_start']));?>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Departure Place</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['dep_location'];?>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Arrival place</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['arr_location'];?>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Driver Name</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['driver_name'];?>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Vehicle Type</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['vehicle_model_name']; ?>, Vehicle No : <?php echo $cdata[0]['vehicle_no']; ?>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Mobile Number(Driver)</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['phone_number'];?>
                </td>
            </tr> 
            <tr>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Arrival Time</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo date("d-m-Y h:i A", strtotime($cdata[0]['f_arrival_date'])); ?>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Departure Time</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo date("d-m-Y h:i A", strtotime($cdata[0]['f_departure_date'])); ?>
                </td>
            </tr> 
            <tr>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Mode Of Arrival</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['moa_arr'];?>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Mode Of Departure</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['moa_dep'];?>
                </td>
            </tr> 
            <tr>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Flight/Train No (Arrival)</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['ftn_arr'];?>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <b>Flight/Train No (Departure)</b>
                </td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                <?php echo $cdata[0]['ftn_dep'];?>
                </td>
            </tr> 
      
    </table>
   
    <table style="width:100%;border-collapse: collapse;border: 1px solid black;">
      
            <tr>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;background-color:#4baf58;color:#fff;width:80px;"><b>Day</b></td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;background-color:#4baf58;color:#fff;"><b>Sight Seeing</b></td>
                <td style="text-align:left;border-collapse: collapse;border: 1px solid black;background-color:#4baf58;color:#fff;width:200px;"><b>Hotel & Contact Details</b></td>
            </tr>
      
       
    <?php
    $k = 1;
    foreach ($cdata as $key => $val) {
        $h_dets = [];
        $ssdet = [];
        $ss_name = "";
        $ss_des = "";
        $hotel_name = "";
        $hotel_address = "";
        $hotel_phone_no = "";
        $sight_sseing_id = "";
        foreach ($val['cost'] as $key1 => $val1) { 
            if($val1['cost_component_id'] == 21 && $val1['room_type_id'] == 1){
                $sight_sseing_id = $val1['tariff'];
            }
        }
        $ssdet = $Enquiry_model->getSightName($sight_sseing_id);
        if(!empty($ssdet)){
            $ss_name = $ssdet[0]['object_name'];
            $ss_des = $ssdet[0]['sightseeing_description'];
        }
        $h_dets = $Enquiry_model->get_hotel_name_byid($val['hotel_id']);
        if(!empty($h_dets)){
            $hotel_name = $h_dets[0]['object_name'];
            $hotel_address = $h_dets[0]['object_address'];
            $hotel_phone_no = $h_dets[0]['object_ph_no'];
        }
    ?>
            <tr>
                    <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">Day <?php echo $k++; ?><br><?php echo date("d-m-Y", strtotime($val['tour_date'])); ?></td>
                    <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                        <b><?php echo $val['itinerary_title']; ?></b><br/>
                        <?php echo $val['transport_description']; ?>
                    </td>
                    <td style="text-align:left;border-collapse: collapse;border: 1px solid black;">
                        <?php echo $hotel_name; ?><br/>
                        <?php echo $hotel_address; ?><br/>
                        Ph:<?php echo $hotel_phone_no; ?><br/>
                    </td>
            </tr>
    <?php
        
    }
    ?>
    
    </table>
   
    </textarea>

</div>
