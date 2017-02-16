<?php
/*
 Template Name: Homepage
 *
*/
?>

<?php get_header(); ?>

    <div id="content" class="wrapper">

        <div id="inner-content" class="container">

            <div class="main"  role="main">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                        <?php if ( function_exists( 'soliloquy' ) ) { soliloquy( 'homepage', 'slug' ); } ?>

                        <div class="entry-content" itemprop="articleBody">
                            <?php
                                // the content (pretty self explanatory huh)
                                the_content();
                            ?>
                        </div>

                        <?php if( get_field('feature-box') ): ?>
                            <section class="feature-box" style="color:<?php the_field('text-colour');?>; background-color:<?php the_field('background-colour');?>">
                                <h1 class="feature-box-title section-title"><?php the_field('feature-box-title'); ?></h1>

                                    <div class="entry-content feature-box-content">
                                        <?php the_field ('feature-box-content');?>
                                    </div>
                            </section>
                        <?php endif; ?>

                    </article>

                <?php endwhile; else : ?>

                    <?php get_template_part ('partials/no-post-found');?>

                <?php endif; ?>

            </div>

        <?php get_sidebar(); ?>

        </div>

    </div>

<?php get_footer(); ?>
