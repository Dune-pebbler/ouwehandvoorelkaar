<?php
$text_block = get_sub_field('text_block');
$image_block = get_sub_field('image_block');
$reverse_layout = get_sub_field('reverse_layout');

// Query projects custom post type
$projects_query = new WP_Query(array(
    'post_type' => 'project',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => '_thumbnail_id',
            'compare' => 'EXISTS'
        )
    )
));
?>

<section class="text_with_image">
    <div class="container-fluid">
        <div class="row<?= $reverse_layout ? ' reverse' : '' ?>">
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <div class="text_with_image__text-container slide-left-on-scroll">
                    <?= $text_block; ?>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 p-0">
                <div class="text_with_image__image-container slide-right-on-scroll">
                    <?php if ($projects_query->have_posts()): ?>
                        <div class="owl-carousel projects-carousel">
                            <?php while ($projects_query->have_posts()):
                                $projects_query->the_post(); ?>
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="carousel-item">
                                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                                            alt="<?= get_the_title(); ?>" title="<?= get_the_title(); ?>">

                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <!-- Fallback to original image if no projects found -->
                        <img src="<?= $image_block['url']; ?>" alt="">
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    jQuery(document).ready(function ($) {
        $('.projects-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
            responsive: {
                0: {
                    nav: false,
                    dots: true
                },
                768: {
                    nav: true,
                    dots: true
                }
            }
        });
    });
</script>