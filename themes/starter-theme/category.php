<?php get_header(); ?>

<div class="wrapper">

  <div class="content">
    <h1 class="titles cat-title">Category Archives: <?php single_cat_title(); ?></h1>
    <div><?php
    
      $category_description = category_description();
      if ( ! empty( $category_description ) )
        echo '' . $category_description . '';
        get_template_part( 'loop', 'category' );
      ?></div>
  </div> <!-- /.content -->
</div>

<?php get_footer(); ?>