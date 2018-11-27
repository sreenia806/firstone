$(function () {
    $('#employee_id').change(function () {
        fetchEmployeeDetails($(this).val());
    });

    $('.form-body').on('click', "#add-promotion", function () {
        $('#employee_id_hidden').val($('#employee_id').val());
    });

    $('.form-body').on('click', '.edit-promotion', function () {
        showEditForm($(this));
    });
});

function showEditForm(button) {
    data = {};
    data.id = button.data('id');
    data.reference_number = button.data('reference_number');
    data.promotion_type = button.data('promotion_type');
    data.designation_id = button.data('designation_id');
    data.order_date = button.data('order_date');
    data.from_date = button.data('from_date');
    data.to_date = button.data('to_date');
    data.edit_path = editPath + data.id;

    data.designations = [];

    $.each(designations, function (key, designation) {
         if (designation.id == data.designation_id) {
             designation.selected = 'selected';
         } else {
             designation.selected = '';
         }

         data.designations.push(designation);
    });

    Handlebars.registerHelper('showSelected', function(str1, str2) {
        if (str1 == str2)
            return 'selected';
        else
            return '';
    });

    var html = $('#edit-promotion-template').html();
    var template = Handlebars.compile(html);
    var html = template(data);

    $('#promotion-list').html(html);
    $("#edit-promotion").modal();
    $('#order_date_edit').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#from_date_edit').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#to_date_edit').datepicker({
        format: 'yyyy-mm-dd'
    });
}

function fetchEmployeeDetails(employeeId, callback) {
    $.ajax({
        url: baseUrl + '/promotions/get-employee-promotions/' + employeeId,
        dataType: 'json',
        success: function (data) {
            $('#first_name').html(data.employee.first_name);
            $('#last_name').html(data.employee.last_name);
            $('#employee-block').show();

            var html = $('#promotion-list-template').html();
            var template = Handlebars.compile(html);
            var html = template({promotions: data.promotions});

            $('#promotion-list').html(html);

        }
    })
}

