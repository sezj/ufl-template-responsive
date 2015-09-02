<?php 
$sidebarContent = ufandshands_sidebar_detector('site_footer',false); 
$opt_footer_widgets_visibility = of_get_option("opt_footer_widgets_visibility"); 
?>
<footer role="contentinfo">
	<?php if ( ( $opt_footer_widgets_visibility === 'all_pages' ) || ( $opt_footer_widgets_visibility === 'homepage_only' && is_front_page() ) || ( $opt_footer_widgets_visibility === 'subpages_only' && !is_front_page() ) ) : ?>
		<?php if($sidebarContent) : ?>
			<div class="container append-bottom">
			
				<div id="footer_top" class="footer_count_<?php ufandshands_sidebar_detector('site_footer',false,true) ?>">
							
					<?php echo $sidebarContent; ?>
	        <div class="clear"></div>
				</div>
			</div>
		<?php endif ?>
	<?php endif ?>
	
	<div id="institutional-footer">
	 	<div class="container">
			<div class="container">
				<?php //if (!of_get_option('opt_responsive')): ?>
					<div id="footer_container">
						<div class="footer_logo">
							<a href="http://www.ufl.edu/" class="uf-logo ir">University of Florida</a>
							<a href="/about/powering/"><img src="<?php bloginfo('template_url'); ?>/images/PNE-logo.png" alt="We are Powering the New Engineer" width="129" height="75" /></a>
							
							<a href="http://www.skorfanshop.com/shops/portal/?fanshopid=775&amp;CFID=47812416&amp;CFTOKEN=637b86ccae593e24-7C057270-0E17-A9F7-66075B26BFDC4E8D" title="Online Store"><img src="<?php bloginfo('template_url'); ?>/images/ufeng_onlinestore.png" alt="Get your Gator Engineering gear online!" class="online-store" /></a>
							<a href="https://www.uff.ufl.edu/OnlineGiving/FundDetail.asp?FundCode=000661" ><img src="<?php bloginfo('template_url'); ?>/images/uf_makeagift_down.png" alt="Make a Gift to the College of Engineering" class="gift" /></a>

						</div>
						<div id="footer-links" class="span-24 black-25">
							<ul>
								<li><a href="<?php echo home_url(); ?>">Home</a></li>
								<?php wp_list_pages('title_li=&depth=1'); ?>
								<li><a href="http://regulations.ufl.edu/">Regulations</a></li>
								<?php $intranet_url = of_get_option("opt_intranet_url"); if(!empty($intranet_url)) { echo "<li><strong><a href=\"".$intranet_url."\">Intranet</a></strong></li> ";} ?>
								<li><?php //Make a gift fund URL
									$makeagift_url = of_get_option("opt_makeagift_url");
									if (!empty($makeagift_url)) {
										echo "<a href='".$makeagift_url."'>";
									} else { 
										echo "<a href='https://www.uff.ufl.edu/OnlineGiving/FundDetail.asp?FundCode=000661'>";
									}
								?>Make a Gift</a></li>
							</ul>
							<ul>
								<li>This page uses <a href="http://www.google.com/analytics/">Google Analytics</a> <a href="http://www.google.com/intl/en_ALL/privacypolicy.html">(Google Privacy Policy)</a></li>
								<li><a href="http://assistive.usablenet.com/tt/<?php if (is_home()) { echo esc_url(home_url()); } else { echo esc_url(get_permalink( $post->ID )); } ?>" accesskey="t" title="Text-only version of this website">Text-only Version</a></li>
								<li><a href="http://www.ufl.edu/disability/">Disability Services</a></li>
								<li><a href="http://privacy.ufl.edu/privacystatement.html">Privacy Policy</a></li>
								<li><a href="/about-this-site/">About This Site</a></li>
								<?php $webmaster_email = of_get_option("opt_webmaster_email"); 
								if( !empty($webmaster_email) && ufl_check_email_address($webmaster_email) ) { 
									echo "<li><a id=\"contact-webmaster\" href=\"mailto:".$webmaster_email."\">Contact Webmaster</a></li> ";
								} elseif ( !empty($webmaster_email) ) {
									echo "<li><a id=\"contact-webmaster\" href=\"".$webmaster_email."\">Contact Webmaster</a></li> ";
								} ?>
								
							</ul>
							<ul>
								<li>University of Florida College of Engineering</li>
								<li>300 Weil Hall, P.O. Box 116550</li>
								<li>Gainesville, FL 32611-6550</li>
								<li>Phone 352-392-6000</li>
								<li>Fax 352-392-9673</li>
								<li><a href="mailto:info@eng.ufl.edu">info@eng.ufl.edu</a></li>
								
							</ul>
							<ul>
								<li>&copy; <?php echo date('Y'); ?> <a href="http://www.ufl.edu/">University of Florida</a></li>
								<?php
									if ( is_home() ) {
										?> <li>Site Updated <?php ufl_site_last_updated(); ?></li> <?php
									} else {
										?> <li>Page Updated <?php the_modified_time('F j, Y'); ?></li> <?php
									}
								?>
							</ul>
						</div><!-- end #footer-links -->
					</div><!-- end #footer_container -->
				<?php //endif ?>
			</div><!-- end .container -->
		</div><!-- end .container -->
	</div><!-- end institutional footer container -->
</footer>
	
<?php 
//Custom JS
$custom_js = of_get_option('opt_custom_js');
if(!empty($custom_js)) {
	echo '<script type="text/javascript">' . $custom_js . '</script>'."\n";
}
?>
<!--[if lt IE 7 ]>
<script src="<?php bloginfo('template_url'); ?>/library/js/dd_belatedpng.js"></script>
<script> DD_belatedPNG.fix('img, .png_bg'); </script>
<![endif]-->
<?php wp_footer(); ?>
<?php include 'library/php/responsive-selector.php' ?>
</body>
</html>
