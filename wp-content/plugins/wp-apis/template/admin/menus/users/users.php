<div class="wrap">
    <h1> کاربران ویژه</h1>


    <form action="" method="post">


    </form>

    <div>
        <table class="widefat">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>ایمیل</th>
                <th>نام کاربری</th>
                <th>موبایل</th>
                <th>کیف پول</th>
                <th>حذف</th>
                <th>ویرایش</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($users as $user): ?>
            <?php
            $userWallet = get_user_meta($user->ID,'wallet',true);
            $userWallet = empty($userWallet) ? 0 : $userWallet;
            ?>
                <tr>
                    <td><?php echo $user->ID; ?></td>
                    <td><?php echo $user->user_email; ?></td>
                    <td><?php echo $user->display_name; ?></td>
                    <td><?php echo get_user_meta($user->ID,'mobile',true); ?></td>
                    <td><?php echo number_format($userWallet) . ' تومان '; ?></td>
                    <td>
                        <a href="<?php echo add_query_arg(['action'=>'deleteMobileWallet','id'=> $user->ID]); ?>">
                            <span class="dashicons dashicons-trash"></span>
                        </a></td>
                    <td>
                        <a href="<?php echo add_query_arg(['action'=>'edit','id'=> $user->ID  ]); ?>">
                            <span class="dashicons dashicons-edit"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

    </div>

</div>
