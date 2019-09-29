<?php get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class='wrapper'>
            <div class='content'>
                <div class='blog-info-wrap'>
                    <h3 class='breadcrumbs'><?php get_breadcrumb(); ?></h3>
                    <div class="post-image">
                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium-square', false, array('class' => 'featured-image')); ?>
                    </div>
                    <h3 class='cat-single'><?php the_category(', '); ?></h3>
                    <h2 class='entry-title'><?php the_title() ?></h2>
                    <h3 class="author-single">By <?php the_author(); ?></h3>
                    <?php wp_link_pages(array(
                            'before' => '<div class="page-link"> Pages: ',
                            'after' => '</div>'
                        )); ?>
                </div>
                <section class='member-content'>
                    <?php the_content(); ?>
                </section>
                <section class="navigation">
                    <div class="alignleft"><?php previous_post_link('%link', '<span class="chevron"> &#8249;</span> %title'); ?></div>

                    <div class="alignright"><?php next_post_link('%link', '%title <span class="chevron"> &#8250;</span>'); ?></div>
                </section>
            </div><!-- #nav-below -->
        </div>
    </div>
<?php endwhile; // end of the loop. 
?>

</div> <!-- /.content -->

</div>

<?php get_footer(); ?>