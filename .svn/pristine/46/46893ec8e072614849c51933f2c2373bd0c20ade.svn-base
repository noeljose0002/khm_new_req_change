<?php
use App\Models\Enquiry_m;
$Enquiry_model = new Enquiry_m();
?>

<style>
#tree-grid {
    display: flex;
    gap: 20px;
}
.tree-column {
    flex: 1;
    border: 1px solid #ccc;
    padding: 10px;
    min-height: 500px;
    background: #f9f9f9;
}
.tree-column h5 {
    font-weight: bold;
    color: #003366;
}
.item-block {
    margin-bottom: 10px;
}
.item-block a {
    text-decoration: none;
    font-weight: bold;
    display: inline-block;
}
.edit-icon {
    color: #339966;
    margin-left: 5px;
}
.selected {
    background-color: #339966;
    border-left: 4px solid #003300;
    color: #fff !important;
    padding: 4px;
    border-radius: 4px;
}
#show-more-ed {
    color: #003300;
    cursor: pointer;
}
#show-more-ed:hover {
    text-decoration: none;
}
#toggle-ed-buttons a {
    color: #006699;
    cursor: pointer;
    margin-right: 10px;
}
#toggle-ed-buttons a:hover {
    text-decoration: none;
}

#toggle-tour-buttons a {
    color: #006699;
    cursor: pointer;
    margin-right: 10px;
}
#toggle-tour-buttons a:hover {
    text-decoration: none;
}

#toggle-iti-buttons a {
    color: #006699;
    cursor: pointer;
    margin-right: 10px;
}
#toggle-iti-buttons a:hover {
    text-decoration: none;
}

</style>
<div id="tree-grid">
    <!-- Column 1: Enquiry -->

    <div class="tree-column" id="enquiry-header-column">
        <h5>Enquiry</h5>
        
        <?php foreach ($enquiry_header_details as $enquiry_header_detail): ?>
            <?php
                $active = $enquiry_header_detail['is_active'] == 1;
                $eh_id = $enquiry_header_detail['enquiry_header_id'];
                $enq_date = date("d-m-Y", strtotime($enquiry_header_detail['enq_added_date']));
            ?>
            <div class="item-block">
                <a href="#" class="enquiry-header-item" data-id="<?= $eh_id ?>" style="color:#003300">
                    <?= $guest_name." ".$enq_date; ?>
                </a>
            </div>
        <?php endforeach; ?>    
        <h6><i>Click above enquiry for edit</i></h6>
    </div>

    <div class="tree-column" id="enquiry-column">
        <h5>Enquiry Details</h5>
        <div id="enquiry-details-content">Select an enquiry detail to load tour plans.</div>
    </div>

    <!-- Column 2: Tour Plan (Dynamic) -->
    <div class="tree-column" id="tour-column">
        <h5>Tour Plan</h5>
        <div id="tour-content">Select Tour Plan to load Itineraries.</div>
    </div>

    <!-- Column 3: Itineraries (Dynamic) -->
    <div class="tree-column" id="itinerary-column">
        <h5>Itinerary</h5>
        <div id="itinerary-content">Select itinerary to load itinerary extension.</div>
    </div>

    <div class="tree-column" id="itinerary-column">
        <h5>Extension</h5>
        <div id="itinerary-extension-content"></div>
    </div>
</div>

<script>

$(document).ready(function () {
    var firstHeader = $('.enquiry-header-item').first();
    if (firstHeader.length) {
        var enquiry_header_id = firstHeader.attr('data-id');
        var object_id = <?= $object_id ?>;
        var object_class_id = <?= $object_class_id ?>;

        firstHeader.addClass('selected');

        $.ajax({
            url: "<?= site_url('Enquiry/ajax_get_enquiry_details') ?>",
            type: "POST",
            data: {
                enquiry_header_id: enquiry_header_id,
                object_class_id: object_class_id,
                object_id: object_id
            },
            success: function (html) {
                $('#enquiry-details-content').html(html);
                $('#tour-content').html("Select a tour plan to load itineraries.");
                $('#itinerary-content').html("Select itinerary to load itinerary extension.");
                $('#itinerary-extension-content').html('');

                // Wait for DOM to update then trigger first .enquiry-item
                setTimeout(function () {
                    var firstDetail = $('.enquiry-item').first();
                    if (firstDetail.length) {
                        var enquiry_details_id = firstDetail.attr('data-id');
                        var sid = firstDetail.attr('data-sid');

                        firstDetail.addClass('selected');

                        $.ajax({
                            url: "<?= site_url('Enquiry/ajax_get_tourplans') ?>",
                            type: "POST",
                            data: {
                                enquiry_details_id: enquiry_details_id,
                                object_id: object_id,
                                sid: sid
                            },
                            success: function (html) {
                                $('#tour-content').html(html);
                                $('#itinerary-content').html("Select itinerary to load itinerary extension.");
                                $('#itinerary-extension-content').html('');

                                // Wait again for DOM update then trigger first .tour-item
                                setTimeout(function () {
                                    var firstTour = $('.tour-item').first();
                                    if (firstTour.length) {
                                        firstTour.trigger('click');
                                    }
                                }, 200);
                            }
                        });
                    }
                }, 200);
            }
        });
    }
});

$(document).on('click', '.tour-item', function (e) {
    e.preventDefault();

    $('.tour-item').removeClass('selected');
    $(this).addClass('selected');

    //var tour_id = $(this).data('id');
    var tour_id = $(this).attr('data-id');
    var sid = $(this).attr('data-sid');
    var object_id = <?php echo $object_id; ?>;
    $.ajax({
        url: "<?= site_url('Enquiry/ajax_get_itineraries') ?>",
        type: "POST",
        data: {
             tour_id: tour_id,
             sid:sid,
             object_id:object_id
            },
        success: function (html) {
            $('#itinerary-content').html(html);
            $('#itinerary-extension-content').html('');
        }
    });
});

$(document).on('click', '.iti-item', function (e) {
    e.preventDefault();
    $('.iti-item').removeClass('selected');
    $(this).addClass('selected');
    // Load or handle itinerary logic
    //var iti_id = $(this).data('id');
    var iti_id = $(this).attr('data-id');
    var sid = $(this).attr('data-sid');
    
    $.ajax({
        url: "<?= site_url('Enquiry/ajax_get_extensions') ?>",
        type: "POST",
        data: { iti_id: iti_id,
                sid:sid
            },
        success: function (html) {
            $('#itinerary-extension-content').html(html);
        }
    });
});
</script>
<script>
$(document).on('click', '#show-more-ed', function (e) {
    e.preventDefault();
    $('#more-enquiry-details').slideDown();
    $('#show-more-ed').hide();
    $('#show-less-ed').show();
});

// Show Less button
$(document).on('click', '#show-less-ed', function (e) {
    e.preventDefault();
    $('#more-enquiry-details').slideUp();
    $('#show-less-ed').hide();
    $('#show-more-ed').show();
});

$(document).on('click', '#show-more-tour', function (e) {
    e.preventDefault();
    $('#more-tour-plans').slideDown();
    $('#show-more-tour').hide();
    $('#show-less-tour').show();
});

// Hide Previous Tour Plans
$(document).on('click', '#show-less-tour', function (e) {
    e.preventDefault();
    $('#more-tour-plans').slideUp();
    $('#show-less-tour').hide();
    $('#show-more-tour').show();
});

$(document).on('click', '#show-more-iti', function (e) {
    e.preventDefault();
    $('#more-itineraries').slideDown();
    $('#show-more-iti').hide();
    $('#show-less-iti').show();
});

// Hide Previous Itineraries
$(document).on('click', '#show-less-iti', function (e) {
    e.preventDefault();
    $('#more-itineraries').slideUp();
    $('#show-less-iti').hide();
    $('#show-more-iti').show();
});
</script>
<script>
$(document).ready(function () {
    var firstItem = $('.enquiry-header-item').first();
    if (firstItem.length) {
        firstItem.trigger('click');
    }
});
</script>






