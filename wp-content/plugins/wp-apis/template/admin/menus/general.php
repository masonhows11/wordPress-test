<div class="wrap">
    <h1>تنظیمات پلاگین</h1>
    <!--    --><?php //echo $user_data['fname']  ?>
    <!--    --><?php //echo $user_data['lname']  ?>

    <form action="" method="post">

        <div>
            <label for="is_active_plugin">
                <input name="is_active_plugin" type="checkbox" id="is_active_plugin"
                    <?php echo isset($current_plugin_option) && intval($current_plugin_option)  > 0 ? 'checked' : '' ?> >
                فعال بودن پلاگین
            </label>
        </div>

        <div style="margin-top: 10px">
            <button class="button button-primary" name="saveSetting" type="submit">ذخیره سازی</button>
        </div>


    </form>

</div>


