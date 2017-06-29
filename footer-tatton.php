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
						<div class="col-sm-6 footer__address">
							<p>Tatton Investment Management<br>
125 Old Broad Street<br>
London<br>
EC2N 1AR</p>
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
						<div class='col-xs-12 footer__legals'>
							<p>Tatton Investment Management Limited is authorised and regulated by the Financial Conduct Authority. Financial Services Register number 733471. Tatton Investment Management Limited is registered in England and Wales No. 08219008. Registered address: Paradigm House, Brooke Court, Wilmslow, Cheshire, SK9 3ND. The value of investments and the income from them can fluctuate and it is possible that investors may not get back the amount they invested. Past performance is not a guide to future performance. The information contained within the website does not constitute investment advice or a recommendation for any product and you should not make any investment decisions on the basis of it. The information contained within the website is subject to the UK regulatory regime and is therefore primarily targeted at customers in the UK.</p>
						</div>
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
