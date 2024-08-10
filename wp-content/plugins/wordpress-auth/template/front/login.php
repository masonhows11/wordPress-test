<div class="auth-wrapper">

    <div class="alert" style="display: none">
    </div>

    <div class="login-wrapper">
        <?php if(isset($wp_auth_options['login_title_form'])): ?>
                <h2 style="text-align: center"><?php echo $wp_auth_options['login_title_form']; ?></h2>
        <?php endif; ?>
        <form action="" method="post" id="custom-login-form">

            <div class="form-row">
                <label for="email">ایمیل</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="form-row">
                <label for="password">رمز عبور</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="form-row">
                <button type="submit" id="login-btn" class="btn" name="submit-login">ورورد</button>
            </div>
        </form>
    </div>
</div>