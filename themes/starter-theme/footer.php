</main>
<footer>

<div class='social-icons'><span class='social-text'><?php the_field('social_text', 'option'); ?></span>
        <?php wp_nav_menu(array(
            'theme_location' => 'social',
            'container_class' => 'menu'
        )); ?>
    </div>

    <h2 class='footer-text'><?php the_field('footer_logo', 'option'); ?></h2>
</footer>

<?php wp_footer(); ?>

</body>

</html>