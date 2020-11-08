<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset=<?php echo bloginfo('charser') ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo bloginfo('title') ?> </title>

    <?php wp_head(); ?>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

</head>

<body <?php body_class() ?>>
    <!-- HEADER START -->
    <header>
        <div class="header">

            <!-- MENU START -->
            <div class="header__content">
                <div class="header__content-container">
                    <!-- HAMBERGER MENU ICON -->

                    <!-- LOGO -->
                    <div class="header__logo">
                        <!-- <a href="#" class="header__humbergermenu"><img class="humbergermenu" src="img/menu.png" alt=""></a> -->
                        <button class="menu-toggle"></button>
                        <a href="<?php echo get_option("siteurl"); ?>" class="logo"><img class="logo__img" src="<?php bloginfo('template_directory') ?>/img/logo.svg" alt="" srcset=""></a>
                        <a href="<?php echo get_option("siteurl"); ?>" class="header__title">Wide Range Metals</a>
                    </div>
                    <div class="header__right-side">
                        <a href="#"><img class="search_icon-mobile" src="<?php bloginfo('template_directory') ?>/img/search_icon.svg" alt="" srcset=""></a>
                        <div class="header__top-right">

                            <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart'); ?>" class="shopping"><img class="cart_icon" src="<?php bloginfo('template_directory') ?>/img/cart_icon.svg" alt=""><span class="shopping_txt">
                                    Shopping cart</span><span class="cart_count"><?php echo sprintf(WC()->cart->get_cart_contents_count()); ?></span></a>


                        </div>

                        <div class="header__top-search">
                            <div class="search__inner">
                                <!-- <input type="text" class="search__input" placeholder="Search for goods">
                                <a href="#" class="search__close"><span class="close__x">X</span></a>
                                <a class="search__btn" href="#">
                                    <img class="search__btn-icon" src="img/search_icon.svg" alt="" srcset="">
                                </a> -->
                                <?php get_product_search_form();?>
                                <a href="#" class="search__close"><span class="close__x">X</span></a>
                               
                            </div>

                        </div>

                        <!--     <ul class="header__content-ul">
                            <li class="header__content-item"><a class="menu__link" href="#"><img class="search_icon" src="img/search_icon.svg" alt="" srcset=""></a></li>
                            <li class="header__content-item"><a class="menu__link" href="category.html">Metal
                                    powders</a></li>
                            <li class="header__content-item"><a class="menu__link" href="#">Hard from metals</a>
                            </li>
                            <li class="header__content-item"><a class="menu__link" href="#">Precious Metals</a></li>
                            <li class="header__content-item"><a class="menu__link" href="about.html">About us</a>
                            </li>
                            <li class="header__content-item"><a class="menu__link" href="#">Contacts</a></li>
                        </ul>

                        <div class="header__side_menu">
                            <ul class="header__side_ul">
                                <li><a href="category.html">Metalpowders</a></li>
                                <li><a href="#">Hard from metals</a></li>
                                <li><a href="#">Precious Metals</a></li>
                                <li><a href="about.html">About us</a> </li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div> -->
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'container' => false,
                            'menu_class' => 'header__content-ul'

                        ));
                        ?>

                    </div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'side-custom-menu',
                        'container_class' => 'header__side_menu',
                        'menu_class' => 'header__side_ul'

                    ));
                    ?>
                </div>

            </div>
            <!-- MENU END -->
        </div>
    </header>