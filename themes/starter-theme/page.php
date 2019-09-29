<?php get_header();  ?>
<div class='container' style="background-position: 8% -5%; background-repeat: no-repeat; background-image: url(<?php the_post_thumbnail_url($size = 'large'); ?>)">
<div class="wrapper">

  <div class="content">
    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div class='title-wrap'>
                    <h1 class='title'><?php the_title(); ?></h1>
                </div>
      <?php the_content(); ?>
      

    <?php endwhile; // end the loop?>
  </div> <!-- /,content -->


</div>
</div>

<?php get_footer(); ?>