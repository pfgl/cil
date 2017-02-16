<?php get_header(); ?>

    <div id="content" class="wrapper">

        <div id="inner-content" class="container">

            <main id="main"  role="main">

                <article id="post-not-found" class="hentry cf">

                    <header class="article-header">

                        <h1><?php _e( '404 - Page Not Found', 'bonestheme' ); ?></h1>

                    </header>

                    <div class="entry-content">

                        <p><?php _e( 'The page you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>

                    </div>

                    <section class="search">

                        <p><?php get_search_form(); ?></p>

                    </section>

                    <footer class="article-footer">

                        <p><?php _e( 'This is the 404.php template.', 'bonestheme' ); ?></p>

                    </footer>

                </article>

            </main>

        </div>

    </div>

<?php get_footer(); ?>
