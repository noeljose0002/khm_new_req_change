<?php
$address = '';
$phno = '';
$vehicle_list = '';
$vehicle_lists =  json_decode($cdata[0]['vehicle_details'],true);
foreach($vehicle_lists as $vkey => $vvals){
    $vehicle_list.=$vvals['vehicle_model'].",";
}
$vehicle_list_new = substr($vehicle_list, 0, -1);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vouchers</title>
  <!-- keep UI minimalistic and unchanged; buttons are small and placed above textarea -->
  <style>
    .pdf-controls{margin-bottom:8px;}
    .pdf-controls button{margin-right:6px;padding:6px 10px;font-size:13px;border-radius:4px;border:1px solid #ccc;background:#fff;cursor:pointer}
    .pdf-controls button.primary{background:#ffcc00;border-color:#d9a200}
    .pdf-controls button.success{background:#4baf58;color:#fff;border-color:#3a8a40}
    /* hidden rendered vouchers (exact HTML as in textarea) */
    .rendered-voucher{display:none}
  </style>
  <!-- html2pdf library (bundled with html2canvas) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>
<body>

<div class="container">

<!-- PDF control buttons generated server-side so UI remains almost identical -->
<div class="pdf-controls">
  <?php foreach($cdata as $key => $val) { ?>
    <button type="button" onclick="syncAndExport('voucher_<?php echo $key;?>','hotel_voucher_template','HotelVoucher_<?php echo $val['reference_id'];?>.pdf')">
      Export <?php echo htmlspecialchars($val['object_name']); ?> Voucher
    </button>
  <?php } ?>

  <?php if($cdata[0]['is_vehicle_required'] == 1) { ?>
    <button type="button" class="success" onclick="syncAndExport('transport_voucher','hotel_voucher_template','TransportVoucher_<?php echo $cdata[0]['ref_no'];?>.pdf')">
      Export Transport Voucher
    </button>
  <?php } ?>
</div>
  <!-- the original textarea (left intact as requested) -->
  <textarea name="hotel_voucher_template" id="hotel_voucher_template" style="width:100%; height:1000px;">
<?php foreach($cdata as $key => $val) { ?>
<div class="editable-voucher" data-voucher-id="voucher_<?php echo $key;?>">
<table style="width:100%; border-collapse: collapse; border: none;">
    <tr>
        <td style="border: none; display: flex; justify-content: space-between; align-items: center;">
           
            <div style="text-align: left;">
                <b>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>TOURACLE | A Unit of Kaduna Hospitality Pvt Ltd</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>602, 6th Floor,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Hi Lite Platino,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Sankar Nagar Colony Road,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Kannadikkadu, Maradu P.O,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Cochin 682304,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Phone: + 91 484 4604774 | Mob: +91 9995821798</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>www.touracle.in Email: mah@touracle.in</i></p>
                </b>
            </div>
             <img src="<?php echo base_url('assets/images/bird_green_new.png');?>" style="width:100px; height:90px; margin-left:20px;">
        </td>
    </tr>
</table>

<table style="width:100%;border-collapse: collapse;border: 1px solid black;">
         <tr>
            <td colspan="2" style="border: 1px solid black;text-align:center;background-color:#ffcc00;color:black;"><b>Hotel Voucher</b></td>
        </tr>
        <tr>
            <td>
                To,
            </td>
            <td style="text-align:right;">
               
                  Confirmation No : <?php echo $val['ref_no']; ?>

            </td>
        </tr>
        <tr>
            <td>
                The Manager
            </td>
            <td style="text-align:right;">
                Date : <?php echo date("d-M-Y", strtotime($cdate)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $val['object_name']; ?>
            </td>
            <td></td>
        </tr>
        <?php if(!empty($val['object_address'])){ 
            $addresses = json_decode($val['object_address'], true);
            $address = is_array($addresses) && count($addresses) > 0 ? $addresses[0] : '';
            ?>
            <tr>
                <td>
                    <?php echo $address; ?>
                </td>
                <td></td>
            </tr>
        <?php } ?>
        <?php if(!empty($val['geog_name'])){ ?>
            <tr>
                <td>
                    <?php echo $val['geog_name']; ?>
                </td>
                <td></td>
            </tr>
        <?php } ?>
        <?php if(!empty($val['object_ph_no'])){ 
            $phnos = json_decode($val['object_ph_no'], true);
            $phno = is_array($phnos) && count($phnos) > 0 ? $phnos[0] : '';
            ?>
            <tr>   
                <td>
                    <?php echo $phno; ?></p>
                </td>
                <td></td>
            </tr>
        <?php } ?>
            
    
</table>
<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
    <tr>
        <td colspan="2" style="text-align:center;border: 1px solid black;background-color:#ffcc00;color:black;"><b>IN EXCHANGE OF THIS VOUCHER PLEASE PROVIDE THE FOLLOWING SERVICES</b></td>
    </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Name of the Guest</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['entity_name']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Reservation No.</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['reference_id']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No. of Adult</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_adult']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No. of Child with bed</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_child_with_bed']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No. Of child(without bed)</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_child_without_bed']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Room Category</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['room_category_name']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No Of Double Room</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_double_room']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No Of Single Room</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_single_room']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No Of Extra Bed</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_extra_bed']; ?></td>
            </tr>
          
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Meal Plan</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['meal_plan_name']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Check in</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($val['check_in_date'])); ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Check out</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($val['check_out_date'])); ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No of Nights</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_days']; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Hotel Booking confirmed by</b></td>
                <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['confirmed_by']; ?></td>
            </tr>
</table>


<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
        <tr>
            <td style="text-align:center;background-color:#009900;color:#fff;border: 1px solid black;"><b>Collect all extras directly from the client</b></td>
        </tr>
            <tr>
                <td>
                    Please Note
                </td>
            </tr>
            <tr>
                <td>
                    1: This voucher has to be produced at the time of your check-in to the Hotel/House Boat.
                </td>
            </tr>
            <tr>
                <td>
                    2 : Cancelation / Extension of stay after check-in depends upon the Hotel/ House Boat policy
                </td>
            </tr>
            <tr>
                <td>
                    3 : Extra charges if any, have to be paid directly to the Hotel.
                </td>
            </tr>
            <tr>
                <td>
                    4. Early check in and late checkout will be as per the availability of rooms and the Hotel policy
                </td>
            </tr>
</table>
<?php
if(!empty($cdata[0]['sop_mobile'])){
    $mobile_nos = json_decode($cdata[0]['sop_mobile'],true);
    $mobile_no = $mobile_nos[0];    
}
else{
    $mobile_no = "";     
}
           
?>
<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Name of Executive: </b><?php echo $cdata[0]['sop_executive']; ?></td>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Mobile No. </b><?php echo $mobile_no; ?></td>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Signature : </b></td>
            </tr>
            <tr>
            <td style="text-align:center;" colspan="3"><img src="<?php echo base_url('assets/images/logo_foot_nw.png');?>" style="width:210px;height:77px;"></td>
            </tr>
</table>
</div>
<?php } ?>
<?php if($cdata[0]['is_vehicle_required'] == 1) { ?>
<div class="editable-voucher" data-voucher-id="transport_voucher">
<hr/>
<h4 style="text-align:center;">Transport Voucher</h4>
<table style="width:100%; border-collapse: collapse; border: none;">
    <tr>
        <td style="border: none; display: flex; justify-content: space-between; align-items: center;">
           
            <div style="text-align: left;">
                <b>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>TOURACLE | A Unit of Kaduna Hospitality Pvt Ltd</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>602, 6th Floor,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Hi Lite Platino,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Sankar Nagar Colony Road,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Kannadikkadu, Maradu P.O,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Cochin 682304,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Phone: + 91 484 4604774 | Mob: +91 9995821798</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>www.touracle.in Email: mah@touracle.in</i></p>
                </b>
            </div>
             <img src="<?php echo base_url('assets/images/bird_green_new.png');?>" style="width:100px; height:90px; margin-left:20px;">
        </td>
    </tr>
</table>
<table style="width:100%;border-collapse: collapse;border: 1px solid black;">
         <tr>
            <td colspan="2" style="border: 1px solid black;text-align:center;background-color:#ffcc00;color:black;"><b>Transport Voucher</b></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">
                <p style="margin-top: 0;margin-bottom: 0rem;">&nbsp;&nbsp;To,</p>
                <p style="margin-top: 0;margin-bottom: 0rem;">&nbsp;&nbsp;The Manager (Transportation)</p>
            </td>
            <td style="border: 1px solid black;">
              
                  <p style="margin-top: 0;margin-bottom: 0rem;">&nbsp;&nbsp;Confirmation No : <?php echo $cdata[0]['ref_no']; ?></p>
                
                  <p style="margin-top: 0;margin-bottom: 0rem;">&nbsp;&nbsp;Date : <?php echo date("d-M-Y", strtotime($cdate)); ?></p>
            </td>
        </tr>
</table>
<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
        <tr>
            <td colspan="2" style="text-align:center;border: 1px solid black;background-color:#4baf58;color:#fff;"><b>In exchange of this voucher, please provide the following services</b></td>
        </tr>
            <tr>
                <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Name of the Guest</b></td>
                <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo $cdata[0]['entity_name']; ?></td>
            </tr>
            <?php if($cdata[0]['is_vehicle_required'] == 1 && !empty($vehicle_list_new)) { ?>
                <tr>
                    <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Vehicle</b></td>
                    <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo $vehicle_list_new; ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Check in</b></td>
                <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($cdata[0]['date_of_tour_start'])); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Check out</b></td>
                <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($cdata[0]['date_of_tour_completion'])); ?></td>
            </tr>
            <tr>
                <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Vehicle Booking confirmed by</b></td>
                <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo $cdata[0]['confirmed_by_name']; ?></td>
            </tr>
            <tr>
                <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Additional services if any</b></td>
                <td style="text-align:left;border:1px solid black;"></td>
            </tr>
</table>

<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
            <tr>
                <td style="text-align:left;border:1px solid black;">
                    <p>&nbsp;&nbsp;Please Note</p>
                    <p>&nbsp;&nbsp;1 : This voucher has to be produced at the time of your check-in to the Hotel/House Boat.</p>
                    <p>&nbsp;&nbsp;2 : Cancelation / Extension of stay after check-in depends upon the Hotel/ House Boat policy</p>
                    <p>&nbsp;&nbsp;3 : Extra charges if any, have to be paid directly to the Hotel.</p>
                </td>
            </tr>
</table>
<table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
            <tr>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Name of Executive: </b><?php echo $cdata[0]['sop_executive']; ?></td>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Mobile No. </b><?php echo $mobile_no; ?></td>
                <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Signature : </b></td>
            </tr>
            <tr>
            <td style="text-align:center;" colspan="3"><img src="<?php echo base_url('assets/images/logo_foot_nw.png');?>" style="width:210px;height:77px;"></td>
            </tr>
</table>
</div>
<?php } ?>

  </textarea>

  <!-- Hidden rendered vouchers (same HTML output but as DOM nodes so html2pdf can render nicely) -->
  <div id="hidden_rendered_vouchers">

    <?php foreach($cdata as $key => $val) { ?>
      <div id="voucher_<?php echo $key;?>" class="rendered-voucher">
        <!-- duplicate the same HTML used inside textarea, but without PHP tags -->
        <div style="padding:10px;">
       <table style="width:100%; border-collapse: collapse; border: none;">
    <tr>
        <td style="border: none; display: flex; justify-content: space-between; align-items: center;">
           
            <div style="text-align: left;">
                <b>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>TOURACLE | A Unit of Kaduna Hospitality Pvt Ltd</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>602, 6th Floor,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Hi Lite Platino,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Sankar Nagar Colony Road,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Kannadikkadu, Maradu P.O,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Cochin 682304,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Phone: + 91 484 4604774 | Mob: +91 9995821798</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>www.touracle.in Email: mah@touracle.in</i></p>
                </b>
            </div>
             <img src="<?php echo base_url('assets/images/bird_green_new.png');?>" style="width:100px; height:90px; margin-left:20px;">
        </td>
    </tr>
</table>

        <table style="width:100%;border-collapse: collapse;border: 1px solid black;">
                 <tr>
                    <td colspan="2" style="border: 1px solid black;text-align:center;background-color:#ffcc00;color:black;"><b>Hotel Voucher</b></td>
                </tr>
                <tr>
                    <td>
                        To,
                    </td>
                    <td style="text-align:right;">
                       
                          Confirmation No : <?php echo $val['ref_no']; ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        The Manager
                    </td>
                    <td style="text-align:right;">
                        Date : <?php echo date("d-M-Y", strtotime($cdate)); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $val['object_name']; ?>
                    </td>
                    <td></td>
                </tr>
                <?php if(!empty($val['object_address'])){ 
                    $addresses = json_decode($val['object_address'], true);
                    $address = is_array($addresses) && count($addresses) > 0 ? $addresses[0] : '';
                    ?>
                    <tr>
                        <td>
                            <?php echo $address; ?>
                        </td>
                        <td></td>
                    </tr>
                <?php } ?>
                <?php if(!empty($val['geog_name'])){ ?>
                    <tr>
                        <td>
                            <?php echo $val['geog_name']; ?>
                        </td>
                        <td></td>
                    </tr>
                <?php } ?>
                <?php if(!empty($val['object_ph_no'])){ 
                    $phnos = json_decode($val['object_ph_no'], true);
                    $phno = is_array($phnos) && count($phnos) > 0 ? $phnos[0] : '';
                    ?>
                    <tr>   
                        <td>
                            <?php echo $phno; ?></p>
                        </td>
                        <td></td>
                    </tr>
                <?php } ?>
                    
            
        </table>
        <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
            <tr>
                <td colspan="2" style="text-align:center;border: 1px solid black;background-color:#ffcc00;color:black;"><b>IN EXCHANGE OF THIS VOUCHER PLEASE PROVIDE THE FOLLOWING SERVICES</b></td>
            </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Name of the Guest</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['entity_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Reservation No.</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['reference_id']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No. of Adult</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_adult']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No. of Child with bed</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_child_with_bed']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No. Of child(without bed)</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_child_without_bed']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Room Category</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['room_category_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No Of Double Room</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_double_room']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No Of Single Room</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_single_room']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No Of Extra Bed</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_extra_bed']; ?></td>
                    </tr>
                  
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Meal Plan</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['meal_plan_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Check in</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($val['check_in_date'])); ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Check out</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($val['check_out_date'])); ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;No of Nights</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['no_of_days']; ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Hotel Booking confirmed by</b></td>
                        <td style="border: 1px solid black;text-align:left;">&nbsp;&nbsp;<?php echo $val['confirmed_by']; ?></td>
                    </tr>
        </table>

        <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                <tr>
                    <td style="text-align:center;background-color:#009900;color:#fff;border: 1px solid black;"><b>Collect all extras directly from the client</b></td>
                </tr>
                    <tr>
                        <td>
                            Please Note
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1: This voucher has to be produced at the time of your check-in to the Hotel/House Boat.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2 : Cancelation / Extension of stay after check-in depends upon the Hotel/ House Boat policy
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3 : Extra charges if any, have to be paid directly to the Hotel.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4. Early check in and late checkout will be as per the availability of rooms and the Hotel policy
                        </td>
                    </tr>
        </table>

        <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                    <tr>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Name of Executive: </b><?php echo $cdata[0]['sop_executive']; ?></td>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Mobile No. </b><?php echo $mobile_no; ?></td>
                        <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Signature : </b></td>
                    </tr>
                    <tr>
                    <td style="text-align:center;" colspan="3"><img src="<?php echo base_url('assets/images/logo_foot_nw.png');?>" style="width:210px;height:77px;"></td>
                    </tr>
        </table>

        </div>
      </div>
    <?php } ?>

    <?php if($cdata[0]['is_vehicle_required'] == 1) { ?>
      <div id="transport_voucher" class="rendered-voucher">
        <div style="padding:10px;">
      <table style="width:100%; border-collapse: collapse; border: none;">
    <tr>
        <td style="border: none; display: flex; justify-content: space-between; align-items: center;">
           
            <div style="text-align: left;">
                <b>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>TOURACLE | A Unit of Kaduna Hospitality Pvt Ltd</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>602, 6th Floor,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Hi Lite Platino,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Sankar Nagar Colony Road,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Kannadikkadu, Maradu P.O,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Cochin 682304,</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>Phone: + 91 484 4604774 | Mob: +91 9995821798</i></p>
                    <p style="margin-top: 0; margin-bottom: 0rem;"><i>www.touracle.in Email: mah@touracle.in</i></p>
                </b>
            </div>
             <img src="<?php echo base_url('assets/images/bird_green_new.png');?>" style="width:100px; height:90px; margin-left:20px;">
        </td>
    </tr>
</table>
          <table style="width:100%;border-collapse: collapse;border: 1px solid black;">
                   <tr>
                      <td colspan="2" style="border: 1px solid black;text-align:center;background-color:#ffcc00;color:black;"><b>Transport Voucher</b></td>
                  </tr>
                  <tr>
                      <td style="border: 1px solid black;">
                          <p style="margin-top: 0;margin-bottom: 0rem;">&nbsp;&nbsp;To,</p>
                          <p style="margin-top: 0;margin-bottom: 0rem;">&nbsp;&nbsp;The Manager (Transportation)</p>
                      </td>
                      <td style="border: 1px solid black;">
                        
                          <p style="margin-top: 0;margin-bottom: 0rem;">&nbsp;&nbsp;Confirmation No : <?php echo $cdata[0]['ref_no']; ?></p>
                        
                          <p style="margin-top: 0;margin-bottom: 0rem;">&nbsp;&nbsp;Date : <?php echo date("d-M-Y", strtotime($cdate)); ?></p>
                      </td>
                  </tr>
          </table>
          <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                  <tr>
                      <td colspan="2" style="text-align:center;border: 1px solid black;background-color:#4baf58;color:#fff;"><b>In exchange of this voucher, please provide the following services</b></td>
                  </tr>
                      <tr>
                          <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Name of the Guest</b></td>
                          <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo $cdata[0]['entity_name']; ?></td>
                      </tr>
                      <?php if($cdata[0]['is_vehicle_required'] == 1 && !empty($vehicle_list_new)) { ?>
                          <tr>
                              <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Vehicle</b></td>
                              <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo $vehicle_list_new; ?></td>
                          </tr>
                      <?php } ?>
                      <tr>
                          <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Check in</b></td>
                          <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($cdata[0]['date_of_tour_start'])); ?></td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Check out</b></td>
                          <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($cdata[0]['date_of_tour_completion'])); ?></td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Vehicle Booking confirmed by</b></td>
                          <td style="text-align:left;border:1px solid black;">&nbsp;&nbsp;<?php echo $cdata[0]['confirmed_by_name']; ?></td>
                      </tr>
                      <tr>
                          <td style="text-align:left;border:1px solid black;"><b>&nbsp;&nbsp;Additional services if any</b></td>
                          <td style="text-align:left;border:1px solid black;"></td>
                      </tr>
          </table>

          <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                      <tr>
                          <td style="text-align:left;border:1px solid black;">
                              <p>&nbsp;&nbsp;Please Note</p>
                              <p>&nbsp;&nbsp;1 : This voucher has to be produced at the time of your check-in to the Hotel/House Boat.</p>
                              <p>&nbsp;&nbsp;2 : Cancelation / Extension of stay after check-in depends upon the Hotel/ House Boat policy</p>
                              <p>&nbsp;&nbsp;3 : Extra charges if any, have to be paid directly to the Hotel.</p>
                          </td>
                      </tr>
          </table>
          <table style="width:100%;border-collapse: collapse;border: 1px solid black;">  
                      <tr>
                          <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Name of Executive: </b><?php echo $cdata[0]['sop_executive']; ?></td>
                          <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Mobile No. </b><?php echo $mobile_no; ?></td>
                          <td style="border: 1px solid black;text-align:left;"><b>&nbsp;&nbsp;Signature : </b></td>
                      </tr>
                      <tr>
                      <td style="text-align:center;" colspan="3"><img src="<?php echo base_url('assets/images/logo_foot_nw.png');?>" style="width:210px;height:77px;"></td>
                      </tr>
          </table>

        </div>
      </div>
    <?php } ?>

  </div>

  <!-- Export All button at bottom (iterates through all available voucher divs) -->
  <div style="margin-top:12px;">
    <button type="button" class="primary" onclick="exportAllVouchers()">Export All PDFs</button>
  </div>

</div>

<script>
/**
 * exportVoucher: export a DOM element by id using html2pdf
 * RETURNS the Promise from html2pdf so callers can await completion.
 */
function exportVoucher(elementId, filename){
  var element = document.getElementById(elementId);
  if(!element){
    return Promise.reject(new Error('Voucher content not available to export: ' + elementId));
  }
  var opt = {
    margin:       10,
    filename:     filename || 'voucher.pdf',
    image:        { type: 'jpeg', quality: 0.98 },
    html2canvas:  { scale: 2, useCORS: true },
    jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
  };

  // show the element briefly (it is hidden) so html2pdf can compute sizes
  var prevDisplay = element.style.display;
  element.style.display = 'block';

  // return the promise so callers can wait
  return html2pdf().set(opt).from(element).save().then(function(){
    element.style.display = prevDisplay;
  }).catch(function(err){
    element.style.display = prevDisplay;
    console.error(err);
    // rethrow so upstream can handle it
    throw err;
  });
}

/**
 * syncAndExport: copy the appropriate voucher HTML from the TinyMCE editor into the
 * hidden rendered voucher div, then call exportVoucher.
 *
 * elementId: id of target hidden voucher div (e.g. 'voucher_0' or 'transport_voucher')
 * textareaId: id of the editable textarea that TinyMCE has replaced (e.g. 'hotel_voucher_template')
 * filename: desired PDF filename
 */
function syncAndExport(elementId, textareaId, filename) {
  // Get editor content (TinyMCE) — fallback to textarea.value if TinyMCE not present
  var content = '';
  if (typeof tinymce !== 'undefined' && tinymce.get(textareaId)) {
    // Get the HTML TinyMCE currently holds, ensuring raw HTML
    content = tinymce.get(textareaId).getContent({ format: 'raw' });
  } else {
    var ta = document.getElementById(textareaId);
    content = ta ? ta.value : '';
  }

  // Parse the content to extract the specific voucher block
  var temp = document.createElement('div');
  temp.innerHTML = content;

  // Try to find the voucher by data-voucher-id
  var selector = 'div.editable-voucher[data-voucher-id="' + elementId + '"]';
  var sourceBlock = temp.querySelector(selector);

  var target = document.getElementById(elementId);

  if (!target) {
    console.error('Target rendered voucher element not found: ' + elementId);
    return Promise.reject(new Error('Target rendered voucher element not found: ' + elementId));
  }

  if (sourceBlock) {
    console.log('Found voucher block for ' + elementId);
    // Copy only this voucher's HTML into the hidden rendered div
    target.innerHTML = sourceBlock.innerHTML;
  } else {
    console.warn('No data-voucher-id wrapper found for ' + elementId + ' - attempting index-based fallback.');

    // Fallback: Select by index for hotel vouchers or last for transport
    var allVouchers = temp.querySelectorAll('div.editable-voucher');
    if (allVouchers.length > 0) {
      if (elementId.startsWith('voucher_')) {
        // Extract index from elementId (e.g., 'voucher_0' -> 0)
        var index = parseInt(elementId.replace('voucher_', ''), 10);
        if (index >= 0 && index < allVouchers.length) {
          console.log('Using index ' + index + ' for ' + elementId);
          target.innerHTML = allVouchers[index].innerHTML;
        } else {
          console.error('Index out of bounds for ' + elementId + ', total vouchers: ' + allVouchers.length);
          target.innerHTML = '';
          return Promise.reject(new Error('Invalid voucher index for ' + elementId));
        }
      } else if (elementId === 'transport_voucher') {
        // Transport voucher is the last one
        console.log('Using last voucher for transport_voucher');
        target.innerHTML = allVouchers[allVouchers.length - 1].innerHTML;
      } else {
        console.error('Unknown elementId: ' + elementId);
        target.innerHTML = '';
        return Promise.reject(new Error('Unknown voucher ID: ' + elementId));
      }
    } else {
      console.error('No editable-voucher divs found in textarea content.');
      target.innerHTML = '';
      return Promise.reject(new Error('No vouchers found in textarea content.'));
    }
  }

  // Now call exportVoucher and return its Promise
  return exportVoucher(elementId, filename);
}

/**
 * exportAllVouchers: collects all voucher content and exports as a single PDF
 */
async function exportAllVouchers() {
  // Get editor content
  var content = '';
  var textareaId = 'hotel_voucher_template';
  
  if (typeof tinymce !== 'undefined' && tinymce.get(textareaId)) {
    content = tinymce.get(textareaId).getContent({ format: 'raw' });
  } else {
    var ta = document.getElementById(textareaId);
    content = ta ? ta.value : '';
  }

  if (!content.trim()) {
    alert('No voucher content found to export.');
    return;
  }

  // Create a temporary container for all vouchers
  var allVouchersContainer = document.createElement('div');
  allVouchersContainer.id = 'all_vouchers_container';
  allVouchersContainer.style.display = 'none';
  allVouchersContainer.style.padding = '10px';
  
  // Parse the content
  var temp = document.createElement('div');
  temp.innerHTML = content;
  
  // Get all voucher blocks
  var allVouchers = temp.querySelectorAll('div.editable-voucher');
  
  if (allVouchers.length === 0) {
    alert('No vouchers found to export.');
    return;
  }

  // Add each voucher to the container with page breaks
  allVouchers.forEach(function(voucher, index) {
    // Create a wrapper for each voucher
    var voucherWrapper = document.createElement('div');
    voucherWrapper.innerHTML = voucher.innerHTML;
    
    // Add page break after each voucher except the last one
    if (index < allVouchers.length - 1) {
      voucherWrapper.style.pageBreakAfter = 'always';
    }
    
    allVouchersContainer.appendChild(voucherWrapper);
  });

  // Add the container to the document
  document.body.appendChild(allVouchersContainer);

  // Export options for combined PDF
  var opt = {
    margin: 10,
    filename: 'AllVouchers_<?php echo $cdata[0]['ref_no'];?>.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2, useCORS: true },
    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
  };

  try {
    // Show the container temporarily
    allVouchersContainer.style.display = 'block';
    
    // Export as single PDF
    await html2pdf().set(opt).from(allVouchersContainer).save();
    
    console.log('All vouchers exported successfully as single PDF');
  } catch (err) {
    console.error('Error exporting combined PDF:', err);
    alert('Error generating PDF. Please try again.');
  } finally {
    // Clean up
    document.body.removeChild(allVouchersContainer);
  }
}
</script>

</body>
</html>