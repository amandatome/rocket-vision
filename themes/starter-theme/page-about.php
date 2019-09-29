<?php /* Template Name: About */ ?>
<?php get_header(); ?>
<div class='container' style="background-position: 8% 0%; background-repeat: no-repeat; background-image: url(<?php the_post_thumbnail_url($size = 'large'); ?>)">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='wrapper'>
                <div class='titles title-wrap'>
                    <h1><?php the_title(); ?></h1>
                </div>
                <section class='beginnings'>
                    <!--OUR BEGINNINGS SECTION-->
                    <!--About Image-->
                    <div class='alignright image-padding'> <?php $image = get_field('about_image');
                        if ($image) {
                            echo wp_get_attachment_image($image, 'medium-square');
                        } ?>
                    </div>

                    <!-- About Title -->
                    <?php if (get_field('about_title')) : ?>
                        <h2><?php the_field('about_title'); ?></h2>
                    <?php endif; ?>

                    <!-- About Content -->
                    <?php if (get_field('about_content')) : ?>
                        <?php the_field('about_content'); ?>
                    <?php endif ?>
                </section>
                <!--Mission Area -->
                <section class='mission'>
                    <?php if (get_field('mission_title')) : ?>
                        <h2 class='mission-title'><?php the_field('mission_title'); ?></h2>
                    <?php endif ?>
                    <div class='mission-content'><?php if (get_field('mission_content')) : ?>
                            <?php the_field('mission_content'); ?>
                        <?php endif ?></div>
                </section>

                <!--TEAM MEMBERS AREA -->
                <section class='team-members'>
                    <?php if (get_field('team_title')) : ?>
                        <h2><?php the_field('team_title'); ?></h2>
                    <?php endif ?>
                    <?php
                            // leadership team query
                            $leadership_query = new WP_Query(
                                array(
                                    'post_type' => 'team_members',
                                    'posts_per_page' => -1,
                                    'order' => 'ASC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'team', // what taxonomy are we querying by?
                                            'field' => 'slug', // what field is the query? (other options are the term_id or name)
                                            'terms'    => 'leadership', // what specific term are we querying by?
                                        )
                                    )
                                )
                            );
                            // The Loop for leadership
                            if ($leadership_query->have_posts()) { ?>
                        <h3>Leadership</h3>
                        <?php while ($leadership_query->have_posts()) {
                                        $leadership_query->the_post(); ?>
                            <?php $job_title = get_field('job_title'); ?>
                            <div class="team-member-section">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'square', false, array('class' => 'employee-image')); ?>
                                    <h3 class='employee-name'><?php the_title(); ?></h3>
                                    <h3><?php echo $job_title; ?></h3>
                                </a>
                            </div>
                        <?php }
                                    /* Restore original Post Data */
                                    wp_reset_postdata();
                                } else { ?>
                        <!-- no posts found -->
                        <p>There are no leaders</p>
                    <?php }

                            // design team query
                            $design_query = new WP_Query(
                                array(
                                    'post_type' => 'team_members',
                                    'posts_per_page' => -1,
                                    'order' => 'ASC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'team', // what taxonomy are we querying by?
                                            'field' => 'slug', // what field is the query? (other options are the term_id or name)
                                            'terms'    => 'design', // what specific term slug are we querying by?
                                        )
                                    )
                                )
                            );
                            // The Loop for design team
                            if ($design_query->have_posts()) { ?>
                        <h3>Design Team</h3>
                        <?php while ($design_query->have_posts()) {
                                        $design_query->the_post(); ?>
                            <div class="team-member-section">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'square', false, array('class' => 'employee-image')); ?>
                                    <h3 class='employee-name'><?php the_title(); ?></h3>
                                </a>
                            </div>
                        <?php }
                                    /* Restore original Post Data */
                                    wp_reset_postdata();
                                } else { ?>
                        <!-- no posts found -->
                        <p>There are no designers</p>
                    <?php }

                            // developers team query
                            $developers_query = new WP_Query(
                                array(
                                    'post_type' => 'team_members',
                                    'posts_per_page' => -1,
                                    'order' => 'ASC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'team', // what taxonomy are we querying by?
                                            'field' => 'slug', // what field is the query? (other options are the term_id or name)
                                            'terms'    => 'developer', // what specific term slug are we querying by?
                                        )
                                    )
                                )
                            );
                            // The Loop for developers team
                            if ($developers_query->have_posts()) { ?>
                        <h3 class='team-title'>Development Team</h3>
                        <?php while ($developers_query->have_posts()) {
                                        $developers_query->the_post(); ?>
                            <div class="team-member-section">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'square', false, array('class' => 'employee-image')); ?>
                                    <h3 class='employee-name'><?php the_title(); ?></h3>
                                </a>
                            </div>
                        <?php }
                                    /* Restore original Post Data */
                                    wp_reset_postdata();
                                } else { ?>
                        <!-- no posts found -->
                        <p>There are no developers</p>
                    <?php }
                         ?>
                </section>
                <section class='contact-link'>
                    <?php if (get_field('see')) : ?>
                        <h2><?php the_field('see'); ?></h2>
                    <?php endif ?>
                    <?php $see_link = get_field('see_link'); ?>
                    <?php if ($see_link) : ?>
                        <button><a href="<?php echo $see_link['url'] ?>" target="<?php echo $see_link['target'] ?>"><?php echo $see_link['title'] ?></a></button>
                    <?php endif ?>
                </section>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>