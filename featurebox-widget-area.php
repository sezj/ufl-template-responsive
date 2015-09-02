<?php 
$featureSidebarContent = ufandshands_sidebar_detector('featurebox_footer',false); 
$opt_featurebox_widgets_visibility = of_get_option("opt_featurebox_widgets_visibility");
?>
<?php if ( $opt_featurebox_widgets_visibility ) : ?>
<div id="featurebox-footer">
	<div class="container">
		<?php if($featureSidebarContent) : ?>
							
					<?php echo $featureSidebarContent; ?>
	        <?php endif ?>
	</div><!-- .container -->
</div><!-- #featurebox-footer -->
<?php endif ?>