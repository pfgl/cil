<?php
/*
 Template Name: Tatton Page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header('tatton'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section>
        <div class='container'>
            <div class='row'>
                <div class='col-xs-12 content mt-lg mb-lg'>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; else : ?>

<?php endif; ?>

<?php get_footer('tatton'); ?>
