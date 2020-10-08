<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamila Bednarska</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js"
        integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous">
    </script>
    <?php wp_head();?>
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <!-- Custom Logo -->
                    <?php if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                        }?>


                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1"
                        aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'kb-page' ); ?>">
                        <span class="navbar-toggler-icon">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </span>
                    </button>

                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'top-menu',
                            'depth'             => 0,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav ml-auto',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ));
                    ?>
                </div>
            </nav>
    </header>