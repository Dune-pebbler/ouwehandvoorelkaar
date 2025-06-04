<section class="hero-slider_two_cols">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (have_rows('hero_slider')): ?>
                    <div class="owl-carousel owl-theme">
                        <?php while (have_rows('hero_slider')):
                            the_row();
                            $image = get_sub_field('slider_img');
                            if ($image): ?>
                                <div class="slide-item">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                                        class="w-100">
                                </div>
                            <?php endif;
                        endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function ($) {
        $('.hero-slider_two_cols .owl-carousel').owlCarousel({
            items: 2,
            loop: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 800,
            nav: false,
            dots: false,
            margin: 15,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                }
            }
        });
    });
</script>