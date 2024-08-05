<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if(have_posts()): ?>
                <?php while(have_posts()): the_post(); ?>

                    <div class="post-preview">
                        <a href="<?php the_permalink(); ?>">
                            <h2 class="post-title">
                               <?php the_title(); ?>
                            </h2>
                            <h3 class="post-subtitle">
                                Problems look mighty small from 150 miles up
                            </h3>
                        </a>
                        <p class="post-meta">Posted by<a href="#">Start Bootstrap</a><?php the_date(); ?></p>
                    </div>
                    <hr>

                <?php endwhile; ?>
            <?php endif; ?>
            <!-- Pager -->
            <div class="clearfix">
                <?php next_posts_link('مصالب قدیمی تر'); ?>
<!--                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>-->
                <?php previous_posts_link('مطالب  جدید تر'); ?>
            </div>
        </div>
    </div>
</div>
<hr>