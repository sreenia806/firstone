$(function() {
    $('#same_as_above').click(copyAddress);
});

function copyAddress() {
    if ($('#same_as_above').prop("checked") == true) {
        console.log($('#present_address1').val())
        $('#permanent_address1').val($('#present_address1').val());
        $('#permanent_address2').val($('#present_address2').val());
        $('#permanent_city').val($('#present_city').val());
        $('#permanent_state').val($('#present_state').val());
        $('#permanent_pincode').val($('#present_pincode').val());
    }
}