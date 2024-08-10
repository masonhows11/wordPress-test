<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <!-- Page Header -->
        <header class="masthead" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/about-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="page-heading">
                            <h1><?php  the_title() ?></h1>
                            <span class="subheading">Have questions? I have answers.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>




        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">

                    <?php the_content(); ?>

                </div>
            </div>
        </div>

        <hr>

    <?php endwhile; ?>

<?php endif ?>
