<?php 
if ( get_post_gallery() ) {

$gallery        = get_post_gallery( get_the_ID(), false );
$galleryIDS     = $gallery['ids'];
$pieces         = explode(",", $galleryIDS);

foreach ($pieces as $key => $value ) { 
    $attachment_meta    = wp_get_attachment($value);
    $image_title        = $attachment_meta['title'];
    $image_description  = $attachment_meta['description'];
    $image_small        = wp_get_attachment_image_src( $value, 'img-small'); 
    $image_large        = wp_get_attachment_image_src( $value, 'img-large');  
?>


<div class="gallery-item">
    <img src="<?php echo $image_small[0] ?>" data-imageLarge="<?php echo $image_large[0] ?>"
        data-title="<?php echo $image_title ?>" data-description="<?php echo $image_description ?>" />
    <div class="overlay">
        <span class="line"></span>
        <span class="line"></span>
    </div>
</div>

<?php 
}
}
?>