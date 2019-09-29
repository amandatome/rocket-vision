<?php /* Template Name: Services */ ?>
<?php get_header(); ?>
<div class='container' style="background-position: 8% 0%; background-repeat: no-repeat; background-image: url(<?php the_post_thumbnail_url($size = 'large'); ?>)">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='wrapper'>
                <h1 class='titles services-title'><?php the_title(); ?></h1>
                <!--Services Information-->

                <section class='services'>
                        <!-- Mobile Responsiveness -->
                        <div class="select-div">
                        <select id="services-select">
                            <?php
                                    $i = 1;
                                    while (have_rows('services')) : the_row();
                                        echo '<option class="services-title select-service"' . '" value="services-' . $i . '" >'    . get_sub_field("services_title") . '</option>';
                                        $i++;
                                    endwhile;
                                    ?>
                        </select>
                                </div>
                        <!-- Full Width -->
                        <!-- <div class="vertical-menu"> -->
                        <?php
                                if (have_rows('services')) :
                                    echo '<div class="align-services">';
                                    $i = 1;
                                    while (have_rows('services')) : the_row();
                                        echo '<button class="services-title tablink" id="services-title-' . $i . '" rel="services-' . $i . '" >'    . get_sub_field("services_title") . '</button>';
                                        $i++;
                                           
                                    endwhile;
                                    echo '</div>';
                                    $i = 1;
                                    while (have_rows('services')) : the_row();
                                        echo '<div class="tabcontent text-box" id="services-' . $i . '">' . get_sub_field("services_descriptions") . ' </div>';
                                        $i++;
                                    endwhile;
                                else :
                                // no rows found
                                endif;
                                ?>
                              
                </section>
</div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>