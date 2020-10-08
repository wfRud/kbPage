<?php get_header('subpage'); ?>

<section class="page-gallery">
    <div class="container">
        <div class="gallery" id="gallery">
            <?php get_template_part('includes/section', 'gallery')?>
        </div>
    </div>

    <!-- ===Light Box -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox_inner">
            <div class="row lightbox_content">
                <div class="lightbox_text lyrics ">
                    <h3 class="lightbox_title title--small"></h3>
                    <div class="lightbox_description text"></div>
                </div>
                <div class="lightbox_image_cnt ">
                    <img src="" alt="pic" class="lightbox_image">
                </div>
            </div>
            <div class="lightbox_control">
                <div class="prev"><i class="fas fa-angle-left"></i></div>
                <div class="next"><i class="fas fa-angle-right"></i></div>
                <div class="closeBtn"></div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>