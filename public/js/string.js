// Ajax Logout
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#logout_btn').click(function () {
        $.ajax
        ({
            type: 'POST',
            url: ('/logout'),
            success: function()
            {
                window.location.href = '/homepage';
            }
        });
    });
});

$('.js-tilt').tilt({
    scale: 1.1
})
