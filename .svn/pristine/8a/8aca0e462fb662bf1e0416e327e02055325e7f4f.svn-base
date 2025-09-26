<?php
if(!empty($hot_det)){		
    $hot_details = $hot_det[0]['ac_remarks'];
    $hot_detail = json_decode($hot_details);
}
?>
<table class="table table-bordered table-responsive-md table-striped mb-0 text-nowrap">
    <tr style="background-color:#c8ead9;">
        <th class="">Day</th>
	    <th class="">Location</th>
		<th class="">Tour Date</th>
        <th class="">Hotel</th>										
	    <th class="">Room Category</th>
        <th class="">Room Type</th>
        <th class="">Available</th>
        <th class="">Remarks</th>
	</tr>
	<?php 
		if(!empty($hot_detail)){			
            $key_count = 1;									
			foreach($hot_detail as $key => $val){ 
	            ?>
				<tr>
                    <td class="pt-3-half"><?php echo $val->si_no; ?></td>
					<td class="pt-3-half"><?php echo $val->location; ?></td>
					<td class="pt-3-half"><?php echo $val->tour_date; ?></td>
				   
                    <td class="pt-3-half"><?php echo $val->hotel_name; ?></td>
                    <td class="pt-3-half"><?php echo $val->room_category; ?></td>
                    <td class="pt-3-half"><?php echo $val->room_type; ?></td>
                    <td class="pt-3-half">
                        <?php if($val->available){ ?>
                            <h6 style="font-weight: bold;font-style: italic;color:#339966">Available</h6>
                        <?php } else { ?>
                            <h6 style="font-weight: bold;font-style: italic;color:#ff3399">Not Available</h6>
                        <?php } ?>
                    </td>
                    <td class="pt-3-half"><textarea class="form-control input-sm" readonly><?php echo $val->remarks; ?></textarea></td>
			    </tr>
               
		    <?php 
           
            } 
        } else { ?>
			<tr>
				<td colspan="8" style="text-align:center;">Availability Check Not Found</td>
			</tr>
		<?php } ?>
	</table>	
   