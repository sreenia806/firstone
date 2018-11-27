$(function () {
    $('#employee_id').change(function () {
        fetchEmployeeDetails($(this).val());
    });

    $('.form-body').on('click', '#add-reward', function () {
        $('#employee_id_hidden').val($('#employee_id').val());
    });

    $('.form-body').on('click', '.edit-reward', function () {
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
    data.reward_type = button.data('reward_type');
    data.sanction_date = button.data('sanction_date');
    data.reward_details = button.data('reward_details');

    data.edit_path = editPath + data.id;

    Handlebars.registerHelper('showSelected', function(str1, str2) {
        if (str1 == str2)
            return 'selected';
        else
            return '';
    });

    var html = $('#edit-reward-template').html();
    var template = Handlebars.compile(html);
    var html = template(data);

    $('#reward-list').html(html);
    $("#edit-reward").modal();
    $('#sanction_date_edit').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
}

function fetchEmployeeDetails(employeeId, callback) {
    $.ajax({
        url: baseUrl + '/rewards/get-employee-rewards/' + employeeId,
        dataType: 'json',
        success: function (data) {
            $('#first_name').html(data.employee.first_name);
            $('#last_name').html(data.employee.last_name);
            $('#employee-block').show();
            var html = $('#reward-list-template').html();
            var template = Handlebars.compile(html);
            var html = template({rewards: data.rewards});

            $('#reward-list').html(html);

        }
    })
}

