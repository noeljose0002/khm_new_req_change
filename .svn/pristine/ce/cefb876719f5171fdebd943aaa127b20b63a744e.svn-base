<?php
use App\Models\Enquiry_m;
$Enquiry_model = new Enquiry_m();
$arr_name = $Enquiry_model->getLocationNamebyid($object_det[0]['arrival_location']);
$dep_name = $Enquiry_model->getLocationNamebyid($object_det[0]['departure_location']);
$user_details = $Enquiry_model->getuserdetails(session('user_id'));
$plus = " + ";
$comma = " , ";
ob_start();
?>
<table style="width:100%;border-collapse: collapse;border:1px solid black;">
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>Ref No</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['ref_no']; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <b>Confirmation No</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['ref_no']; ?>
                </td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>Agent Name</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['agent_name']?$object_det[0]['agent_name']:''; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <b>Guest Name</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['guest_name']; ?>
                </td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>Address</b>
                </td>
                <td style="border:1px solid black;text-align:left;width:500px;">
                    <?php 
                    $agent_addr = json_decode($object_det[0]['agent_address']);
                    if(!empty($agent_addr)){
                        $agent_address = $agent_addr[0];
                    }
                    else{
                        $agent_address = "";
                    }
                    echo $agent_address; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <b>Address</b>
                </td>
                <td style="border:1px solid black;text-align:left;width:500px;">
                    <?php 
                    $guest_addr = json_decode($object_det[0]['guest_address']);
                    if(!empty($guest_addr)){
                        $guest_address = $guest_addr[0];
                    }
                    else{
                        $guest_address = "";
                    }
                    echo $guest_address; ?>
                </td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>City</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['agent_location']?$object_det[0]['agent_location']:''; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <b>City</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['guest_location']?$object_det[0]['guest_location']:''; ?>
                </td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>State</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['agent_state']?$object_det[0]['agent_state']:''; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <b>State</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    
                </td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>GST No</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['agent_gst']?$object_det[0]['agent_gst']:''; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                   
                </td>
                <td style="border:1px solid black;text-align:left">
                    
                </td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>Arrival Date</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo date("d-m-Y", strtotime($object_det[0]['start_date'])); ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                   <b>Departure Date</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo date("d-m-Y", strtotime($object_det[0]['end_date'])); ?>
                </td>
            </tr>
            <?php if($object_det[0]['is_vehicle_required'] == 1) { ?>
                <tr>
                    <td style="border:1px solid black;text-align:left">
                        <b>Arrival Place</b>
                    </td>
                    <td style="border:1px solid black;text-align:left">
                        <?php echo $object_det[0]['arrival_loc']; ?>
                    </td>
                    <td style="border:1px solid black;text-align:left">
                    <b>Departure Place</b>
                    </td>
                    <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['departure_loc']; ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>No of Adults</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['no_of_adult']; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                   <b>No of Child without Bed</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['no_of_child_without_bed']; ?>
                </td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>No of Child with Bed</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['no_of_child_with_bed']; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                   <b>No of Rooms</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    Double(<?php echo $object_det[0]['no_of_double_room']; ?>), Single(<?php echo $object_det[0]['no_of_single_room']; ?>)
                </td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:left">
                    <b>No of Extra Bed</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    <?php echo $object_det[0]['no_of_extra_bed']; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                   <b>Status</b>
                </td>
                <td style="border:1px solid black;text-align:left">
                    Confirmed
                </td>
            </tr>
            <tr>
                <td style="border:1px solid black;text-align:left;">
                <b>Cut-Off Date</b>
                </td>
                <td style="border:1px solid black;text-align:left;">
                    <?php  echo $object_det[0]['cut_off_date']?date("d-m-Y", strtotime($object_det[0]['cut_off_date'])):''; ?>
                </td>
                <td style="border:1px solid black;text-align:left">
                 
                </td>
                <td style="border:1px solid black;text-align:left">
                  
                </td>
            </tr>
    </table>
    <?php
// Get the output and store into variable
$first_table_html = ob_get_clean();

// Combine the new table and existing itinerary
$combined_html = $first_table_html . $iti_cost_datas[0]['itinerary'];


ob_start();
?>
    <p><b>Payments</b></p>
    <table style="width: 100%;border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;text-align: center;"><b>Beneficiary Name</b></td>
            <td style="border: 1px solid black;text-align: center;"><b>Bank Name</b></td>
            <td style="border: 1px solid black;text-align: center;"><b>Branch Details</b></td>
            <td style="border: 1px solid black;text-align: center;"><b>Account Type</b></td>
            <td style="border: 1px solid black;text-align: center;"><b>Account Number</b></td>
            <td style="border: 1px solid black;text-align: center;"><b>NEFT/RTGS : IFSC Code</b></td>
            <td style="border: 1px solid black;text-align: center;"><b>QR Code</b></td>
        </tr>
        <tr>
            <td rowspan="2" style="border: 1px solid black;text-align: center;">Kaduna Hospitality Pvt Ltd</td>
            <td style="border: 1px solid black;text-align: center;">HDFC Bank Ltd</td>
            <td style="border: 1px solid black;text-align: center;">
                Ravipuram Branch<br>
                Elmar Square<br>
                M.G Road<br>
                Kochi - 682 016, Kerala
            </td>
            <td style="border: 1px solid black;text-align: center;" >Current</td>
            <td style="border: 1px solid black;text-align: center;">0020862000029</td>
            <td style="border: 1px solid black;text-align: center;">HDFC0000020</td>
            <td rowspan="2" style="border: 1px solid black;text-align: center;"><img src="<?php echo base_url('assets/images/qr_code.jpg');?>"></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;text-align: center;">ICICI Bank Ltd</td>
            <td style="border: 1px solid black;text-align: center;">
                Kadavanthara Branch<br>
                Sahodaran Ayyappan Rd,<br>
                Kochi - 682 020, Kerala
            </td>
            <td style="border: 1px solid black;text-align: center;">Current</td>
            <td style="border: 1px solid black;text-align: center;">027705002910</td>
            <td style="border: 1px solid black;text-align: center;">ICIC0000277</td>
        </tr>
    </table>
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

    <p>
        Thank you for your attention to this matter. Should you have any further questions or require additional information, feel free to reach out
    </p>
    <p><b>Thanks 'N' Regards,</b></p>
    <?php
        $footer_html = ob_get_clean();
        $combined_html .= $footer_html;
    ?>
    <textarea name="final_iti_sheet_template" id="final_iti_sheet_template" style="width:100%; height:1000px;"><?php echo $combined_html; ?></textarea>
    
   
