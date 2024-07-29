jQuery(document).ready(function ($) {


    // login ajax
    $('#custom-login-form').on('submit', function (event) {
        event.preventDefault();

        let notify = $('.alert');
        let email = $('#email').val();
        let pass = $('#password').val();
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'wp_auth_login',
                user_email: email,
                user_password: pass,
            },
            success: function (response) {

                if(response.success){
                    notify.removeClass('alert-class').addClass('alert-success');
                    notify.html('<p>' + response.message + '</p>');
                    notify.show(300);
                    setTimeout(function (){
                        window.location.href = '/';
                    },2000)

                }
            },
            error: function (error) {
                if (error) {
                    let message = error.responseJSON.message;
                    notify.addClass('alert-error');
                    notify.html('<p>' + message + '</p>');
                    notify.css('display', 'block');
                    notify.delay(2000).hide(400);
                }
            }
        });
    });

    // register ajax
    $('#custom-register-form').on('submit', function (event) {
        event.preventDefault();

        let notify = $('.alert');
        let username = $('#username').val();
        let family = $('#family').val();
        let email = $('#email').val();
        let pass = $('#password').val();
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'wp_auth_register',
                user_email: email,
                user_password: pass,
                user_name: username,
                family: family,
            },
            success: function (response) {
                console.log(response);
                if(response.success){
                    notify.removeClass('alert-class').addClass('alert-success');
                    notify.html('<p>' + response.message + '</p>');
                    notify.show(300);
                    setTimeout(function (){
                       // window.location.href = '/';
                        window.location.href = '/login';
                    },2000)

                }
            },
            error: function (error) {
                if (error) {
                    let message = error.responseJSON.message;
                    notify.addClass('alert-error');
                    notify.html('<p>' + message + '</p>');
                    notify.css('display', 'block');
                    notify.delay(2000).hide(400);
                }
            }
        });


    });


})