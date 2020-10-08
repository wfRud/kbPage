<?php 
    /*
    *Template Name: Right Side Template
    *Template Post Type: post
    */ 
?>
<?php get_header();?>

<?php 
    $cat = get_the_category();
    $postcat = $cat[0]->name;
?>

<section id="<?php echo $postcat?>" class="<?php echo $postcat?>">
    <div class="container">
        <div class="row">

            <?php if(has_post_thumbnail() ): ?>
            <div class="image col-xl-7 col-md-7 col-sm-7">
                <img src="<?php the_post_thumbnail_url('img-large'); ?>" alt="<?php the_title(); ?>" class="picture">

                <?php   
                    if( class_exists('Dynamic_Featured_Image') ):
                        global $dynamic_featured_image;
                        global $post;
                         $featured_images = $dynamic_featured_image->get_featured_images( $post->ID );
                    
                         if ( $featured_images ):
                
                        foreach( $featured_images as $images ): 
                 ?>

                <img src="<?php echo $images['full'] ?>" alt="<?php the_title(); ?>" class="picture">

                <?php endforeach; ?>

                <?php endif; endif; ?>

            </div>
            <?php endif; ?>

            <div class="lyrics col-xl-5 col-md-5 col-sm-5">
                <h2 class="title"><?php the_title();?></h2>
                <p class="text"><?php the_content();?></p>
                <?php if( $postcat === 'graphic' || $postcat === 'drawing'):?>
                <a href="<?php the_permalink(); ?>" class="btn-cta">Galeria</a>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>