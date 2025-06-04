<?php
/*
 * Template Name: Page Builder
 */

get_header(); ?>

<?php if (have_rows('pagebuilder')): ?>
        <?php while (have_rows('pagebuilder')):
                the_row(); ?>

                <?php if (get_row_layout() === 'hero_banner'): ?>
                        <?php get_template_part('template-parts/blocks/hero_banner'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'hero_slider'): ?>
                        <?php get_template_part('template-parts/blocks/hero_slider'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'hero_slider_two_cols'): ?>
                        <?php get_template_part('template-parts/blocks/hero_slider_two_cols'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'text_with_image'): ?>
                        <?php get_template_part('template-parts/blocks/text_with_image'); ?>
                <?php endif; ?>

        <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>