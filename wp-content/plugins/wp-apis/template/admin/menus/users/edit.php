<div class="wrap">
    <div>
        <h1>ویرایش کاربر</h1>
    </div>

    <div>
        <form action=""  method="post" >
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">نام</th>
                    <td><input type="text" name="firstname" ></td>
                </tr>
                <tr valign="top">
                    <th scope="row">ایمیل</th>
                    <td><input type="text" name="lastname"></td>
                </tr>
                <tr valign="top">
                    <th scope="row">موبایل</th>
                    <td><input type="text" name="mobile" value="<?php echo $mobile ?>"></td>
                </tr>
                <tr valign="top">
                    <th scope="row">کیف پول</th>
                    <td><input type="text" name="wallet" value="<?php echo $wallet ?>"></td>
                </tr>
                <tr valign="top">
                    <td><input type="submit" class="button" name="editData" value="بروز رسانی"></td>
                </tr>
            </table>
        </form>

    </div>




</div>
