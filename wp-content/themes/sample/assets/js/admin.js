jQuery(document).ready(function ($){

    // alert('hi');

    var uploader;
    $(document).on('click','#choose-picture',function (e){
       e.preventDefault();

        uploader = wp.media({
            title: 'انتخاب  تصویر',
            button:{
                text : 'انتخاب  تصویر',
            },
            multiple:false
        });
        
       if(uploader){
           uploader.open();
           return;
       }



    });

});