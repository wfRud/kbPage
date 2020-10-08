<footer id="contact">
    <div class="container">
        <div class="row">
            <div class="text col-xl-6 col-md-6 col-sm-6 col-xs-12">
                <div class="contact">
                    <h3>Kontakt</h3>
                    <p><?php echo esc_attr(get_option('kbPage_footer_city')); ?></p>
                    <p>ul. <?php echo esc_attr(get_option('kbPage_footer_street')); ?></p>
                    <p>tel: <?php echo esc_attr(get_option('kbPage_footer_phoneNr')); ?></p>
                </div>
            </div>
            <div class="icons col-xl-6 col-md-6 col-sm-6 col-xs-12">
                <div class="social">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f icon"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram icon"></i></a>
                    <span class="form-toggle"><i class="far fa-envelope icon"></i></span>
                </div>

            </div>
        </div>
        <div class="form-wrap">
            <?php echo do_shortcode('[wpforms id="42"]') ; ?>
        </div>
    </div>
</footer>
<?php wp_footer();?>
</body>

</html>