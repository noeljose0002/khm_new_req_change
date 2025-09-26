<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Location</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <meta name="csrf-token" content="<?= csrf_hash() ?>" />
  <style>
    body {
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    btn-group-sm > .btn,
    .btn-sm {
      --bs-btn-padding-y: 0.25rem;
      --bs-btn-padding-x: 0.5rem;
      --bs-btn-font-size: 1.2rem;
      --bs-btn-border-radius: 0.25rem;
    }

    /* Container styling for form sections */
    .container-custom {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    /* Table container styling for Records List Section */
    .records-list {
      background: #fff;
      padding: 30px;
    }

    .table-responsive {
      overflow-x: auto;
    }

    .table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
    }

    .table th,
    .table td {
      border: 1px solid #dee2e6;
      padding: 12px;
      text-align: center;
      vertical-align: middle;
    }

    /* Limit timezone and description columns to 10 characters */
    .desc-col,
    .timezone-col {
      max-width: 10ch;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    th.actions-col,
    td.actions-col {
      min-width: 150px;
    }

    .table tr:hover {
      background: #d4edda;
      transition: background-color 0.3s ease;
    }

    .geog-entry {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      align-items: flex-end;
      padding: 20px;
      border: 1px solid #ced4da;
      border-radius: 8px;
      background: #f8f9fa;
      margin-bottom: 15px;
    }

    .geog-entry .form-group {
      flex: 1 1 150px;
    }

    .ui-autocomplete,
    .ui-menu {
      position: absolute !important;
      z-index: 10000;
      background: #fff;
      border: 1px solid #ccc;
      max-height: 200px;
      overflow-y: auto;
      padding-right: 20px;
    }

    @media (max-width: 576px) {
      .table th,
      .table td {
        padding: 8px;
      }
    }

    /* Map for the Add/Edit form */
    #map {
      height: 400px;
      margin-top: 15px;
      display: none;
    }

    /* Map for the Distance Calculator */
    #distanceMap {
      height: 500px;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <!-- Main Tabs for "Edit Geography Record" and "Calculate Distance" -->
  <div class="container mt-5">
    <ul class="nav nav-tabs" id="mainTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="edit-tab" data-bs-toggle="tab" data-bs-target="#editRecord" type="button" role="tab" aria-controls="editRecord" aria-selected="true">
          Edit Geography Record
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="calc-tab" data-bs-toggle="tab" data-bs-target="#calcDistance" type="button" role="tab" aria-controls="calcDistance" aria-selected="false">
          Calculate Distance
        </button>
      </li>
    </ul>
    <div class="tab-content" id="mainTabsContent">
      <!-- Edit Geography Record Tab (Add/Edit Form) -->
      <div class="tab-pane fade show active" id="editRecord" role="tabpanel" aria-labelledby="edit-tab">
        <!-- Form Section -->
        <div class="container container-custom mt-3">
          <h2 id="formHeading" class="text-center mb-4">Add Geography Record</h2>
          <div id="success-message" class="alert alert-success d-none"></div>
          <div id="error-messages" class="alert alert-danger d-none"></div>
          <form id="addGeogForm" class="needs-validation" novalidate>
            <input type="hidden" id="editing_geog_id" value="" />
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="geog_level_id" class="form-label">Select Geography Level</label>
                <select id="geog_level_id" name="geog_level_id" class="form-control" required>
                  <option value="">-- Select Geography Level --</option>
                  <?php if (isset($levels) && is_array($levels)): ?>
                    <?php foreach ($levels as $level): ?>
                      <option value="<?= $level['geog_level_id'] ?>"><?= strtolower($level['geog_level_name']) ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
                <div class="invalid-feedback">Please select a geography level.</div>
              </div>
              <div class="col-md-6">
                <label for="enterprise_id" class="form-label">Enterprise ID</label>
                <input type="number" min="1" id="enterprise_id" name="enterprise_id" class="form-control" placeholder="Enter enterprise ID" required />
                <div class="invalid-feedback">Enterprise ID is required and must be a positive number.</div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Geography Record Details</label>
              <div id="geog-container">
                <div class="geog-entry">
                  <div class="form-group">
                    <label>Geography Name</label>
                    <input type="text" id="geog_name" name="geog_name" class="form-control" placeholder="Enter your location" required />
                    <div class="invalid-feedback">Geography Name is required.</div>
                  </div>
                  <!-- Parent ID field with autocomplete and required -->
                  <div class="form-group">
                    <label>Parent ID</label>
                    <input type="text" id="geog_parent_id" name="geog_parent_id" class="form-control" placeholder="Parent ID" required />
                    <div class="invalid-feedback">Parent ID is required.</div>
                  </div>
                  <div class="form-group">
                    <label>Is Arrival?</label>
                    <select name="geog_is_arrival" class="form-control" required>
                      <option value="">Select</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                    <div class="invalid-feedback">Select arrival status.</div>
                  </div>
                  <div class="form-group">
                    <label>Is Departure?</label>
                    <select name="geog_is_departure" class="form-control" required>
                      <option value="">Select</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                    <div class="invalid-feedback">Select departure status.</div>
                  </div>
                  <div class="form-group">
                    <label>Longitude</label>
                    <input type="number" step="any" id="geog_longitude" name="geog_longitude" class="form-control" placeholder="Longitude" />
                  </div>
                  <div class="form-group">
                    <label>Latitude</label>
                    <input type="number" step="any" id="geog_latitude" name="geog_latitude" class="form-control" placeholder="Latitude" />
                  </div>
                  <div class="form-group">
                    <label>Timezone</label>
                    <input type="text" id="geog_timezone" name="geog_timezone" class="form-control" placeholder="Timezone" />
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="geog_description" class="form-control" placeholder="Description" rows="3"></textarea>
                  </div>
                  <div class="w-100"></div>
                  <div class="form-group text-end">
                    <button type="button" id="clearEntry" class="btn btn-warning">Clear</button>
                  </div>
                </div>
              </div>
              <button type="button" id="toggleMap" class="btn btn-primary mt-3">View in Map</button>
              <div id="map"></div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" id="submitBtn">Add Geography Record</button>
              <button type="button" id="cancelEdit" class="btn btn-secondary" style="display: none;">Cancel Edit</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Calculate Distance Tab -->
      <div class="tab-pane fade" id="calcDistance" role="tabpanel" aria-labelledby="calc-tab">
        <div class="container container-custom mt-3">
          <h2 class="text-center mb-4">Distance Calculator</h2>
          <div class="row mb-3">
            <!-- Start Location -->
            <div class="col-md-6">
              <label for="startLocation" class="form-label">Start Location</label>
              <input type="text" id="startLocation" class="form-control" placeholder="Type or select..." />
              <!-- Suggestion dropdown populated from records list -->
              <select id="startSuggestion" class="form-select mt-2">
                <option value="">Select from Records</option>
              </select>
              <input type="hidden" id="startLat" />
              <input type="hidden" id="startLng" />
            </div>
            <!-- End Location -->
            <div class="col-md-6">
              <label for="endLocation" class="form-label">End Location</label>
              <input type="text" id="endLocation" class="form-control" placeholder="Type or select..." />
              <select id="endSuggestion" class="form-select mt-2">
                <option value="">Select from Records</option>
              </select>
              <input type="hidden" id="endLat" />
              <input type="hidden" id="endLng" />
            </div>
          </div>
          <!-- Distance Map -->
          <div id="distanceMap"></div>
          <!-- Buttons -->
          <div class="btn-group mt-3 w-100">
            <button id="calculateDistanceBtn" class="btn btn-success">Calculate Distance</button>
            <button id="resetDistanceBtn" class="btn btn-danger">Reset</button>
          </div>
          <h4 id="distanceResult" class="text-center mt-3"></h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Geography Records List Section (Common to Both) -->
  <div class="container-fluid records-list">
    <h2 class="text-center mb-4">Geography Records List</h2>
    <div class="row mb-3">
      <div class="col-md-4 ms-auto">
        <input type="text" id="searchBox" class="form-control" placeholder="Search Records..." />
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-dark">
          <tr>
            <th>Geog ID</th>
            <th>Level ID</th>
            <th>Name</th>
            <th>Parent ID</th>
            <th>Arrival</th>
            <th>Departure</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th class="timezone-col">Timezone</th>
            <th class="desc-col">Description</th>
            <th>Enterprise ID</th>
            <th>Level Name</th>
            <th class="text-center actions-col">Actions</th>
          </tr>
        </thead>
        <tbody id="geogRecordList">
          <?php if (isset($records) && is_array($records) && count($records)): ?>
            <?php foreach ($records as $record): ?>
              <tr id="row_<?= $record['geog_id'] ?>">
                <td><?= $record['geog_id'] ?></td>
                <td><?= $record['geog_level_id'] ?></td>
                <td><?= $record['geog_name'] ?></td>
                <td><?= $record['geog_parent_id'] ?></td>
                <td><?= $record['geog_is_arrival'] == 1 ? 'Yes' : 'No' ?></td>
                <td><?= $record['geog_is_departure'] == 1 ? 'Yes' : 'No' ?></td>
                <td><?= $record['geog_longitude'] ?></td>
                <td><?= $record['geog_latitude'] ?></td>
                <td class="timezone-col"><?= $record['goeg_timezone'] ?></td>
                <td class="desc-col"><?= $record['geog_description'] ?></td>
                <td><?= $record['enterprise_id'] ?></td>
                <td><?= $record['geog_level_name'] ?></td>
                <td class="text-center actions-col">
                  <div class="btn-group" role="group">
                    <?php if (isset($record['deleted_at']) && $record['deleted_at'] !== null): ?>
                      <button class="btn btn-warning btn-sm" onclick="restoreRecord('<?= $record['geog_id'] ?>')">
                        <i class="bi bi-arrow-counterclockwise"></i>
                      </button>
                    <?php else: ?>
                      <!-- View Button -->
                      <button class="btn btn-info btn-sm view-btn" data-record='<?= htmlspecialchars(json_encode($record), ENT_QUOTES, "UTF-8") ?>'>
                        <i class="bi bi-eye"></i>
                      </button>
                      <!-- Edit Button -->
                      <button class="btn btn-success btn-sm edit-btn" data-record='<?= htmlspecialchars(json_encode($record), ENT_QUOTES, "UTF-8") ?>'>
                        <i class="bi bi-pencil-square"></i>
                      </button>
                      <!-- Delete Button -->
                      <button class="btn btn-danger btn-sm" onclick="deleteRecord('<?= $record['geog_id'] ?>')">
                        <i class="bi bi-trash"></i>
                      </button>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="13" class="text-center">No records found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- View Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewModalLabel">Geography Record Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Record details will be injected here -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle JS (includes Popper for modals and tabs) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- *********************************************** -->
  <!-- Existing CRUD & Map/Autocomplete Scripts (Add/Edit Form, Table operations, etc.) -->
  <!-- *********************************************** -->
  <script>
    var baseURL = "<?= site_url(); ?>/";
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
      }
    });
    $.ajaxPrefilter(function (options) {
      if (options.url.indexOf("https://api.geoapify.com") === 0 && options.headers)
        delete options.headers["X-CSRF-TOKEN"];
    });

    // Store the last geocoding result for manual level changes.
    var lastGeoItem = null;

    (function () {
      "use strict";
      window.addEventListener("load", function () {
        var form = document.getElementById("addGeogForm");
        form.addEventListener("submit", function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add("was-validated");
        }, false);
      }, false);
    })();

    // --------------------------
    // Autocomplete for Geography Name
    // --------------------------
    $(function () {
      $("#geog_name").autocomplete({
        minLength: 3,
        appendTo: "body",
        autoFocus: true,
        source: function (request, response) {
          $.ajax({
            type: "GET",
            url: "https://api.geoapify.com/v1/geocode/search",
            dataType: "json",
            data: {
              text: request.term,
              format: "json",
              apiKey: "46ab7b49387d4b59984151af1ce71554"
            },
            success: function (data) {
              var results = data.results || [];
              response(results.length ? $.map(results, function (item) {
                return {
                  label: item.formatted,
                  value: item.formatted,
                  lat: item.lat,
                  lon: item.lon,
                  timezone: item.timezone || {},
                  country: item.country,
                  state: item.state,
                  county: item.county,
                  city: item.city,
                  town: item.town,
                  suburb: item.suburb
                };
              }) : []);
            },
            error: function (xhr, status, error) {
              console.error("Geoapify API error:", status, error);
              response([]);
            }
          });
        },
        select: function (e, ui) {
          lastGeoItem = ui.item;
          $("#geog_latitude").val(ui.item.lat);
          $("#geog_longitude").val(ui.item.lon);
          $("#geog_timezone").val(
            typeof ui.item.timezone === "object" ?
              JSON.stringify(ui.item.timezone) :
              JSON.stringify({ name: ui.item.timezone })
          );
          var detected = "";
          if (ui.item.suburb?.trim() || ui.item.town?.trim()) {
            detected = "sublocation";
          } else if (ui.item.county?.trim() && ui.item.city?.trim()) {
            detected = "location";
          } else if (ui.item.state?.trim()) {
            detected = "region";
          } else if (ui.item.country?.trim()) {
            detected = "country";
          }
          if (detected) {
            $("#geog_level_id option")
              .filter(function () {
                return $(this).text().replace(/\s+/g, "").toLowerCase() === detected;
              })
              .prop("selected", true);
          }
          $('textarea[name="geog_description"]').val(ui.item.label + " - ");
          if (map) {
            map.setView([ui.item.lat, ui.item.lon], 15);
            marker ? marker.setLatLng([ui.item.lat, ui.item.lon]) : marker = L.marker([ui.item.lat, ui.item.lon]).addTo(map);
          }
          if (["sublocation", "location", "region"].indexOf(detected) !== -1) {
            setTimeout(function () {
              $("#geog_parent_id").focus();
              $("#geog_parent_id").autocomplete("search", "");
            }, 300);
          }
        }
      });
    });

    // Clear the Parent ID when the Geography Level changes.
    $("#geog_level_id").on("change", function () {
      $('input[name="geog_parent_id"]').val('');
    });

    // --------------------------
    // Map and Reverse Geocoding for Add/Edit Form
    // --------------------------
    var map, marker;
    function updateFormFields(lat, lon, address, detected) {
      $("#geog_name").val(address);
      $('input[name="geog_latitude"]').val(lat);
      $('input[name="geog_longitude"]').val(lon);
      if (detected) {
        $("#geog_level_id option").filter(function () {
          return $(this).text().replace(/\s+/g, "").toLowerCase() === detected;
        }).prop("selected", true);
      }
      $('textarea[name="geog_description"]').val(address + " - ");
    }

    function initMap() {
      if (map) return;
      var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
          maxZoom: 19,
          attribution: "&copy; OpenStreetMap contributors"
        }),
        esri = L.tileLayer("https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {
          maxZoom: 19,
          attribution: "Tiles &copy; Esri"
        });
      map = L.map("map", {
        center: [20, 0],
        zoom: 2,
        layers: [osm]
      });
      L.control.layers({
        "OpenStreetMap": osm,
        "Esri World Imagery": esri
      }).addTo(map);
      map.on("click", function (e) {
        var lat = e.latlng.lat,
          lon = e.latlng.lng;
        marker ? marker.setLatLng(e.latlng) : marker = L.marker(e.latlng).addTo(map);
        $.ajax({
          url: "https://nominatim.openstreetmap.org/reverse",
          dataType: "json",
          data: {
            lat: lat,
            lon: lon,
            format: "json",
            "accept-language": "en"
          },
          success: function (data) {
            if (data && data.display_name) {
              var detected = "sublocation";
              updateFormFields(lat, lon, data.display_name, detected);
            }
          },
          error: function (xhr, status, error) {
            console.error("Reverse geocoding failed:", status, error);
          }
        });
      });
    }
    $("#toggleMap").on("click", function () {
      var m = $("#map");
      if (m.is(":visible")) {
        m.slideUp();
        $(this).text("View in Map");
      } else {
        m.slideDown(function () {
          if (!map) initMap();
          setTimeout(function () {
            map.invalidateSize();
          }, 200);
          var lat = parseFloat($('input[name="geog_latitude"]').val()),
            lon = parseFloat($('input[name="geog_longitude"]').val());
          if (!isNaN(lat) && !isNaN(lon)) {
            map.setView([lat, lon], 15);
            marker ? marker.setLatLng([lat, lon]) : marker = L.marker([lat, lon]).addTo(map);
          }
        });
        $(this).text("Hide Map");
      }
    });

    // --------------------------
    // Other Form Operations (Delete, Restore, Edit, Reset)
    // --------------------------
    $("#clearEntry").on("click", resetForm);

    function deleteRecord(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "This will mark the record as deleted (soft delete).",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            //url: baseURL + "geog/deleteGeog/" + id,
            url: '<?=site_url('GeogController/deleteGeog/');?>'+id,
            method: "DELETE",
            dataType: "json",
            success: function (resp) {
              if (resp.success) {
                Swal.fire({
                  title: "Deleted!",
                  text: "The record has been marked as deleted.",
                  icon: "success",
                  allowOutsideClick: false
                }).then(() => {
                  $("#row_" + id).fadeOut(500, function () {
                    $(this).remove();
                  });
                });
              } else Swal.fire("Error!", resp.message || "Failed to delete record.", "error");
            },
            error: function () {
              Swal.fire("Error!", "Failed to delete record.", "error");
            }
          });
        }
      });
    }

    function restoreRecord(id) {
      Swal.fire({
        title: "Restore Record?",
        text: "This will restore the soft-deleted record.",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, restore it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            //url: baseURL + "geog/restoreGeog/" + id,
            url: '<?=site_url('GeogController/restoreGeog/');?>'+id,
            method: "PUT",
            dataType: "json",
            success: function (resp) {
              if (resp.success)
                Swal.fire({
                  title: "Restored!",
                  text: "The record has been restored.",
                  icon: "success",
                  allowOutsideClick: false
                }).then(() => {
                  location.reload();
                });
              else Swal.fire("Error!", resp.message || "Failed to restore record.", "error");
            },
            error: function () {
              Swal.fire("Error!", "Failed to restore record.", "error");
            }
          });
        }
      });
    }
    $(document).on("click", ".edit-btn", function () {
      var record = $(this).data("record");
      if (typeof record === "string") record = JSON.parse(record);
      $("#editing_geog_id").val(record.geog_id);
      $("#geog_level_id").val(record.geog_level_id);
      $("#enterprise_id").val(record.enterprise_id);
      $('input[name="geog_name"]').val(record.geog_name);
      $('input[name="geog_parent_id"]').val(record.geog_parent_id);
      $('select[name="geog_is_arrival"]').val(record.geog_is_arrival);
      $('select[name="geog_is_departure"]').val(record.geog_is_departure);
      $('input[name="geog_longitude"]').val(record.geog_longitude);
      $('input[name="geog_latitude"]').val(record.geog_latitude);
      $('input[name="geog_timezone"]').val(record.goeg_timezone);
      $('textarea[name="geog_description"]').val(record.geog_description);
      $("#formHeading").text("Edit Geography Record");
      $("#submitBtn").text("Update Geography Record");
      $("#cancelEdit").show();
      $("html, body").animate({
        scrollTop: 0
      }, "fast");
      var lat = parseFloat(record.geog_latitude),
        lon = parseFloat(record.geog_longitude);
      if (!isNaN(lat) && !isNaN(lon)) {
        if (!map) {
          $("#map").slideDown();
          $("#toggleMap").text("Hide Map");
          initMap();
        }
        map.setView([lat, lon], 15);
        marker ? marker.setLatLng([lat, lon]) : marker = L.marker([lat, lon]).addTo(map);
      }
    });

    function resetForm() {
      $("#editing_geog_id").val("");
      var f = $("#addGeogForm");
      f.removeClass("was-validated")[0].reset();
      $("#formHeading").text("Add Geography Record");
      $("#submitBtn").text("Add Geography Record");
      $("#cancelEdit").hide();
    }
    $("#cancelEdit").click(resetForm);
    $("#addGeogForm").submit(function (e) {
      e.preventDefault();
      if (!this.checkValidity()) return;
      var editingId = $("#editing_geog_id").val(),
        dataToSend = {
          geog_level_id: $("#geog_level_id").val(),
          enterprise_id: $("#enterprise_id").val(),
          geog_name: $('input[name="geog_name"]').val(),
          geog_parent_id: $('input[name="geog_parent_id"]').val(),
          geog_is_arrival: $('select[name="geog_is_arrival"]').val(),
          geog_is_departure: $('select[name="geog_is_departure"]').val(),
          geog_longitude: $('input[name="geog_longitude"]').val(),
          geog_latitude: $('input[name="geog_latitude"]').val(),
          geog_timezone: $('input[name="geog_timezone"]').val(),
          geog_description: $('textarea[name="geog_description"]').val()
        },
        urlEndpoint = editingId ? "GeogController/updateGeog/" + editingId : "GeogController/insertGeog",
        methodType = editingId ? "PUT" : "POST";
      $.ajax({
        url: baseURL + urlEndpoint,
        method: methodType,
        data: JSON.stringify(dataToSend),
        contentType: "application/json",
        dataType: "json",
        success: function (resp) {
          if (resp.success) {
            Swal.fire({
              title: "Success!",
              text: resp.message,
              icon: "success",
              allowOutsideClick: false
            }).then(function () {
              resetForm();
              location.reload();
            });
          } else Swal.fire("Error!", resp.message || "Error processing request.", "error");
        },
        error: function (xhr) {
          Swal.fire("Error!", (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Error processing request.", "error");
        }
      });
    });
    $("#searchBox").on("keyup", function () {
      var val = $(this).val().toLowerCase();
      $("#geogRecordList tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1);
      });
    });

    // --------------------------
    // Autocomplete for Parent ID Field
    // --------------------------
    $(document).ready(function () {
      var allRecords = [];
      $("#geogRecordList tr").each(function () {
        var geogId = $(this).find("td:eq(0)").text().trim();
        var levelId = $(this).find("td:eq(1)").text().trim();
        var geogName = $(this).find("td:eq(2)").text().trim();
        if (geogId) {
          allRecords.push({
            id: geogId,
            levelId: levelId,
            name: geogName
          });
        }
      });

      $("#geog_parent_id").autocomplete({
        minLength: 0,
        source: function (request, response) {
          var selectedLevel = $("#geog_level_id option:selected").text().trim().toLowerCase().replace(/\s/g, "");
          var term = request.term.toLowerCase();
          var matches = [];
          var requiredParentLevel = null;
          if (selectedLevel === "sublocation") {
            requiredParentLevel = "4";
          } else if (selectedLevel === "location") {
            requiredParentLevel = "3";
          } else if (selectedLevel === "region") {
            requiredParentLevel = "2";
          }
          if (requiredParentLevel) {
            matches = $.grep(allRecords, function (record) {
              return record.levelId === requiredParentLevel && record.name.toLowerCase().indexOf(term) !== -1;
            });
          }
          matches.sort(function (a, b) {
            return a.name.toLowerCase().indexOf(term) - b.name.toLowerCase().indexOf(term);
          });
          response($.map(matches, function (record) {
            return {
              label: record.name,
              value: record.id
            };
          }));
        },
        select: function (event, ui) {
          $("#geog_parent_id").val(ui.item.value);
          return false;
        }
      }).focus(function () {
        $(this).autocomplete("search", "");
      });
    });

    // --------------------------
    // View Modal Handler
    // --------------------------
    $(document).on("click", ".view-btn", function () {
      var record = $(this).data("record");
      if (typeof record === "string") record = JSON.parse(record);
      var html = "";
      html += "<p><strong>Geog ID:</strong> " + record.geog_id + "</p>";
      html += "<p><strong>Level ID:</strong> " + record.geog_level_id + "</p>";
      html += "<p><strong>Name:</strong> " + record.geog_name + "</p>";
      html += "<p><strong>Parent ID:</strong> " + record.geog_parent_id + "</p>";
      html += "<p><strong>Is Arrival:</strong> " + (record.geog_is_arrival == 1 ? "Yes" : "No") + "</p>";
      html += "<p><strong>Is Departure:</strong> " + (record.geog_is_departure == 1 ? "Yes" : "No") + "</p>";
      html += "<p><strong>Longitude:</strong> " + record.geog_longitude + "</p>";
      html += "<p><strong>Latitude:</strong> " + record.geog_latitude + "</p>";
      html += "<p><strong>Timezone:</strong> " + record.goeg_timezone + "</p>";
      html += "<p><strong>Description:</strong> " + record.geog_description + "</p>";
      html += "<p><strong>Enterprise ID:</strong> " + record.enterprise_id + "</p>";
      html += "<p><strong>Level Name:</strong> " + record.geog_level_name + "</p>";
      $("#viewModal .modal-body").html(html);
      var viewModal = new bootstrap.Modal(document.getElementById('viewModal'));
      viewModal.show();
    });
  </script>

  <!-- *********************************************** -->
  <!-- New Distance Calculator Scripts -->
  <!-- *********************************************** -->
  <script>
    // Build a JS variable from PHP records (common for both features)
    var geographyRecords = <?= isset($records) ? json_encode($records) : '[]'; ?>;
    
    // Populate suggestion dropdowns for the Distance Calculator
    function populateDistanceSuggestions() {
      // Clear existing options (except the default first option)
      $('#startSuggestion').find('option:not(:first)').remove();
      $('#endSuggestion').find('option:not(:first)').remove();
      geographyRecords.forEach(function (record) {
        // Ensure record has a name and lat/lng
        if (record.geog_name && record.geog_latitude && record.geog_longitude) {
          var option = '<option value="' + record.geog_name + '" data-lat="' + record.geog_latitude + '" data-lng="' + record.geog_longitude + '">' + record.geog_name + '</option>';
          $('#startSuggestion').append(option);
          $('#endSuggestion').append(option);
        }
      });
    }
    populateDistanceSuggestions();

    // When a suggestion is selected, update the corresponding input and hidden fields
    $('#startSuggestion').on('change', function () {
      var selected = $(this).find('option:selected');
      var name = selected.val();
      var lat = selected.data('lat');
      var lng = selected.data('lng');
      if (name) {
        $('#startLocation').val(name);
        $('#startLat').val(lat);
        $('#startLng').val(lng);
        if (startMarker) { distanceMap.removeLayer(startMarker); }
        startMarker = L.marker([lat, lng]).addTo(distanceMap);
      }
    });
    $('#endSuggestion').on('change', function () {
      var selected = $(this).find('option:selected');
      var name = selected.val();
      var lat = selected.data('lat');
      var lng = selected.data('lng');
      if (name) {
        $('#endLocation').val(name);
        $('#endLat').val(lat);
        $('#endLng').val(lng);
        if (endMarker) { distanceMap.removeLayer(endMarker); }
        endMarker = L.marker([lat, lng]).addTo(distanceMap);
      }
    });

    // Initialize the Distance Calculator Map
    var distanceMap = L.map('distanceMap').setView([20.5937, 78.9629], 5);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution: "&copy; OpenStreetMap contributors"
    }).addTo(distanceMap);
    var startMarker, endMarker, routeLayer;
    var isSelectingStart = true; // toggle marker placement on map click

    // Allow clicking on the map to add markers
    distanceMap.on('click', function (e) {
      var lat = e.latlng.lat;
      var lng = e.latlng.lng;
      if (isSelectingStart) {
        if (startMarker) { distanceMap.removeLayer(startMarker); }
        startMarker = L.marker([lat, lng]).addTo(distanceMap);
        $('#startLat').val(lat);
        $('#startLng').val(lng);
        $('#startLocation').val("Lat: " + lat.toFixed(4) + ", Lng: " + lng.toFixed(4));
      } else {
        if (endMarker) { distanceMap.removeLayer(endMarker); }
        endMarker = L.marker([lat, lng]).addTo(distanceMap);
        $('#endLat').val(lat);
        $('#endLng').val(lng);
        $('#endLocation').val("Lat: " + lat.toFixed(4) + ", Lng: " + lng.toFixed(4));
      }
      isSelectingStart = !isSelectingStart;
    });

    // Calculate Distance using Geoapify routing API
    function calculateDistance() {
      var startLat = $('#startLat').val();
      var startLng = $('#startLng').val();
      var endLat = $('#endLat').val();
      var endLng = $('#endLng').val();
      if (!startLat || !startLng || !endLat || !endLng) {
        alert("Please select or specify both start and end locations.");
        return;
      }
      var apiKey = "cff4204c34c2459b8d684b16ab8496eb";
      var apiUrl = `https://api.geoapify.com/v1/routing?waypoints=${startLat},${startLng}|${endLat},${endLng}&mode=drive&apiKey=${apiKey}`;
      $.getJSON(apiUrl, function (response) {
        if (response.features && response.features.length > 0) {
          var distance = response.features[0].properties.distance / 1000;
          $('#distanceResult').text("Distance: " + distance.toFixed(2) + " km");
          if (routeLayer) { distanceMap.removeLayer(routeLayer); }
          var coordinates = response.features[0].geometry.coordinates[0].map(function (coord) {
            return [coord[1], coord[0]];
          });
          routeLayer = L.polyline(coordinates, { color: 'blue', weight: 4 }).addTo(distanceMap);
          distanceMap.fitBounds(routeLayer.getBounds());
        } else {
          alert("Could not calculate the route.");
        }
      });
    }
    $('#calculateDistanceBtn').on('click', calculateDistance);
    $('#resetDistanceBtn').on('click', function () {
      if (startMarker) { distanceMap.removeLayer(startMarker); startMarker = null; }
      if (endMarker) { distanceMap.removeLayer(endMarker); endMarker = null; }
      if (routeLayer) { distanceMap.removeLayer(routeLayer); routeLayer = null; }
      $('#startLat, #startLng, #endLat, #endLng').val("");
      $('#startLocation, #endLocation').val("");
      $('#distanceResult').text("");
      isSelectingStart = true;
    });

    // Ensure the distance map resizes correctly when the tab is shown
    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
      if (e.target.id === "calc-tab") {
        distanceMap.invalidateSize();
      }
    });
  </script>
</body>

</html>
