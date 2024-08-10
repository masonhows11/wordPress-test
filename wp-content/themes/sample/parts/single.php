<!-- Page Header -->
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <header class="masthead" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/post-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-heading">
                            <h1><?php the_title() ?></h1>
                            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                            <span class="meta">Posted by
                                <a href="#">Start Bootstrap</a>
                                <?php the_date() ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Post Content -->
        <article>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">


                        <?php the_content(); ?>
                        <!-- for add link page for one post  -->
                        <?php wp_link_pages(); ?>

                    </div>
                </div>
            </div>
        </article>
        <hr>
    <?php endwhile; ?>
    <!--  set next link to access next post    -->
    <?php next_post_link(); ?>
    <!--  set previous link to access previous post    -->
    <?php previous_post_link(); ?>
<?php endif; ?>