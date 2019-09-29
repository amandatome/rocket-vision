<?php get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>
    <!-- Variables -->
    <?php
        $job_title = get_field('job_title');
        $fav_food = get_field('favourite_pizza');
        $fav_band = get_field('favourite_band');
        $fav_project = get_field('favourite_project'); ?>

    <div class='wrapper'>
        <div class='content'>
            <div class='member-information-wrap'>
                <h3 class='breadcrumbs'>
                    <?php
                        echo 'Team Members';
                        echo "<span class='chevron-breadcrumbs'>&nbsp;&nbsp;&#8250;&nbsp;&nbsp</span>";
                        $cats = get_the_terms($post, 'team');
                        foreach ($cats as $cat) {
                            echo $cat->name;
                        }
                        echo "<span class='chevron-breadcrumbs'>&nbsp;&nbsp;&#8250;&nbsp;&nbsp</span>";
                        echo the_title();
                        ?></h3>
                <div>
                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium-square', false, array('class' => 'featured-image')); ?>
                </div>

                <h2 class='member-name'><?php the_title() ?></h2>
                <?php if ($job_title) : ?>
                    <h3 class='member-job-title'><?php echo $job_title; ?></h3>
                <?php endif; ?>

                <?php if (!$fav_food && !$fav_band && !$fav_project) : ?>
                    <?php ''; ?>
                <?php else : ?>
                    <p id='additional-info'>Additional Information</p>
                <?php endif; ?>

                <div class="facts">
                    <?php if ($fav_food) : ?>
                        <p>Favourite Pizza Topping: <span class='info-color'><?php echo $fav_food; ?></span></p>
                    <?php endif; ?>

                    <?php if ($fav_band) : ?>
                        <p>Favourite Band: <span class='info-color'><?php echo $fav_band; ?></span></p>
                    <?php endif; ?>

                    <?php if ($fav_project) : ?>
                        <p>Favourite Project: <span class='info-color'> <a href="<?php echo $fav_project['url']; ?>"><?php echo $fav_project['title']; ?></a></span></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class='member-content'>
                <?php the_content(); ?>
            </div>
        </div>

    <?php endwhile; ?>

    <section>
        <div class="member-nav">
            <?php
            $prev_post = get_previous_post();
            $prev_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($prev_post->ID), 'square', false, array('class' => 'employee-image'));;
            $prev_title = get_the_title($prev_post->ID);
            $prev_job = get_field('job_title', $prev_post->ID) ?>
            <?php
            $next_post = get_next_post();
            $next_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($next_post->ID), 'square', false, array('class' => 'employee-image'));
            $next_title = get_the_title($next_post->ID);
            $next_job = get_field('job_title', $next_post->ID) ?>
            <?php // Display the thumbnail of the previous post 
            ?>
            <div class="member-nav-prev">
                <div class='nav-content-prev'>
                    <h3 class="nav-title">
                        <?php previous_post_link('%link', "<span class='chevron'>&#8249;&nbsp</span>Previous Team Member "); ?>
                    </h3>
                    <h4 class="member-title">
                        <?php previous_post_link('%link', $prev_title); ?>
                    </h4>
                    <h3 class="member-job">
                        <?php previous_post_link('%link', $prev_job); ?>
                    </h3>
                </div>

                <div class='image'>
                    <?php previous_post_link('%link', $prev_thumbnail); ?>
                </div>
            </div>

            <?php // Display the thumbnail of the next post 
            ?>
            <div class="member-nav-next">
                <div class='image'>
                    <?php next_post_link('%link', $next_thumbnail); ?>
                </div>
                <div class='nav-content-next'>
                    <h3 class="nav-title">
                        <?php next_post_link('%link', "Next Team Member <span class='chevron'>&#8250;&nbsp</span>"); ?>
                    </h3>
                    <h4 class="member-title">
                        <?php next_post_link('%link', $next_title); ?>
                    </h4>
                    <h3 class="member-job">
                        <?php next_post_link('%link', $next_job); ?>
                    </h3>
                </div>
            </div>
        </div>
    </section>
    </div>

    <?php get_footer(); ?>