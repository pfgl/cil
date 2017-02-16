<?php get_header(); ?>

    <div id="content" class="wrapper">

        <div id="inner-content" class="container">

            <div class="main" role="main">

                <h1 class="page-title">Platinum Portfolio News</h1>

                <div class="posts">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                        <header class="article-header">

                            <div class="date">
                                <span class="day"><?php the_time('d') ?> </span>
                                <span class="month"><?php the_time('M'); ?></span>
                            </div><!--date-->

                            <h1 class="entry-title single-title" itemprop="headline">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h1>

                            </header> <?php // end article header ?>

                            <div class="entry-content" itemprop="articleBody">
                                <?php
                                    // the excerpt (pretty self explanatory huh)
                                    the_excerpt();
                                ?>
                            </div> <?php // end article section ?>

                            <footer class="article-footer">

                            </footer> <?php // end article footer ?>

                        <?php comments_template(); ?>

                    </article> <?php // end article ?>

                    <?php endwhile; ?>

                        <?php bones_page_navi(); ?>

                    <?php else : ?>

                        <?php get_template_part ('partials/no-post-found');?>

                    <?php endif; ?>

                </div>

                <?php get_sidebar ('news');?>

            </div>

            <?php get_sidebar(); ?>

        </div>

    </div>

<?php get_footer(); ?>
