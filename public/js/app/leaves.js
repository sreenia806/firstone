$(function () {
    $('#employee_id').change(function () {
        fetchEmployeeDetails($(this).val());
    });

    $('.form-body').on('click', '#add-leave', function () {
        $('#employee_id_hidden').val($('#employee_id').val());
    });

    $('.form-body').on('click', '.edit-leave', function () {
        showEditForm($(this));
    });

    if (employeeId) {
        // $("#myModal").modal();
        $("#employee_id_hidden").val(employeeId);
        fetchEmployeeDetails(employeeId)
    }
});

function showEditForm(button) {
    data = {};
    data.id = button.data('id');
    data.reference_number = button.data('reference_number');
    data.leave_type = button.data('leave_type');
    data.sanction_date = button.data('sanction_date');
    data.no_of_days = button.data('no_of_days');
    data.edit_path = editPath + data.id;

    Handlebars.registerHelper('showSelected', function(str1, str2) {
        if (str1 == str2)
            return 'selected';
        else
            return '';
    });

    var html = $('#edit-leave-template').html();
    var template = Handlebars.compile(html);
    var html = template(data);

    $('#leave-list').html(html);
    $("#edit-leave").modal();
    $('#sanction_date_edit').datepicker({
        format: 'yyyy-mm-dd'
    });
}

function fetchEmployeeDetails(employeeId, callback) {
    $.ajax({
        url: baseUrl + '/leaves/get-employee-leaves/' + employeeId,
        dataType: 'json',
        success: function (data) {
            $('#first_name').html(data.employee.first_name);
            $('#last_name').html(data.employee.last_name);
            $('#employee-block').show();

            var html = $('#leave-list-template').html();
            var template = Handlebars.compile(html);
            var html = template({leaves: data.leaves});

            $('#leave-list').html(html);

        }
    })
}

