<?php get_header() ?>
<?php get_template_part('parts/top-navigation') ?>
<?php get_template_part('parts/single') ?>

<?php
// display comments
if (comments_open() || get_comments_number()):
    comments_template();
endif
// end display comments
?>

<?php get_footer() ?>
