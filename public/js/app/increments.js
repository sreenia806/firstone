$(function () {
    $('#employee_id').change(function () {
        fetchEmployeeDetails($(this).val());
    });

    $('.form-body').on('click', '#add-increment', function () {
        $('#employee_id_hidden').val($('#employee_id').val());
    });

    $('.form-body').on('click', '.edit-increment', function () {
        showEditForm($(this));
    });
});

function showEditForm(button) {
    data = {};
    data.id = button.data('id');
    data.reference_number = button.data('reference_number');
    data.increment_type = button.data('increment_type');
    data.sanction_date = button.data('sanction_date');
    data.edit_path = editPath + data.id;

    Handlebars.registerHelper('showSelected', function(str1, str2) {
        if (str1 == str2)
            return 'selected';
        else
            return '';
    });

    var html = $('#edit-increment-template').html();
    var template = Handlebars.compile(html);
    var html = template(data);

    $('#increment-list').html(html);
    $("#edit-increment").modal();
    $('#sanction_date_edit').datepicker({
        format: 'yyyy-mm-dd'
    });
}

function fetchEmployeeDetails(employeeId, callback) {
    $.ajax({
        url: baseUrl + '/increments/get-employee-increments/' + employeeId,
        dataType: 'json',
        success: function (data) {
            $('#first_name').html(data.employee.first_name);
            $('#last_name').html(data.employee.last_name);
            $('#employee-block').show();

            var html = $('#increment-list-template').html();
            var template = Handlebars.compile(html);
            var html = template({increments: data.increments});

            $('#increment-list').html(html);

        }
    })
}

