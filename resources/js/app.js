require('./bootstrap');

$(function () {
    $('#flash-message').fadeIn(500).delay(2000).fadeOut(500);

    $('form').submit(function() {
        $(this).find(":submit").prop('disabled',true);
      });
});
