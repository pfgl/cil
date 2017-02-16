<?php
    /* Template Name: Group */
?>

<?php get_header(); ?>

    <div id="content" class="wrapper">

        <div id="inner-content" class="container">

            <div id="main" role="main">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                    <header class="article-header cf">

                        <h1 class="entry-title page-title" itemprop="headline">
                            <?php the_title(); ?>
                        </h1>

                    </header> <?php // end article header ?>

                    <div class="entry-content cf" itemprop="articleBody">

                        <div class="ifa-content">
                            <?php the_content(); ?>
                        </div>

				        <div class="new-ifa-map">
                            <a id="rutherford-wilkinson" onclick="selectThis('rutherford-wilkinson')" href="javascript:void(0);" class="bullet preview">
                                Rutherford Wilkinson
                                <img src="/wp-content/themes/pfgl/library/images/rw.jpg" width="100" height="52" class="map-logo" id="map-logo-rutherford">
                            </a>

			                 <a id="harrogate-independent"  onclick="selectThis('harrogate-independent')" href="javascript:void(0);" class="bullet preview">
                                Harrogate Independent Financial Services
                            </a>
			<a id="multiplex"  onclick="selectThis('multiplex')" href="javascript:void(0);" class="bullet preview">Multiplex</a>
			<a id="perspective-group" onclick="selectThis('perspective-group')" href="javascript:void(0);" class="bullet preview">Perspective Group</a>
			<a id="warnes-anderton" onclick="selectThis('warnes-anderton')"  href="javascript:void(0);" class="bullet preview">Warnes Anderton</a>
			<a id="cambridge-investments" onclick="selectThis('cambridge-investments')"  href="javascript:void(0);" class="bullet preview">Cambridge Investments Limited</a>
			<a id="applewood1" onclick="selectThis('applewood1')"  href="javascript:void(0);" class="bullet preview">Applewood Wealth Management Ltd</a>
			<a id="applewood2" onclick="selectThis('applewood2')"  href="javascript:void(0);" class="bullet preview">Applewood Wealth Management Ltd</a>
			<a id="wingham-wyatt" onclick="selectThis('wingham-wyatt')" href="javascript:void(0);" class="bullet preview">Wingham Wyatt Financial Services Ltd</a>
			<a id="perspective-financial" onclick="selectThis('perspective-financial')"  href="javascript:void(0);" class="bullet preview">Perspective Financial Management Ltd </a>
			<a id="chessman-partners" onclick="selectThis('chessman-partners')"  href="javascript:void(0);" class="bullet preview">Chessman &amp; Partners Ltd</a>
			<a id="pims" onclick="selectThis('pims')"  href="javascript:void(0);" class="bullet preview">Professional Investment Management Services (Maidstone) Ltd</a>
			<a id="platinum-portfolios" onclick="selectThis('platinum-portfolios')"  href="javascript:void(0);" class="bullet preview">Platinum Portfolios</a>
			<a id="equilibrium" onclick="selectThis('equilibrium')" href="javascript:void(0);" class="bullet preview">Equilibrium Wealth Management Limited</a>
			<a id="leedham" onclick="selectThis('leedham')" href="javascript:void(0);" class="bullet preview">Leedham Independent Financial Advisers Limited</a>
			<a id="austyn-james" onclick="selectThis('austyn-james')" href="javascript:void(0);" class="bullet preview">Austyn James Consulting Limited</a>
			<a id="mcgrath-rathbone" onclick="selectThis('mcgrath-rathbone')" href="javascript:void(0);" class="bullet preview">McGrath Rathbone Limited</a>
			<a id="shirebrook" onclick="selectThis('shirebrook')" href="javascript:void(0);" class="bullet preview">Shirebrook Wealth Management Limited</a>
			<a id="ad-valorem" onclick="selectThis('ad-valorem')" href="javascript:void(0);" class="bullet preview">Ad Valorem Wealth Management Solutions Limited</a>
			<a id="keypi" onclick="selectThis('keypi')" href="javascript:void(0);" class="bullet preview">Key Pensions &amp; Investments Limited</a>
			<!--<a id="financial-connection" href="<?php //bloginfo ('template_url'); ?>/images/ifa-logos/financial-connection.jpg" class="bullet preview">Financial Connection Wealth Management Limited</a>-->
		</div><!--ifa-map-->
								</div>

                                <footer class="article-footer">

                                </footer> <?php // end article footer ?>

							</article>

							<?php endwhile; else : ?>

                                <?php get_template_part ('partials/no-post-found');?>

							<?php endif; ?>

						</div>

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
