<?php get_header(); ?>

<section id="slider">
    <div class="container">
        <?php
            echo do_shortcode('[smartslider3 slider="2"]');
        ?>
    </div>
</section>

<?php get_template_part('includes/section', 'content');?>

<?php get_footer() ?>