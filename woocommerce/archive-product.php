<?php


get_header();

?>
<main>

    <?php
    if (is_shop()) {
    ?>
        <div class="hero">
            <div class="container">
                <div class="hero__content">
                    <!-- CAROUSEL START -->
                    <div class="carousel__container">
                        <!-- CAROUSEL DESKTOP -->
                        <div class="carrousel">
                            <div class="item current">
                                <img src="<?php bloginfo('template_directory') ?>/img/hero.png" class="hero_back" alt="" srcset="">
                                <div class="content">
                                    <h1 class="content__best">Metal powders For all your projects</h1>

                                    <div class="content__right">
                                        <div class="hero__badje red_badje">
                                            <img class="shipping_icon" src="img/free-shipping.svg" alt="" srcset="">
                                            <p class="badje__text">Free shipping</p>
                                        </div>
                                        <div class="hero__badje black_badje">
                                            <img class="premium_icon" src="img/premium-quality.svg" alt="" srcset="">
                                            <p class="badje__text">Great quality</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $args = array('post_type' => 'Slider');
                            $loop = new WP_Query($args);
                            while ($loop->have_posts()) : $loop->the_post();
                            ?>


                                <div class="item">
                                    <img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" class="hero_back" alt="" srcset="">
                                    <div class="content">
                                        <h1 class="content__best"><?php the_title(); ?></h1>


                                    </div>

                                </div>
                            <?php endwhile;
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
    } ?>


    <section class="products">
        <div class="container">

            <?php
            do_action('woocommerce_before_main_content');
            if (!is_shop()) {
                if (apply_filters('woocommerce_show_page_title', true)) {  ?>
                    <h1 class="section_title"><?php woocommerce_page_title(); ?></h1>


                <?php }
            } else { ?>
                <h1 class="section_title center_title"><?php echo 'All products'; ?></h1>


            <?php
            } ?>




            <?php

            if (woocommerce_product_loop()) {
                woocommerce_product_loop_start();
            ?>
                <div class="products__wrapper">
                    <?php
                    if (wc_get_loop_prop('total')) {
                        while (have_posts()) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action('woocommerce_shop_loop');

                            wc_get_template_part('content', 'product');
                        }
                    }
                    ?>
                </div>
            <?php
                woocommerce_product_loop_end();

                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action('woocommerce_no_products_found');
            }
            ?>
        </div>
    </section>
</main>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */

get_footer();
