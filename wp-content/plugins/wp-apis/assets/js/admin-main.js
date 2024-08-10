// alert('loaded in admin panel');
jQuery(document).ready(function ($){


    $('#sendAjaxRequest').on('click',function (event){

        $.ajax({
            // wp-admin/admin-ajax.php
            // the admin-ajax is file in wp-admin directory
            // this is important
            url:'/wp-admin/admin-ajax.php',
            dataType:'json',
            type:'post',
            data:{
                action:'calculate_operation',
                numberOne:100,
                numberTwo:50,
            },
            success:function (res){
                console.log(res);
               // alert(res['result'])
                alert(res.result + ' user id: ' + res.ID)
            },
            error:function (err){
                console.log(err);
            }
        })

    })

})