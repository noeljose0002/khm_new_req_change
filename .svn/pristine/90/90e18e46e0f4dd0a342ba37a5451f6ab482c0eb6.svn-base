<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUD using AJAX in CodeIgniter 4</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- SweetAlert2 (for delete confirmation and notifications) -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    /* Table Styling */
    .table {
      border: 2px solid #d1e7d3;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      background-color: #f9f9f9;
    }
    .table th,
    .table td {
      vertical-align: middle;
      padding: 12px;
      text-align: center;
    }
    .table-hover tbody tr:hover {
      background-color: #e0f4e0;
    }
    /* Alert Styling for Add/Update */
    .alert {
      margin-top: 15px;
      font-weight: bold;
    }
    /* Form Styling */
    #addItemForm {
      border: 2px solid #d1e7d3;
      padding: 20px;
      border-radius: 8px;
      background-color: rgb(249, 249, 249);
    }
    #addItemForm .form-control {
      border-radius: 5px;
    }
    /* Custom Styling for Validation Feedback */
    .invalid-feedback {
      font-family: 'Arial', sans-serif;
      font-size: 0.9em;
      color: #dc3545;
    }
    .is-valid {
      border-color: #28a745 !important;
    }
    .is-invalid {
      border-color: #dc3545 !important;
    }
    /* Button Styling */
    .btn {
      border-radius: 5px;
    }
    .btn-success,
    .btn-danger {
      margin-right: 10px;
    }
    .cursor-pointer {
      cursor: pointer;
    }
    .field-entry {
      margin-bottom: 10px;
    }
    .remove-field {
      background-color: #ff4d4d;
      color: white;
      border-radius: 5px;
    }
    /* Layout for action buttons */
    .action-buttons {
      display: flex;
      justify-content: space-evenly;
    }
  </style>
</head>
<body>
  <!-- Main Form Section -->
  <div class="container mt-5">
    <h2 id="formHeading">Add Table</h2>
    <!-- Bootstrap Alert Containers for Add/Update Notifications -->
    <div id="success-message" class="alert alert-success d-none"></div>
    <div id="error-messages" class="alert alert-danger d-none"></div>
    <!-- Form with Bootstrap validation classes -->
    <form id="addItemForm" class="needs-validation" novalidate>
      <input type="hidden" id="table_id" name="table_id" />
      <div class="mb-3">
        <label for="table_name" class="form-label">Table Name</label>
        <input type="text" id="table_name" name="table_name" class="form-control" placeholder="Enter table name"
               pattern="(?=.*[A-Za-z]).+" minlength="3" maxlength="255" required>
        <div class="invalid-feedback">
          Table name must be 3-255 characters and include at least one alphabetic character.
        </div>
      </div>
      <div class="mb-3">
        <label for="enterprise_id" class="form-label">Enterprise ID</label>
        <input type="number" id="enterprise_id" name="enterprise_id" class="form-control" placeholder="Enter enterprise ID" required>
        <div class="invalid-feedback">
          Enterprise ID is required and must be an integer.
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Fields (Optional)</label>
        <div id="fields-container">
          <!-- Header Row -->
          <div class="d-flex gap-2 mb-2">
            <div style="flex: 2;">Field Name</div>
            <div style="flex: 2;">Field Type</div>
            <div style="flex: 2;">Attribute Type</div>
          </div>
          <!-- Initial Field Entry -->
          <div class="field-entry d-flex gap-2">
            <input type="text" name="fields[0][name]" class="form-control field-name" placeholder="Field Name"
                   pattern="(?=.*[A-Za-z]).+" minlength="3" maxlength="255" required>
            <div class="invalid-feedback">
              Field name must be 3-255 characters and include at least one alphabetic character.
            </div>
            <select name="fields[0][type]" class="form-control field-type" required>
              <option value="">Select Data Type</option>
              <option value="INT">INT</option>
              <option value="TINYINT">TINYINT</option>
              <option value="SMALLINT">SMALLINT</option>
              <option value="MEDIUMINT">MEDIUMINT</option>
              <option value="BIGINT">BIGINT</option>
              <option value="FLOAT">FLOAT</option>
              <option value="DOUBLE">DOUBLE</option>
              <option value="DECIMAL">DECIMAL</option>
              <option value="DECIMAL(10,8)">DECIMAL(10,8)</option>
              <option value="DATE">DATE</option>
              <option value="DATETIME">DATETIME</option>
              <option value="TIMESTAMP">TIMESTAMP</option>
              <option value="TIME">TIME</option>
              <option value="YEAR">YEAR</option>
              <option value="CHAR">CHAR</option>
              <option value="VARCHAR">VARCHAR</option>
              <option value="VARCHAR(20)">VARCHAR(20)</option>
              <option value="VARCHAR(30)">VARCHAR(30)</option>
              <option value="VARCHAR(50)">VARCHAR(50)</option>
              <option value="VARCHAR(100)">VARCHAR(100)</option>
              <option value="TEXT">TEXT</option>
              <option value="TINYINT(1)">TINYINT(1)</option>
              <option value="JSON">JSON</option>
              <option value="MEDIUMTEXT">MEDIUMTEXT</option>
              <option value="LONGTEXT">LONGTEXT</option>
              <option value="BLOB">BLOB</option>
            </select>
            <div class="invalid-feedback">
              Field type is required.
            </div>
            <select name="fields[0][attribute_type]" class="form-control attribute-type" required>
              <option value="">Select Attribute Type</option>
              <option value="SPY">SPY</option>
              <option value="PKY">PKY</option>
              <option value="FKY">FKY</option>
              <option value="ATT">ATT</option>
            </select>
            <div class="invalid-feedback">
              Field attribute type is required.
            </div>
            <button type="button" class="btn btn-danger remove-field">X</button>
          </div>
        </div>
        <button type="button" class="btn btn-secondary mt-2" id="add-field">Add Field</button>
      </div>
      <button type="submit" class="btn btn-primary" id="submitBtn">Add Table</button>
      <button type="button" id="cancelEdit" class="btn btn-secondary" style="display: none;">Cancel Edit</button>
    </form>
  </div>

  <!-- Table List Section -->
  <div class="container mt-4">
    <h2>Table List</h2>
    <!-- Search Box Filter -->
    <div class="row mb-3">
      <div class="col-md-4" style="margin-left: auto;">
        <input type="text" id="searchBox" class="form-control" placeholder="Search Table..." />
      </div>
    </div>
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>Table Name</th>
          <th>Fields</th>
          <th>Enterprise ID</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="tableList">
        <tr>
          <td colspan="4" class="text-center">Loading data...</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    // The base URL is dynamically set using CodeIgniter's base_url() helper.
    var baseURL = "<?= base_url(); ?>";

    // Custom Bootstrap validation (runs on form submission)
    (function () {
      'use strict';
      window.addEventListener('load', function () {
        var form = document.getElementById('addItemForm');
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      }, false);
    })();

    // Function to load table data via AJAX
    function fetchItems() {
      $.ajax({
        url: baseURL + 'table/getItems',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
          $('#tableList').empty();
          if (data.length) {
            data.forEach(function (item) {
              let fieldsArr = [];
              if (typeof item.fields === 'string') {
                fieldsArr = parseFields(item.fields);
              } else if (Array.isArray(item.fields)) {
                fieldsArr = item.fields;
              }
              let fieldsText = fieldsArr.map(field => {
                return field.attribute_type ?
                  `${field.name} (${field.type}, ${field.attribute_type})` :
                  `${field.name} (${field.type})`;
              }).join(', ');
              $('#tableList').append(
                `<tr id="row_${item.table_id}">
                  <td>${item.table_name}</td>
                  <td>${fieldsText}</td>
                  <td>${item.enterprise_id}</td>
                  <td class="action-buttons">
                    <button class="btn btn-success btn-sm" onclick='editItem(${JSON.stringify(item)})'>Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteItem(${item.table_id})">Delete</button>
                  </td>
                </tr>`
              );
            });
          } else {
            $('#tableList').append('<tr><td colspan="4" class="text-center">No tables found.</td></tr>');
          }
        },
        error: function () {
          $('#tableList').html('<tr><td colspan="4" class="text-center">Error loading data.</td></tr>');
        }
      });
    }

    // Function to parse a fields string into an array (if needed)
    function parseFields(fieldStr) {
      const regex = /([^()]+)\(\s*([^)]+?)\s*\)(?:,|$)/g;
      let fields = [];
      let match;
      while ((match = regex.exec(fieldStr)) !== null) {
        let fieldName = match[1].trim();
        let fieldType = match[2].trim();
        fields.push({ name: fieldName, type: fieldType });
      }
      return fields;
    }

    $(document).ready(function () {
      fetchItems();

      // Search filter: filter table rows as you type
      $('#searchBox').on('keyup', function () {
        var value = $(this).val().toLowerCase();
        $("#tableList tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });

      $('#addItemForm').submit(function (e) {
        e.preventDefault();
        if (!this.checkValidity()) return;

        var table_id = $('#table_id').val();
        var table_name = $('#table_name').val();
        var enterprise_id = $('#enterprise_id').val();
        var fields = [];

        $('#fields-container .field-entry').each(function () {
          var field_name = $(this).find('.field-name').val();
          var field_type = $(this).find('.field-type').val();
          var attribute_type = $(this).find('.attribute-type').val();
          fields.push({
            name: field_name,
            type: field_type,
            attribute_type: attribute_type
          });
        });

        var apiUrl = table_id
          ? `${baseURL}table/updateItem/${table_id}`
          : `${baseURL}table/addItem`;
        var method = table_id ? 'PUT' : 'POST';

        var dataToSend = {
          table_name: table_name,
          enterprise_id: enterprise_id,
          fields: fields
        };

        $.ajax({
          url: apiUrl,
          method: method,
          data: JSON.stringify(dataToSend),
          contentType: 'application/json',
          dataType: 'json',
          success: function (response) {
            if (response.success) {
              $('#success-message').text(
                table_id ? 'Table updated successfully!' : 'Table added successfully!'
              ).removeClass('d-none');
              $('#error-messages').addClass('d-none').text('');
              resetForm();
              fetchItems();
            } else {
              $('#error-messages').text(response.message || 'Error processing request.').removeClass('d-none');
              $('#success-message').addClass('d-none').text('');
            }
          },
          error: function (xhr) {
            $('#error-messages').text(
              xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Error processing request.'
            ).removeClass('d-none');
            $('#success-message').addClass('d-none').text('');
          }
        });
      });

      // Dynamic field addition with unique indexes
      var fieldIndex = 1;
      $('#add-field').click(function () {
        var fieldHTML =
          `<div class="field-entry d-flex gap-2 mt-2">
            <input type="text" name="fields[${fieldIndex}][name]" class="form-control field-name" placeholder="Field Name" pattern="(?=.*[A-Za-z]).+" minlength="3" maxlength="255" required>
            <div class="invalid-feedback">
              Field name must be 3-255 characters and include at least one alphabetic character.
            </div>
            <select name="fields[${fieldIndex}][type]" class="form-control field-type" required>
              <option value="">Select Data Type</option>
              <option value="INT">INT</option>
              <option value="TINYINT">TINYINT</option>
              <option value="SMALLINT">SMALLINT</option>
              <option value="MEDIUMINT">MEDIUMINT</option>
              <option value="BIGINT">BIGINT</option>
              <option value="FLOAT">FLOAT</option>
              <option value="DOUBLE">DOUBLE</option>
              <option value="DECIMAL">DECIMAL</option>
              <option value="DECIMAL(10,8)">DECIMAL(10,8)</option>
              <option value="DATE">DATE</option>
              <option value="DATETIME">DATETIME</option>
              <option value="TIMESTAMP">TIMESTAMP</option>
              <option value="TIME">TIME</option>
              <option value="YEAR">YEAR</option>
              <option value="CHAR">CHAR</option>
              <option value="VARCHAR">VARCHAR</option>
              <option value="VARCHAR(20)">VARCHAR(20)</option>
              <option value="VARCHAR(30)">VARCHAR(30)</option>
              <option value="VARCHAR(50)">VARCHAR(50)</option>
              <option value="VARCHAR(100)">VARCHAR(100)</option>
              <option value="TEXT">TEXT</option>
              <option value="TINYINT(1)">TINYINT(1)</option>
              <option value="JSON">JSON</option>
              <option value="MEDIUMTEXT">MEDIUMTEXT</option>
              <option value="LONGTEXT">LONGTEXT</option>
              <option value="BLOB">BLOB</option>
            </select>
            <div class="invalid-feedback">
              Field type is required.
            </div>
            <select name="fields[${fieldIndex}][attribute_type]" class="form-control attribute-type" required>
              <option value="">Select Attribute Type</option>
              <option value="SPY">SPY</option>
              <option value="PKY">PKY</option>
              <option value="FKY">FKY</option>
              <option value="ATT">ATT</option>
            </select>
            <div class="invalid-feedback">
              Field attribute type is required.
            </div>
            <button type="button" class="btn btn-danger remove-field">X</button>
          </div>`;
        $('#fields-container').append(fieldHTML);
        fieldIndex++;
      });

      // Remove field entry
      $(document).on('click', '.remove-field', function () {
        $(this).closest('.field-entry').remove();
      });

      $('#cancelEdit').click(function () {
        resetForm();
      });
    });

    // When editing, load the data into the form.
    function editItem(item) {
      $('#table_id').val(item.table_id);
      $('#table_name').val(item.table_name);
      $('#enterprise_id').val(item.enterprise_id);
      $('#fields-container').empty();
      $('#fields-container').append(
        `<div class="d-flex gap-2 mb-2">
          <div style="flex: 2;">Field Name</div>
          <div style="flex: 2;">Field Type</div>
          <div style="flex: 2;">Attribute Type</div>
        </div>`
      );

      let fieldsArr = [];
      if (typeof item.fields === 'string') {
        fieldsArr = parseFields(item.fields);
      } else if (Array.isArray(item.fields)) {
        fieldsArr = item.fields;
      }
      fieldsArr.forEach(function (field, index) {
        $('#fields-container').append(
          `<div class="field-entry d-flex gap-2 mt-2">
            <input type="text" name="fields[${index}][name]" class="form-control field-name" value="${field.name}" placeholder="Field Name" pattern="(?=.*[A-Za-z]).+" minlength="3" maxlength="255" required>
            <div class="invalid-feedback">
              Field name must be 3-255 characters and include at least one alphabetic character.
            </div>
            <select name="fields[${index}][type]" class="form-control field-type" required>
              <option value="">Select Data Type</option>
              <option value="INT" ${(field.type || '').trim().toUpperCase() === "INT" ? 'selected' : ''}>INT</option>
              <option value="TINYINT" ${(field.type || '').trim().toUpperCase() === "TINYINT" ? 'selected' : ''}>TINYINT</option>
              <option value="SMALLINT" ${(field.type || '').trim().toUpperCase() === "SMALLINT" ? 'selected' : ''}>SMALLINT</option>
              <option value="MEDIUMINT" ${(field.type || '').trim().toUpperCase() === "MEDIUMINT" ? 'selected' : ''}>MEDIUMINT</option>
              <option value="BIGINT" ${(field.type || '').trim().toUpperCase() === "BIGINT" ? 'selected' : ''}>BIGINT</option>
              <option value="FLOAT" ${(field.type || '').trim().toUpperCase() === "FLOAT" ? 'selected' : ''}>FLOAT</option>
              <option value="DOUBLE" ${(field.type || '').trim().toUpperCase() === "DOUBLE" ? 'selected' : ''}>DOUBLE</option>
              <option value="DECIMAL" ${(field.type || '').trim().toUpperCase() === "DECIMAL" ? 'selected' : ''}>DECIMAL</option>
              <option value="DECIMAL(10,8)" ${(field.type || '').trim().toUpperCase() === "DECIMAL(10,8)" ? 'selected' : ''}>DECIMAL(10,8)</option>
              <option value="DATE" ${(field.type || '').trim().toUpperCase() === "DATE" ? 'selected' : ''}>DATE</option>
              <option value="DATETIME" ${(field.type || '').trim().toUpperCase() === "DATETIME" ? 'selected' : ''}>DATETIME</option>
              <option value="TIMESTAMP" ${(field.type || '').trim().toUpperCase() === "TIMESTAMP" ? 'selected' : ''}>TIMESTAMP</option>
              <option value="TIME" ${(field.type || '').trim().toUpperCase() === "TIME" ? 'selected' : ''}>TIME</option>
              <option value="YEAR" ${(field.type || '').trim().toUpperCase() === "YEAR" ? 'selected' : ''}>YEAR</option>
              <option value="CHAR" ${(field.type || '').trim().toUpperCase() === "CHAR" ? 'selected' : ''}>CHAR</option>
              <option value="VARCHAR" ${(field.type || '').trim().toUpperCase() === "VARCHAR" ? 'selected' : ''}>VARCHAR</option>
              <option value="VARCHAR(20)" ${(field.type || '').trim().toUpperCase() === "VARCHAR(20)" ? 'selected' : ''}>VARCHAR(20)</option>
              <option value="VARCHAR(30)" ${(field.type || '').trim().toUpperCase() === "VARCHAR(30)" ? 'selected' : ''}>VARCHAR(30)</option>
              <option value="VARCHAR(50)" ${(field.type || '').trim().toUpperCase() === "VARCHAR(50)" ? 'selected' : ''}>VARCHAR(50)</option>
              <option value="VARCHAR(100)" ${(field.type || '').trim().toUpperCase() === "VARCHAR(100)" ? 'selected' : ''}>VARCHAR(100)</option>
              <option value="TEXT" ${(field.type || '').trim().toUpperCase() === "TEXT" ? 'selected' : ''}>TEXT</option>
              <option value="TINYINT(1)" ${(field.type || '').trim().toUpperCase() === "TINYINT(1)" ? 'selected' : ''}>TINYINT(1)</option>
              <option value="JSON" ${(field.type || '').trim().toUpperCase() === "JSON" ? 'selected' : ''}>JSON</option>
              <option value="MEDIUMTEXT" ${(field.type || '').trim().toUpperCase() === "MEDIUMTEXT" ? 'selected' : ''}>MEDIUMTEXT</option>
              <option value="LONGTEXT" ${(field.type || '').trim().toUpperCase() === "LONGTEXT" ? 'selected' : ''}>LONGTEXT</option>
              <option value="BLOB" ${(field.type || '').trim().toUpperCase() === "BLOB" ? 'selected' : ''}>BLOB</option>
            </select>
            <div class="invalid-feedback">
              Field type is required.
            </div>
            <select name="fields[${index}][attribute_type]" class="form-control attribute-type" required>
              <option value="">Select Attribute Type</option>
              <option value="SPY" ${(field.attribute_type || '').trim().toUpperCase() === "SPY" ? 'selected' : ''}>SPY</option>
              <option value="PKY" ${(field.attribute_type || '').trim().toUpperCase() === "PKY" ? 'selected' : ''}>PKY</option>
              <option value="FKY" ${(field.attribute_type || '').trim().toUpperCase() === "FKY" ? 'selected' : ''}>FKY</option>
              <option value="ATT" ${(field.attribute_type || '').trim().toUpperCase() === "ATT" ? 'selected' : ''}>ATT</option>
            </select>
            <div class="invalid-feedback">
              Field attribute type is required.
            </div>
            <button type="button" class="btn btn-danger remove-field">X</button>
          </div>`
        );
      });

      $('#formHeading').text('Edit Table');
      $('#submitBtn').text('Update Table');
      $('#cancelEdit').show();
      // Scroll to the form element so it appears at the top of the viewport
      $('html, body').animate({
        scrollTop: $('#addItemForm').offset().top
      }, 'fast');
    }

    // Reset form fields and remove validation classes
    function resetForm() {
      var form = $('#addItemForm');
      form.removeClass('was-validated');
      form[0].reset();
      $('#fields-container').empty();
      $('#fields-container').append(
        `<div class="d-flex gap-2 mb-2">
          <div style="flex: 2;">Field Name</div>
          <div style="flex: 2;">Field Type</div>
          <div style="flex: 2;">Attribute Type</div>
        </div>`
      );
      $('#fields-container').append(
        `<div class="field-entry d-flex gap-2">
          <input type="text" name="fields[0][name]" class="form-control field-name" placeholder="Field Name" pattern="(?=.*[A-Za-z]).+" minlength="3" maxlength="255" required>
          <div class="invalid-feedback">
            Field name must be 3-255 characters and include at least one alphabetic character.
          </div>
          <select name="fields[0][type]" class="form-control field-type" required>
            <option value="">Select Data Type</option>
            <option value="INT">INT</option>
            <option value="TINYINT">TINYINT</option>
            <option value="SMALLINT">SMALLINT</option>
            <option value="MEDIUMINT">MEDIUMINT</option>
            <option value="BIGINT">BIGINT</option>
            <option value="FLOAT">FLOAT</option>
            <option value="DOUBLE">DOUBLE</option>
            <option value="DECIMAL">DECIMAL</option>
            <option value="DECIMAL(10,8)">DECIMAL(10,8)</option>
            <option value="DATE">DATE</option>
            <option value="DATETIME">DATETIME</option>
            <option value="TIMESTAMP">TIMESTAMP</option>
            <option value="TIME">TIME</option>
            <option value="YEAR">YEAR</option>
            <option value="CHAR">CHAR</option>
            <option value="VARCHAR">VARCHAR</option>
            <option value="VARCHAR(20)">VARCHAR(20)</option>
            <option value="VARCHAR(30)">VARCHAR(30)</option>
            <option value="VARCHAR(50)">VARCHAR(50)</option>
            <option value="VARCHAR(100)">VARCHAR(100)</option>
            <option value="TEXT">TEXT</option>
            <option value="TINYINT(1)">TINYINT(1)</option>
            <option value="JSON">JSON</option>
            <option value="MEDIUMTEXT">MEDIUMTEXT</option>
            <option value="LONGTEXT">LONGTEXT</option>
            <option value="BLOB">BLOB</option>
          </select>
          <div class="invalid-feedback">
            Field type is required.
          </div>
          <select name="fields[0][attribute_type]" class="form-control attribute-type" required>
            <option value="">Select Attribute Type</option>
            <option value="SPY">SPY</option>
            <option value="PKY">PKY</option>
            <option value="FKY">FKY</option>
            <option value="ATT">ATT</option>
          </select>
          <div class="invalid-feedback">
            Field attribute type is required.
          </div>
          <button type="button" class="btn btn-danger remove-field">X</button>
        </div>`
      );
      $('#table_id').val('');
      $('#formHeading').text('Add Table');
      $('#submitBtn').text('Add Table');
      $('#cancelEdit').hide();
    }

    // Delete an item via AJAX using SweetAlert2 for confirmation
    function deleteItem(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to delete this table? This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: `${baseURL}table/deleteItem/${id}`,
            method: 'DELETE',
            dataType: 'json',
            success: function (response) {
              if (response.success) {
                $(`#row_${id}`).remove();
                Swal.fire({
                  icon: 'success',
                  title: 'Deleted!',
                  text: 'Table deleted successfully.'
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Deletion Not Allowed',
                  text: response.message || 'Cannot delete table.'
                });
              }
            },
            error: function (xhr) {
              Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Error deleting table.'
              });
            }
          });
        }
      });
    }
  </script>
</body>
</html>
