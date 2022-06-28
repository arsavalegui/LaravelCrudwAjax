$(document).ready(function() {
    var startTimer;
    $('#email').on('keyup', function () {
        clearTimeout(startTimer);
        let email = $(this).val();
        startTimer = setTimeout(checkEmail, 500, email);
    });

    $('#email').on('keydown', function () {
        clearTimeout(startTimer);
    });

    function checkEmail(email) {
        $('#email-error').remove();
        if (email.length > 1) {
            $.ajax({
                type: 'post',
                url: "{{ route('checkEmail') }}",
                data: {
                    email: email,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.success == false) {
                        $('#email').after('<div id="email-error" class="text-danger" <strong>'+data.message[0]+'<strong></div>');
                    } else {
                        $('#email').after('<div id="email-error" class="text-success" <strong>'+data.message+'<strong></div>');
                    }

                }
            });
        } else {
            $('#email').after('<div id="email-error" class="text-danger" <strong>Email address can not be empty.<strong></div>');
        }
    }
});