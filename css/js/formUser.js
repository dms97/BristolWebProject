function checkPassword() {
    if ($('#pwd').val() !== $('#cpwd').val()) {
        $('#error_field').text("The new password field and confirm password field must match !");
        $("#button_save_form").attr("disabled", "disabled");
    } else if ($('#pwd').val().length < 6) {
        $('#error_field').text("The new password must have 6 character minimum");
        $("#button_save_form").attr("disabled", "disabled");
    } else {
        $('#error_field').html('');
        $("#button_save_form").removeAttr('disabled');
    }
}
