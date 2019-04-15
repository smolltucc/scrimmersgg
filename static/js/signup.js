$('#submit-button').click(function() {
    var f = false;
    $('#main-form *').filter(':input').each(function() {
        if(this.type == "text" && !this.value.length) {
            f = true;
            $(this).attr('placeholder', 'FIELD EMTPY');
        }
    });
    if($('#password').val() != $('#password-confirm').val()) {
        $('#pw-label').text('Password - Does not match');
        f = true;
    }
    if(!$('#password').val() || !$('#password-confirm').val()) {
        $('#password').attr('placeholder', 'FIELD EMPTY'); 
        $('#password-confirm').attr('placeholder', 'FIELD EMPTY');
        f = true;
    }
    if(f){return;}
    $.post(
        "/php/signUp.php",
        {
            username:$('#name').val(),
            email:$('#email').val(),
            password:$('#password').val(),
        },
        function(data) {
            if(data == "taken"){
                $('#nameLabel').text('Username - Take');
                $('#nameLabel').attr('color', 'red');
            }
            if(data['success']) {
                // redirect link to the user's page
            }
        }
    );
});