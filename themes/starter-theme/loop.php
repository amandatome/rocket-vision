<?php get_header(); ?>
<!--Get Feature image for page-->
<?php
if (is_home()) {
	$image = wp_get_attachment_image_url(get_post_thumbnail_id(get_option('page_for_posts')), 'full');
} else {
	$image = wp_get_attachment_image_url(get_post_thumbnail_id('page_for_posts'), 'full');
}
?>

<div class="container" style="background-position: 8% 0%; background-repeat: no-repeat; background-image: url(<?php echo $image ?>)">
	<div class='wrapper'>
		<h1 class='post-title'><?php single_post_title(); ?></h1>
		<div class='content'>
			<!--Dropdown-->
			<div class="dropdown">
				<ul>
					<li id="categories">
						<form id="category-select" class="category-select" action="<?php echo esc_url(home_url('/')); ?>" method="get">
							<?php
							$args = array(
								'show_option_none' => __('Category'),
								'orderby'          => 'name',
								'echo'             => 0,
								'exclude'					 => 1
							);
							?>
							<?php $select  = wp_dropdown_categories($args); ?>
							<?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
							<?php $select  = preg_replace('#<select([^>]*)>#', $replace, $select); ?>
							<div class="select-blog">
							<?php echo $select; ?>
							</div>
							<noscript>
								<input type="submit" value="View" />
							</noscript>
						</form>
					</li>
				</ul>
			</div>
			<?php // If there are no posts to display, such as an empty archive page 
			?>
			<!--Display Posts Error-->
			<?php if (!have_posts()) : ?>
				<article id="post-0" class="post error404 not-found">
					<h1 class="entry-title">Not Found</h1>
					<section class="entry-content">
						<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
						<?php get_search_form(); ?>
					</section><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; // end if there are no posts 
			?>
			<?php // if there are posts, Start the Loop. 
			?>
			<!--Display Posts-->
			<?php while (have_posts()) : the_post(); ?>
				<article class='post-display' id="post-<?php the_ID(); ?>"> <?php post_class(); ?>
					<div class='blog-image'>
						<?php the_post_thumbnail("rectangle"); ?>
						<a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark"></a>
					</div>
					<div class="entry-content">
						<h3><?php the_title(); ?></h3>
						<h4 class='author'><?php the_author(); ?> - <?php the_time('d/m/Y'); ?></h4>
						<?php the_excerpt(); ?>
					</div>
				</article>
			<?php endwhile;?>
		</div>
		<!-- Page Navigation -->
		<div class='page-nav'>
			<?php number_pagination(); ?>
		</div>
	</div>
</div>