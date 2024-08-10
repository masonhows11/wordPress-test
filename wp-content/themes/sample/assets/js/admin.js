jQuery(document).ready(function ($) {

    // alert('hi');

    var uploader;
    $(document).on('click', '#choose-picture', function (e) {
        e.preventDefault();


        if (uploader) {
            uploader.open();
            return;
        }

        uploader = wp.media({
            title: 'انتخاب  تصویر',
            button: {
                text: 'انتخاب  تصویر',
            },
            multiple: false
        });

        uploader.on('select', function () {
            var attachment = uploader.state().get('selection').first().toJSON();
            $('#settings-img').attr('src', attachment.url);
            $('#settings-text').val(attachment.url);
           // console.log(attachment);
        });


    });

});