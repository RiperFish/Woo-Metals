<?php /* Template Name: About us Page */ ?>

<?php get_header(); ?>

<main class="footer-fix">
    <section class="about_us">
        <div class="container">
            <?php do_action('woocommerce_before_main_content'); ?>
            <div class="about__content">

                <h1 class="about__title">About us</h1>
                <div class="about__content">
                    <p>For a customer who values quality, we offer a wide selection of goods. We are always ready to
                        deliver products to the customer in the shortest time and on the most acceptable terms.</p>
                    <h5>Company goals:</h5>
                    <ul class="about__goals">
                        <li class="goal">ENSURE that only the best quality goods reach consumers.</li>
                        <li class="goal">ENSURE that customer claims and complaints are promptly accepted and
                            responded.</li>
                        <li class="goal">CREATE a business that is valuable to both our customers and suppliers and
                            society as a whole.</li>
                    </ul>
                </div>
                <p></p>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>