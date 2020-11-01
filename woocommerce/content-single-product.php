<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */


if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<?php
/**
 * Hook: woocommerce_before_single_product_summary.
 *
 * @hooked woocommerce_show_product_sale_flash - 10
 * @hooked woocommerce_show_product_images - 20
 */

?>
<main>
    <section class="category__products">
        <div class="container">
            <?php do_action('woocommerce_before_main_content'); ?>
            <div class="product__content" id="product-<?php the_ID(); ?>">
                <div class="content__left">
                    <h1 class="left__name"><?php woocommerce_template_single_title() ?></h1>
                    <div class="description">
                        <?php woocommerce_template_single_excerpt() ?>
                    </div>
                </div>
                <div class="content__right">

                    <div class="add_cart_wrapper">
                        <div class="alert">
                            <p class="item__ship-txt">Worldwide FREE shipping</p>
                            <img class="item__ship-icon" src="<?php bloginfo('template_directory') ?>/img/free-shipping-item.svg" alt="" srcset="">
                        </div>
                        <div class="add_cart">
                            <div class="price_holder">
                                <span class="cart__price"><?php woocommerce_template_single_price() ?></span>
                            </div>

                            <div class="cart_quantity">
                                <label for="qte" class="qte_lbl">Quantity</label>
                                <?php woocommerce_template_single_add_to_cart() ?>
                            </div>
                        </div>
                    </div>


                    <?php do_action('woocommerce_before_single_product_summary');

                    ?>

                </div>

            </div>
        </div>
    </section>
</main>