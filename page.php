<?php get_header();

do_action('woocommerce_before_cart');


?>



<main>
    <section class="cart">
        <div class="container">
            
            <?php do_action('woocommerce_before_main_content'); ?>
            <h1 class="cart_title" >Cart</h1>
            <div class="cart__wrapper">


                <?php the_content(); ?>
            </div>
        </div>
    </section>
</main>










<?php get_footer(); ?>