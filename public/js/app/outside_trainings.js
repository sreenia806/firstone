$(function () {
    $('#employee_id').change(function () {
        fetchEmployeeDetails($(this).val());
    });

    $('.form-body').on('click', '#add-outside_training', function () {
        $('#employee_id_hidden').val($('#employee_id').val());
    });

    $('.form-body').on('click', '.edit-outside_training', function () {
        showEditForm($(this));
    });
});

function showEditForm(button) {
    data = {};
    data.id = button.data('id');
    data.reference_number = button.data('reference_number');
    data.order_date = button.data('order_date');
    data.training_details = button.data('training_details');
    data.edit_path = editPath + data.id;

    Handlebars.registerHelper('showSelected', function(str1, str2) {
        if (str1 == str2)
            return 'selected';
        else
            return '';
    });

    var html = $('#edit-outside_training-template').html();
    var template = Handlebars.compile(html);
    var html = template(data);

    $('#outside_training-list').html(html);
    $("#edit-outside_training").modal();
    $('#order_date_edit').datepicker({
        format: 'yyyy-mm-dd'
    });
}

function fetchEmployeeDetails(employeeId, callback) {
    $.ajax({
        url: baseUrl + '/outside_trainings/get-employee-outside_trainings/' + employeeId,
        dataType: 'json',
        success: function (data) {
            $('#first_name').html(data.employee.first_name);
            $('#last_name').html(data.employee.last_name);
            $('#employee-block').show();

            var html = $('#outside_training-list-template').html();
            var template = Handlebars.compile(html);
            var html = template({outside_trainings: data.outside_trainings});

            $('#outside_training-list').html(html);

        }
    })
}

