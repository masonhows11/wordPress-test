// alert('loaded in admin panel');
jQuery(document).ready(function ($){


    $('#sendAjaxRequest').on('click',function (event){

        $.ajax({
            url:'/wp-admin/admin-ajax.php',
            type:'post',
            data:{
                action:'calculate_operation',
                numberOne:56,
                numberTwo:50,
            },
            success:function (){},
            error:function (){}
        })

    })

})