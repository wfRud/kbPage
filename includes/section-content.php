<?php 
    $wpQuery = new WP_Query(array(
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'ASC'
        )
    )

?>
<?php if($wpQuery->have_posts()): ?>

<?php while ( $wpQuery->have_posts() ) : ?>

<?php $wpQuery->the_post();?>

<?php 
    $cat = get_the_category();
    $postcat = $cat[0]->name;
?>

<?php if($postcat !== 'graphic'): ?>

<?php get_template_part('includes/section', 'post');?>

<?php else : ?>

<?php get_template_part('includes/section', 'reversePost');?>

<?php endif; ?>

<?php endwhile; ?>


<?php else : ?>

<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif;?>