		<footer class="footer">

			<?php if ($sector != 'contact'): ?>
			<div class="bg-light-grey hidden-xs">
				<div class='container'>
					<div class='row'>
						<div class='col-xs-12'>
							<h3 class="mt-lg">Useful Information</h3>
							<hr class="mt-lg">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<ul class="social social--footer">
								<li><a href="mailto:enquiries@tattonim.com" title="Email"><i class="fa fa-envelope"></i>enquiries@tattonim.com</a></li>
							</ul>
						</div>
						<div class="col-sm-6 footer__address">
							<p>Cambridge Investments Limited<br>
Threadneedle House<br>
19-21 George IV Street<br>
Cambridge<br>
CB2 1HH
							<p><a class="more more--google" href="https://www.google.co.uk/maps/place/London+EC2N+1AR/@51.5145907,-0.0884503,17z/data=!3m1!4b1!4m2!3m1!1s0x48761cacd516d8b9:0xb2316b0662107b7b" target="_blank">View on map</a></p>
						</div>
					</div>
					<div class='row mb-lg'>
						<div class='col-xs-12'>
							<hr>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<div class="bg-grey pd-md hidden-xs">
				<div class='container'>
					<div class='row'>
	<php get_sidebar('sidebar-legal-tatton');>
					</div>
				</div>
			</div>

			<div class="bg-grey-dark pd-md">
				<div class='container'>
					<div class='row'>
						<div class='col-xs-12'>
							<?php do_action('display_navigation', 'footer_menu', 'footer__navigation'); ?>
						</div>
					</div>
				</div>
			</div>

		</footer>

		<?php wp_footer(); ?>
        <script type="text/javascript" src="http://www.tattoninvestments.com/tim-assets/themes/tim/assets/js/tatton.min.js?ver=4.7.5"></script>
	</body>
</html>
