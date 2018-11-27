$(function () {
    $('#employee_id').change(function () {
        fetchEmployeeDetails($(this).val());
    });

    $('.form-body').on('click', '#add-punishment', function () {
        $('#employee_id_hidden').val($('#employee_id').val());
    });

    $('.form-body').on('click', '.edit-punishment', function () {
        showEditForm($(this));
    });
});

function showEditForm(button) {
    data = {};
    data.id = button.data('id');
    data.reference_number = button.data('reference_number');
    data.punishment_type = button.data('punishment_type');
    data.order_date = button.data('order_date');
    data.punishment_details = button.data('punishment_details');
    data.edit_path = editPath + data.id;

    Handlebars.registerHelper('showSelected', function(str1, str2) {
        if (str1 == str2)
            return 'selected';
        else
            return '';
    });

    var html = $('#edit-punishment-template').html();
    var template = Handlebars.compile(html);
    var html = template(data);

    $('#punishment-list').html(html);
    $("#edit-punishment").modal();
    $('#order_date_edit').datepicker({
        format: 'yyyy-mm-dd'
    });
}

function fetchEmployeeDetails(employeeId, callback) {
    $.ajax({
        url: baseUrl + '/punishments/get-employee-punishments/' + employeeId,
        dataType: 'json',
        success: function (data) {
            $('#first_name').html(data.employee.first_name);
            $('#last_name').html(data.employee.last_name);
            $('#employee-block').show();

            var html = $('#punishment-list-template').html();
            var template = Handlebars.compile(html);
            var html = template({punishments: data.punishments});

            $('#punishment-list').html(html);

        }
    })
}

