<div class="wrap">

    <div>
        <h1>لیست اطلاعات</h1>
    </div>
    
    <div>
        <h3><a href="<?php echo add_query_arg([ 'action' => 'add' ]) ?>">ایجاد رکورد جدید</a></h3>
    </div>

    <div class="" style="margin:10px 0 10px 0">
        <button id="sendAjaxRequest" class="button">ارسال درخواست Ajax</button>
    </div>

    <div>
        <table class="widefat">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>نام  خانوادگی</th>
                <th>موبایل</th>
                <th>حذف</th>
                <th>ویرایش</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($samples as $sample): ?>
            <tr>
                <td><?php echo $sample->id; ?></td>
                <td><?php echo $sample->firstname; ?></td>
                <td><?php echo $sample->lastname; ?></td>
                <td><?php echo $sample->mobile; ?></td>
                <td><a href="<?php echo add_query_arg(['action'=>'delete','item'=> $sample->id]) ?>">حذف</a></td>
                <td><a href="<?php ?>">ویرایش</a></td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

    </div>


</div>


