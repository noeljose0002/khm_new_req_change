								
											<table class="table table-bordered table-responsive-md table-striped mb-0 text-nowrap">
																	<?php 
																	if(!empty($tariff_data)){ ?>
																		<tr>
																			<td colspan="3" style="background-color:#fff;"><h4 style="color:#339966;">Dinner</h4></td>
																			<td style="background-color:#fff;"><input type="text" class="form-control input-sm" id="ssn_dinner" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			<td style="background-color:#fff;"><input type="text" class="form-control input-sm" id="ssn_dinner_c" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			<td style="background-color:#fff;"><input type="text" class="form-control input-sm" id="ssn_dinner_cw" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			<td style="background-color:#fff;"><input type="text" class="form-control input-sm" id="ssn_dinner_e" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																		</tr>
																		<tr>
																			<td colspan="3" style="background-color:#fff;"><h4 style="color:#339966;">Lunch</h4></td>
																			<td style="background-color:#fff;"><input type="text" class="form-control input-sm" id="ssn_lunch" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			<td style="background-color:#fff;"><input type="text" class="form-control input-sm" id="ssn_lunch_c" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			<td style="background-color:#fff;"><input type="text" class="form-control input-sm" id="ssn_lunch_cw" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			<td style="background-color:#fff;"><input type="text" class="form-control input-sm" id="ssn_lunch_e" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																		</tr>
																	<?php } ?>
																	<tr style="background-color:#c8ead9;">
																	
																		<th class="">Room Category</th>
																		<th class="">Room Type</th>
																		<th class="">Meal Plan</th>
																		<th class="">Room Tariff</th>
																		<th class="">Child With Bed</th>
																		<th class="">Child Without Bed</th>
																		<th class="">Extra Bed</th>
										
																		<th class="">Action</th>
																	</tr>
															
																	<?php 
																	if(!empty($tariff_data)){
																	foreach($tariff_data as $key => $val){
																		$tot_rows = count($tariff_data);
																		$tot_row = ($tot_rows / 4) + 1;
																		$pid = $val['hotel_room_meal_id'];
																		$room_id = $val['room_id']; // Get the room ID

																		// Assign a background color based on room_id
																		$background_color = match($room_id % $tot_row) { 
																			0 => "#eceef4", 
																			1 => "#d1e0e0", 
																			2 => "#eceef4",
																			3 => "#d1e0e0",
																			default => "#fff",
																		}; 
																		?>
																		<tr>
																			<input type="hidden" id="mealplanssn<?php echo $pid; ?>" value="<?php echo $val['meal_plan_name']; ?>">
																			<input type="hidden" id="roomtypessn<?php echo $pid; ?>" value="<?php echo $val['room_type_name']; ?>">
																			<input type="hidden" id="roomcatssn<?php echo $pid; ?>" value="<?php echo $val['room_category_id']; ?>">

																			<input type="hidden" id="mealplanssn_c<?php echo $pid; ?>" value="<?php echo $val['meal_plan_name']; ?>">
																			<input type="hidden" id="roomtypessn_c<?php echo $pid; ?>" value="<?php echo $val['room_type_name']; ?>">
																			<input type="hidden" id="roomcatssn_c<?php echo $pid; ?>" value="<?php echo $val['room_category_id']; ?>">

																			<input type="hidden" id="mealplanssn_cw<?php echo $pid; ?>" value="<?php echo $val['meal_plan_name']; ?>">
																			<input type="hidden" id="roomtypessn_cw<?php echo $pid; ?>" value="<?php echo $val['room_type_name']; ?>">
																			<input type="hidden" id="roomcatssn_cw<?php echo $pid; ?>" value="<?php echo $val['room_category_id']; ?>">

																			<input type="hidden" id="mealplanssn_e<?php echo $pid; ?>" value="<?php echo $val['meal_plan_name']; ?>">
																			<input type="hidden" id="roomtypessn_e<?php echo $pid; ?>" value="<?php echo $val['room_type_name']; ?>">
																			<input type="hidden" id="roomcatssn_e<?php echo $pid; ?>" value="<?php echo $val['room_category_id']; ?>">


																			<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><input type="checkbox" id="chk<?php echo $pid; ?>"> <?php echo $val['room_category_name']; ?></td>
																			<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><?php echo $val['room_type_name']; ?></td>
																			<td class="pt-3-half" style="background-color:<?php echo $background_color; ?>;"><?php echo $val['meal_plan_name']; ?></td>
																			<td class="pt-3-half ssn" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="ssn<?php echo $pid; ?>" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			
																			<td class="pt-3-half ssn_c" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="ssn_c<?php echo $pid; ?>" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			<td class="pt-3-half ssn_cw" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="ssn_cw<?php echo $pid; ?>" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			<td class="pt-3-half ssn_e" style="background-color:<?php echo $background_color; ?>;"><input type="text" class="form-control input-sm" id="ssn_e<?php echo $pid; ?>" value="" style="width:90px;" inputmode="numeric" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/\D/g, '')"></td>
																			
																			<td style="background-color:<?php echo $background_color; ?>;">
																				<button type="button" class="btn btn-dark btn-rounded btn-sm my-0"  onclick="save_room_season(<?php echo $pid; ?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"><i class="fa fa-save"></i></button>
																			</td>
																		</tr>
																	<?php }
																	
																	 } else { ?>
																		<tr>
																			<td colspan="8" style="text-align:center;">No basic tariff added to the room yet</td>
																		</tr>
																	<?php } ?>
																</table>

<script>
$(document).ready(function () {
    $("#ssn_dinner").on("input", function () {
        var dinnerValue = parseInt($(this).val()) || 0; // Ensure integer value
		var lunchValue = parseInt($('#ssn_lunch').val()) || 0;
        var cpval_s, cpval_d;

        // Second Loop: Update only AP meal plan values
        $(".ssn").each(function () {
            var inputField = $(this).find("input");
			var ssnId = inputField.attr("id");
			var mealplan = $('#mealplan'+ssnId).val();
			var roomtype = $('#roomtype'+ssnId).val();
			var roomcat = $('#roomcat'+ssnId).val();
			cpval_s = 0, cpval_d = 0;
			$(".ssn").each(function () {
				var inputField1 = $(this).find("input"); 
				var ssnId1 = inputField1.attr("id");
				var mealplan1 = $('#mealplan'+ssnId1).val();
				var roomtype1 = $('#roomtype'+ssnId1).val(); 
				var roomcat1 = $('#roomcat'+ssnId1).val();
				if(roomcat == roomcat1){
					if(mealplan1 == "CP" && roomtype1 == "Double") {
						cpval_d = parseInt($('#'+ssnId1).val()) || 0;
					}
					if(mealplan1 == "CP" && roomtype1 == "Single") {
						cpval_s = parseInt($('#'+ssnId1).val()) || 0;
					}
				}
				
			});	
            if (inputField.length && mealplan == "MAP") {
				var totalValue = 0;
				if(roomtype == "Double") {
					totalValue = cpval_d + (dinnerValue * 2);
				} else { // Single room type
					totalValue = cpval_s + dinnerValue;
				}
				inputField.val(totalValue).trigger("input");
            }
			if (inputField.length && mealplan == "AP") {
				var totalValue = 0;
				if(roomtype == "Double") {
					totalValue = cpval_d + (dinnerValue + lunchValue)*2;
				} else { // Single room type
					totalValue = cpval_s + dinnerValue + lunchValue;
				}
				inputField.val(totalValue).trigger("input");
            }
        });
    });
});
</script>
<script>
$(document).ready(function () {
    $("#ssn_lunch").on("input", function () {
        var lunchValue = parseInt($(this).val()) || 0; // Ensure integer value
		var dinnerValue = parseInt($('#ssn_dinner').val()) || 0;
        var cpval_s, cpval_d;

        // Second Loop: Update only AP meal plan values
        $(".ssn").each(function () {
            var inputField = $(this).find("input");
			var ssnId = inputField.attr("id");
			var mealplan = $('#mealplan'+ssnId).val();
			var roomtype = $('#roomtype'+ssnId).val();
			var roomcat = $('#roomcat'+ssnId).val();
			cpval_s = 0, cpval_d = 0;
			$(".ssn").each(function () {
				var inputField1 = $(this).find("input"); 
				var ssnId1 = inputField1.attr("id");
				var mealplan1 = $('#mealplan'+ssnId1).val();
				var roomtype1 = $('#roomtype'+ssnId1).val(); 
				var roomcat1 = $('#roomcat'+ssnId1).val();
				if(roomcat == roomcat1){
					if(mealplan1 == "CP" && roomtype1 == "Double") {
						cpval_d = parseInt($('#'+ssnId1).val()) || 0;
					}
					if(mealplan1 == "CP" && roomtype1 == "Single") {
						cpval_s = parseInt($('#'+ssnId1).val()) || 0;
					}
				}
				
			});	
            if (inputField.length && mealplan == "AP") {
				var totalValue = 0;
				if(roomtype == "Double") {
					totalValue = cpval_d + (dinnerValue + lunchValue)*2;
				} else { // Single room type
					totalValue = cpval_s + dinnerValue + lunchValue;
				}
				inputField.val(totalValue).trigger("input");
            }
        });
    });
});
</script>


<script>
$(document).ready(function () {
    $("#ssn_dinner_c").on("input", function () {
        var dinnerValue = parseInt($(this).val()) || 0; // Ensure integer value
		var lunchValue = parseInt($('#ssn_lunch_c').val()) || 0;
        var cpval_s, cpval_d;

        // Second Loop: Update only AP meal plan values
        $(".ssn_c").each(function () {
            var inputField = $(this).find("input");
			var ssnId = inputField.attr("id");
			var mealplan = $('#mealplan'+ssnId).val();
			var roomtype = $('#roomtype'+ssnId).val();
			var roomcat = $('#roomcat'+ssnId).val();
			cpval_s = 0, cpval_d = 0;
			$(".ssn_c").each(function () {
				var inputField1 = $(this).find("input"); 
				var ssnId1 = inputField1.attr("id");
				var mealplan1 = $('#mealplan'+ssnId1).val();
				var roomtype1 = $('#roomtype'+ssnId1).val(); 
				var roomcat1 = $('#roomcat'+ssnId1).val();
				if(roomcat == roomcat1){
					if(mealplan1 == "CP") {
						cpval_d = parseInt($('#'+ssnId1).val()) || 0;
					}
				}
				
			});	
			if(roomtype == "Double") {
				if (inputField.length && mealplan == "MAP") {
					var totalValue = 0;
					totalValue = cpval_d + dinnerValue;
					inputField.val(totalValue).trigger("input");
				}
				if (inputField.length && mealplan == "AP") {
					var totalValue = 0;
					totalValue = cpval_s + dinnerValue + lunchValue;
					inputField.val(totalValue).trigger("input");
				}
			}
        });
    });
});
</script>
<script>
$(document).ready(function () {
    $("#ssn_lunch_c").on("input", function () {
        var lunchValue = parseInt($(this).val()) || 0; // Ensure integer value
		var dinnerValue = parseInt($('#ssn_dinner_c').val()) || 0;
        var cpval_s, cpval_d;

        // Second Loop: Update only AP meal plan values
        $(".ssn_c").each(function () {
            var inputField = $(this).find("input");
			var ssnId = inputField.attr("id");
			var mealplan = $('#mealplan'+ssnId).val();
			var roomtype = $('#roomtype'+ssnId).val();
			var roomcat = $('#roomcat'+ssnId).val();
			cpval_s = 0, cpval_d = 0;
			$(".ssn_c").each(function () {
				var inputField1 = $(this).find("input"); 
				var ssnId1 = inputField1.attr("id");
				var mealplan1 = $('#mealplan'+ssnId1).val();
				var roomtype1 = $('#roomtype'+ssnId1).val(); 
				var roomcat1 = $('#roomcat'+ssnId1).val();
				if(roomcat == roomcat1){
					if(mealplan1 == "CP") {
						cpval_d = parseInt($('#'+ssnId1).val()) || 0;
					}
				}
				
			});	
			if(roomtype == "Double") {
				if (inputField.length && mealplan == "AP") {
					var totalValue = 0;
					totalValue = cpval_d + dinnerValue + lunchValue;
					inputField.val(totalValue).trigger("input");
				}
			}
        });
    });
});
</script>


<script>
$(document).ready(function () {
    $("#ssn_dinner_cw").on("input", function () {
        var dinnerValue = parseInt($(this).val()) || 0; // Ensure integer value
		var lunchValue = parseInt($('#ssn_lunch_cw').val()) || 0;
        var cpval_s, cpval_d;

        // Second Loop: Update only AP meal plan values
        $(".ssn_cw").each(function () {
            var inputField = $(this).find("input");
			var ssnId = inputField.attr("id");
			var mealplan = $('#mealplan'+ssnId).val();
			var roomtype = $('#roomtype'+ssnId).val();
			var roomcat = $('#roomcat'+ssnId).val();
			cpval_s = 0, cpval_d = 0;
			$(".ssn_cw").each(function () {
				var inputField1 = $(this).find("input"); 
				var ssnId1 = inputField1.attr("id");
				var mealplan1 = $('#mealplan'+ssnId1).val();
				var roomtype1 = $('#roomtype'+ssnId1).val(); 
				var roomcat1 = $('#roomcat'+ssnId1).val();
				if(roomcat == roomcat1){
					if(mealplan1 == "CP") {
						cpval_d = parseInt($('#'+ssnId1).val()) || 0;
					}
				}
				
			});	
			if(roomtype == "Double") {
				if (inputField.length && mealplan == "MAP") {
					var totalValue = 0;
					totalValue = cpval_d + dinnerValue;
					inputField.val(totalValue).trigger("input");
				}
				if (inputField.length && mealplan == "AP") {
					var totalValue = 0;
					totalValue = cpval_s + dinnerValue + lunchValue;
					inputField.val(totalValue).trigger("input");
				}
			}
        });
    });
});
</script>
<script>
$(document).ready(function () {
    $("#ssn_lunch_cw").on("input", function () {
        var lunchValue = parseInt($(this).val()) || 0; // Ensure integer value
		var dinnerValue = parseInt($('#ssn_dinner_cw').val()) || 0;
        var cpval_s, cpval_d;

        // Second Loop: Update only AP meal plan values
        $(".ssn_cw").each(function () {
            var inputField = $(this).find("input");
			var ssnId = inputField.attr("id");
			var mealplan = $('#mealplan'+ssnId).val();
			var roomtype = $('#roomtype'+ssnId).val();
			var roomcat = $('#roomcat'+ssnId).val();
			cpval_s = 0, cpval_d = 0;
			$(".ssn_cw").each(function () {
				var inputField1 = $(this).find("input"); 
				var ssnId1 = inputField1.attr("id");
				var mealplan1 = $('#mealplan'+ssnId1).val();
				var roomtype1 = $('#roomtype'+ssnId1).val(); 
				var roomcat1 = $('#roomcat'+ssnId1).val();
				if(roomcat == roomcat1){
					if(mealplan1 == "CP") {
						cpval_d = parseInt($('#'+ssnId1).val()) || 0;
					}
				}
				
			});	
			if(roomtype == "Double") {
				if (inputField.length && mealplan == "AP") {
					var totalValue = 0;
					totalValue = cpval_d + dinnerValue + lunchValue;
					inputField.val(totalValue).trigger("input");
				}
			}
        });
    });
});
</script>


<script>
$(document).ready(function () {
    $("#ssn_dinner_e").on("input", function () {
        var dinnerValue = parseInt($(this).val()) || 0; // Ensure integer value
		var lunchValue = parseInt($('#ssn_lunch_e').val()) || 0;
        var cpval_s, cpval_d;

        // Second Loop: Update only AP meal plan values
        $(".ssn_e").each(function () {
            var inputField = $(this).find("input");
			var ssnId = inputField.attr("id");
			var mealplan = $('#mealplan'+ssnId).val();
			var roomtype = $('#roomtype'+ssnId).val();
			var roomcat = $('#roomcat'+ssnId).val();
			cpval_s = 0, cpval_d = 0;
			$(".ssn_e").each(function () {
				var inputField1 = $(this).find("input"); 
				var ssnId1 = inputField1.attr("id");
				var mealplan1 = $('#mealplan'+ssnId1).val();
				var roomtype1 = $('#roomtype'+ssnId1).val(); 
				var roomcat1 = $('#roomcat'+ssnId1).val();
				if(roomcat == roomcat1){
					if(mealplan1 == "CP") {
						cpval_d = parseInt($('#'+ssnId1).val()) || 0;
					}
				}
				
			});	
			if(roomtype == "Double") {
				if (inputField.length && mealplan == "MAP") {
					var totalValue = 0;
					totalValue = cpval_d + dinnerValue;
					inputField.val(totalValue).trigger("input");
				}
				if (inputField.length && mealplan == "AP") {
					var totalValue = 0;
					totalValue = cpval_s + dinnerValue + lunchValue;
					inputField.val(totalValue).trigger("input");
				}
			}
        });
    });
});
</script>
<script>
$(document).ready(function () {
    $("#ssn_lunch_e").on("input", function () {
        var lunchValue = parseInt($(this).val()) || 0; // Ensure integer value
		var dinnerValue = parseInt($('#ssn_dinner_e').val()) || 0;
        var cpval_s, cpval_d;

        // Second Loop: Update only AP meal plan values
        $(".ssn_e").each(function () {
            var inputField = $(this).find("input");
			var ssnId = inputField.attr("id");
			var mealplan = $('#mealplan'+ssnId).val();
			var roomtype = $('#roomtype'+ssnId).val();
			var roomcat = $('#roomcat'+ssnId).val();
			cpval_s = 0, cpval_d = 0;
			$(".ssn_e").each(function () {
				var inputField1 = $(this).find("input"); 
				var ssnId1 = inputField1.attr("id");
				var mealplan1 = $('#mealplan'+ssnId1).val();
				var roomtype1 = $('#roomtype'+ssnId1).val(); 
				var roomcat1 = $('#roomcat'+ssnId1).val();
				if(roomcat == roomcat1){
					if(mealplan1 == "CP") {
						cpval_d = parseInt($('#'+ssnId1).val()) || 0;
					}
				}
				
			});	
			if(roomtype == "Double") {
				if (inputField.length && mealplan == "AP") {
					var totalValue = 0;
					totalValue = cpval_d + dinnerValue + lunchValue;
					inputField.val(totalValue).trigger("input");
				}
			}
        });
    });
});
</script>

<script>
$(document).ready(function () {
    $(".ssn").on("input", function () {
		var lunchValue = parseInt($('#ssn_lunch').val()) || 0; // Ensure integer value
		var dinnerValue = parseInt($('#ssn_dinner').val()) || 0;
        var inputField = $(this).find("input");
        var ssnId = inputField.attr("id");
        var mealplan = $("#mealplan" + ssnId).val();
        var roomtype = $("#roomtype" + ssnId).val();
        var roomcat = $("#roomcat" + ssnId).val();
        var cpval = parseInt(inputField.val()) || 0;

        $(".ssn").each(function () {
            var inputField1 = $(this).find("input");
            var ssnId1 = inputField1.attr("id");
            var mealplan1 = $("#mealplan" + ssnId1).val();
            var roomtype1 = $("#roomtype" + ssnId1).val();
            var roomcat1 = $("#roomcat" + ssnId1).val();

            if (roomcat === roomcat1) {
                if (mealplan === "CP") {
                    if (mealplan1 === "MAP") {
						if(roomtype1 == "Double"){
                        	var mapval = dinnerValue*2;
                        	$("#" + ssnId1).val(cpval + mapval).trigger("input");
						}
						else{
							var mapval = dinnerValue;
                        	$("#" + ssnId1).val(cpval + mapval).trigger("input");
						}
                    }
                    if (mealplan1 === "AP") {
						if(roomtype1 == "Double"){
                        	var apval = (dinnerValue + lunchValue)*2;
                        	$("#" + ssnId1).val(cpval + apval).trigger("input");
						}
						else{
							var apval = dinnerValue + lunchValue;
                        	$("#" + ssnId1).val(cpval + apval).trigger("input");
						}
                    }
                }
            }
        });
    });
});
</script>

<script>
$(document).ready(function () {
    $(".ssn_c").on("input", function () {
		var lunchValue = parseInt($('#ssn_lunch_c').val()) || 0; // Ensure integer value
		var dinnerValue = parseInt($('#ssn_dinner_c').val()) || 0;
        var inputField = $(this).find("input");
        var ssnId = inputField.attr("id");
        var mealplan = $("#mealplan" + ssnId).val();
        var roomtype = $("#roomtype" + ssnId).val();
        var roomcat = $("#roomcat" + ssnId).val();
        var cpval = parseInt(inputField.val()) || 0;

        $(".ssn_c").each(function () {
            var inputField1 = $(this).find("input");
            var ssnId1 = inputField1.attr("id");
            var mealplan1 = $("#mealplan" + ssnId1).val();
            var roomtype1 = $("#roomtype" + ssnId1).val();
            var roomcat1 = $("#roomcat" + ssnId1).val();

            if (roomcat === roomcat1) {
                if (mealplan === "CP") {
                    if (mealplan1 === "MAP") {
						var mapval = dinnerValue;
                        $("#" + ssnId1).val(cpval + mapval).trigger("input");
                    }
                    if (mealplan1 === "AP") {
						var apval = dinnerValue + lunchValue;
                        $("#" + ssnId1).val(cpval + apval).trigger("input");
                    }
                }
            }
        });
    });
});
</script>

<script>
$(document).ready(function () {
    $(".ssn_cw").on("input", function () {
		var lunchValue = parseInt($('#ssn_lunch_cw').val()) || 0; // Ensure integer value
		var dinnerValue = parseInt($('#ssn_dinner_cw').val()) || 0;
        var inputField = $(this).find("input");
        var ssnId = inputField.attr("id");
        var mealplan = $("#mealplan" + ssnId).val();
        var roomtype = $("#roomtype" + ssnId).val();
        var roomcat = $("#roomcat" + ssnId).val();
        var cpval = parseInt(inputField.val()) || 0;

        $(".ssn_cw").each(function () {
            var inputField1 = $(this).find("input");
            var ssnId1 = inputField1.attr("id");
            var mealplan1 = $("#mealplan" + ssnId1).val();
            var roomtype1 = $("#roomtype" + ssnId1).val();
            var roomcat1 = $("#roomcat" + ssnId1).val();

            if (roomcat === roomcat1) {
                if (mealplan === "CP") {
                    if (mealplan1 === "MAP") {
						var mapval = dinnerValue;
                        $("#" + ssnId1).val(cpval + mapval).trigger("input");
                    }
                    if (mealplan1 === "AP") {
						var apval = dinnerValue + lunchValue;
                        $("#" + ssnId1).val(cpval + apval).trigger("input");
                    }
                }
            }
        });
    });
});
</script>

<script>
$(document).ready(function () {
    $(".ssn_e").on("input", function () {
		var lunchValue = parseInt($('#ssn_lunch_e').val()) || 0; // Ensure integer value
		var dinnerValue = parseInt($('#ssn_dinner_e').val()) || 0;
        var inputField = $(this).find("input");
        var ssnId = inputField.attr("id");
        var mealplan = $("#mealplan" + ssnId).val();
        var roomtype = $("#roomtype" + ssnId).val();
        var roomcat = $("#roomcat" + ssnId).val();
        var cpval = parseInt(inputField.val()) || 0;

        $(".ssn_e").each(function () {
            var inputField1 = $(this).find("input");
            var ssnId1 = inputField1.attr("id");
            var mealplan1 = $("#mealplan" + ssnId1).val();
            var roomtype1 = $("#roomtype" + ssnId1).val();
            var roomcat1 = $("#roomcat" + ssnId1).val();

            if (roomcat === roomcat1) {
                if (mealplan === "CP") {
                    if (mealplan1 === "MAP") {
						var mapval = dinnerValue;
                        $("#" + ssnId1).val(cpval + mapval).trigger("input");
                    }
                    if (mealplan1 === "AP") {
						var apval = dinnerValue + lunchValue;
                        $("#" + ssnId1).val(cpval + apval).trigger("input");
                    }
                }
            }
        });
    });
});
</script>
<script>
$(document).ready(function(){
    // Ensure the script runs after the document is fully loaded
    setTimeout(function() {
        $(".ssn input, .ssn_c input, .ssn_cw input, .ssn_e input").attr("readonly", true);
    }, 100);

    // Handle checkbox change event
    $("input[type='checkbox'][id^='chk']").on("change", function(){
        let pid = $(this).attr("id").replace("chk", ""); // Extract ID number
        
        // Toggle readonly attribute based on checkbox state
        $("#ssn" + pid).prop("readonly", !this.checked);
        $("#ssn_c" + pid).prop("readonly", !this.checked);
        $("#ssn_cw" + pid).prop("readonly", !this.checked);
        $("#ssn_e" + pid).prop("readonly", !this.checked);
    });
});
</script>

