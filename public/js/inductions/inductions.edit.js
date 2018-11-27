function InductionsEdit(inductionId, publicPath) {
    var inductionId = inductionId;
    var publicPath = publicPath;

    this.init = function() {
        $(".content").on('click', "#saveEmployee", function() {
            saveEmployee();
        });
    }

    function showAlert(message) {
        alert(message)
    }

    function saveEmployee() {
        var data = $("#frmInductionEdit").serialize();
        $.ajax({
            url: publicPath + "/inductions/create-employee/" + inductionId,
            type: "POST",
            dataType: "json",
            data: data,
            success: function(data) {
                if (!data.status == 'success') {
                    showAlert("Unable to save data");
                    return false;
                }

                var html = $('#template-employee-list').html();
                var template = Handlebars.compile(html);
                var employees = data.employees;
                var templateData = {};
                templateData.employees = [];

                $.each(employees, function(key, employee) {
                    employee.editPath = publicPath + "/employees/" + employee.id + '/edit';
                    employee.showPath = publicPath + "/employees/" + employee.id + '/show';
                    templateData.employees.push(employee);
                });

                var html = template(templateData);
                $('#employee-list').html(html);
                $('#modal').modal('hide');
                $('#modal').on('hidden.bs.modal', function() {
                    $('#closeModal').trigger('click');
                });
            }
        })
    }
}
