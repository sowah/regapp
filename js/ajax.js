// please add jquery first
$(document).ready(function() {

    //contact us ajax
    $('.contact-us-button').on('click', function() {
        if ($('#captcha').length != 0) {
            var v = grecaptcha.getResponse();
            if (v.length == 0) {
                document.getElementById('captcha').innerHTML = "You can't leave Captcha Code empty";
                return false;
            } else {
                document.getElementById('captcha').innerHTML = "Captcha completed";
            }
        }
        var contact_form = {
            first_name: $('.contact-first-name').val(),
            last_name: $('.contact-last-name').val(),
            email: $('.contact-email').val(),
            message: $('.contact-message').val(),
            phone: $('.contact-phone').val()
        }
        $.ajax({
            type: "POST",
            url: '../php/contact-form.php',
            data: contact_form,
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    return true;
                }
            },
            error: function(data) {
                alert("fail ajax");
            }
        });
    });

    //subscription ajax
    $('.subscription-button').on('click', function() {
        var subscription_form = {
            email: $('.subscription-email').val()
        }
        $.ajax({
            type: "POST",
            url: '../php/subscription.php',
            data: subscription_form,
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    return true;
                }
            },
            error: function(data) {
                alert("fail ajax");
            }
        });
    });

});