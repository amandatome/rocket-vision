<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<div class='container' id="contact" style="background-position: 10% 0%; background-repeat: no-repeat; background-image: url(<?php the_post_thumbnail_url($size = 'large'); ?>)">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="wrapper">
                <div class='titles title-wrap'>
                    <h1><?php the_title(); ?></h1>
                </div>
                <section class="contact"><?php the_content(); ?>
                </section>
            </div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>