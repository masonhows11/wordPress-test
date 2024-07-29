<div class="wrap">

    <h1>تنظیمات</h1>

    <div>
        <form action="" method="post">
            <table class="form-table">


                <tr valign="top">
                    <th scope="row">فعال بودن ورود</th>
                    <td><input type="checkbox"
                               name="is_login_active" <?php if (isset($wp_auth_options['is_login_active'])) echo $wp_auth_options['is_login_active'] ? 'checked' : ''; ?> >
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">فعال بودن ثبت نام</th>
                    <td><input type="checkbox"
                               name="is_register_active" <?php if (isset($wp_auth_options['is_register_active'])) echo $wp_auth_options['is_register_active'] ? 'checked' : ''; ?> >
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">عنوان فرم ورود</th>
                    <td><input type="text" name="login_title_form"
                               value="<?php echo isset($wp_auth_options['login_title_form']) ? $wp_auth_options['login_title_form'] : ''; ?> ">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">عنوان فرم ثبت نام</th>
                    <td><input type="text" name="register_title_form"
                               value="<?php echo isset($wp_auth_options['register_title_form']) ? $wp_auth_options['register_title_form'] : ''; ?> ">
                    </td>
                </tr>
                <tr valign="top">
                    <td><input type="submit" class="button" name="saveData" value="ذخیره سازی"></td>
                </tr>
            </table>
        </form>
    </div>

</div>
