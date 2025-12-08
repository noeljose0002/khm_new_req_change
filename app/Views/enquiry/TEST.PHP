      <tr>
                    <td style="border: 1px solid black;"><b>No Of Single Rooms</b></td>
                    <td style="border: 1px solid black;"><?php echo $hotels[0]['no_of_single_room']; ?></td>
                      ₹<?php echo ($hotels[0]['no_of_single_room'] > 0) ? ($room_t_s / $hotels[0]['no_of_single_room']) : 0; ?>
                </tr>
            <?php } ?>
            <?php if ($hotels[0]['no_of_extra_bed'] > 0) { ?>
            <tr>
                <td style="border: 1px solid black;"><b>No Of Extra Bed(Adult)</b></td>
                <td style="border: 1px solid black;"><?php echo $hotels[0]['no_of_extra_bed']; ?></td>
                 ₹<?php echo ($hotels[0]['no_of_extra_bed'] > 0) ? ($extra_t_d / $hotels[0]['no_of_extra_bed']) : 0; ?>
            </tr>
            <?php } ?>
            <?php if ($hotels[0]['no_of_child_with_bed'] > 0) { ?>
            <tr>
                <td style="border: 1px solid black;"><b>No Of Child with Bed</b></td>
                <td style="border: 1px solid black;"><?php echo $hotels[0]['no_of_child_with_bed']; ?></td>
                ₹<?php echo ($hotels[0]['no_of_child_with_bed'] > 0) ? ($child_t_d / $hotels[0]['no_of_child_with_bed']) : 0; ?>
            </tr>
             <?php } ?>
             <?php if ($hotels[0]['no_of_child_without_bed'] > 0) { ?>
            <tr>
                <td style="border: 1px solid black;"><b>No Of Child without Bed</b></td>
                <td style="border: 1px solid black;"><?php echo $hotels[0]['no_of_child_without_bed']; ?></td>
                ₹<?php echo ($hotels[0]['no_of_child_without_bed'] > 0) ? ($child_wb_t_d / $hotels[0]['no_of_child_without_bed']) : 0; ?>
            </tr>
             <?php } ?>
            <tr>