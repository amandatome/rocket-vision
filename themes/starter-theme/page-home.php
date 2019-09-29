<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class='container' style="background-position: 100% 5%; background-repeat: no-repeat; background-image: url(<?php the_post_thumbnail_url($size = 'large'); ?>)">
            <div class='wrapper'>
                <section class='home-hero'>
                    <!-- Hero Title -->
                    <h1 class="wrap"><?php the_title(); ?></h1>
                    <!-- Hero Content -->
                    <?php if (get_field('hero_content')) : ?>
                        <?php the_field('hero_content'); ?>
                    <?php endif ?>
                    <!-- Hero Button-->
                    <?php $hero_link = get_field('hero_cta'); ?>
                    <?php if ($hero_link) : ?>
                        <button id='home'><a href="<?php echo $hero_link['url'] ?>" target="<?php echo $hero_link['target'] ?>"><?php echo $hero_link['title'] ?></a></button>
                    <?php endif ?>
                </section>

                <section class='home-about'>
                    <div class='alignright'> <?php $image = get_field('about_image');
                                                        if ($image) {
                                                            echo wp_get_attachment_image($image, 'medium-square');
                                                        } ?></div>
                    <!-- About Title -->
                    <?php if (get_field('about_title')) : ?>
                        <h2 class='about-title'><?php the_field('about_title'); ?></h2>
                    <?php endif; ?>
                    <!-- About Content -->
                    <?php if (get_field('about_content')) : ?>
                        <?php the_field('about_content'); ?>
                    <?php endif ?>
                    <!-- Call to Action Button -->
                    <?php $about_link = get_field('about_cta'); ?>
                    <?php if ($about_link) : ?>
                        <button><a href="<?php echo $about_link['url'] ?>" target="<?php echo $about_link['target'] ?>"><?php echo $about_link['title'] ?></a></button>
                    <?php endif ?>
                </section>
                <!-- Featured Employee -->
                <section class='featured-employee'>
                    <?php
                        $posts = get_field('featured_employee');
                        if ($posts) : ?>
                        <ul>
                            <?php foreach ($posts as $post) : ?>
                                <?php setup_postdata($post); ?>
                                <li>
                                    <div class="alignleft">
                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium-square'); ?>
                                    </div>
                                    <h3 class='headline'>Featured Employee</h3>
                                    <h2 class='featured-name'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <span><?php the_content(); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    <?php endwhile; ?> <?php endif; ?>
<?php get_footer(); ?>