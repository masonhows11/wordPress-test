jQuery(document).ready(function ($) {


    // login ajax
    $('#custom-login-form').on('submit', function (event) {
        event.preventDefault();
        let notify = $('alert');
        let email = $('email').val();
        let pass = $('password').val();
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'wp_auth_login',
                user_email: email,
                user_password: pass,
            },
            success: function (res) {
                console.log(res);
            },
            error: function (error) {
                if (error){
                    notify.addClass('alert-success');
                    notify.append('<p> خطایی رخداده است </p>');
                    notify.css('display','block');
                    console.log(error);
                }


            }
        });
    });

    // register ajax
    $('#custom-register-form').on('submit', function (event) {
        event.preventDefault();
        let username = $('username').val();
        let family = $('family').val();
        let email = $('email').val();
        let pass = $('password').val();
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
            success: function (res) {
                console.log(res);
            },
            error: function (error) {
                console.log(error);
            }
        });


    });


})