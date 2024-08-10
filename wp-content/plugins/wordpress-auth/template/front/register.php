<div class="auth-wrapper">

    <div class="alert" style="display: none">
    </div>

    <div class="register-wrapper">
        <?php if(isset($wp_auth_options['register_title_form'])): ?>
            <h2 style="text-align: center"><?php echo $wp_auth_options['register_title_form'] ?></h2>
        <?php endif; ?>
        <form action="" method="post" id="custom-register-form">
            <div class="form-row">
                <label for="username">نام</label>
                <input type="text" name="username" id="username">
            </div>

            <div class="form-row">
                <label for="family">نام خانوادگی</label>
                <input type="text" name="family" id="family">
            </div>

            <div class="form-row">
                <label for="email">ایمیل</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="form-row">
                <label for="password">رمز عبور</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="form-row">
                <button type="submit" id="register-btn" class="btn" name="submit-register">ثبت نام</button>
            </div>
        </form>
    </div>
</div>