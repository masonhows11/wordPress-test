// alert('loaded in admin panel');
$(document).ready(function ($){


    $('#sendAjaxRequest').on('click',function (event){

        $.ajax({
            url:'/wp-admin/admin-ajax.php',
            type:'post',
            data:{

            }
        })

    })

})