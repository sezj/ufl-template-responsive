<?php 
	$secondaryWidgetContent = ufandshands_sidebar_detector('home_left',false);
	$secondaryWidgetContent .= ufandshands_sidebar_detector('home_middle',false);
	$secondaryWidgetContent .= ufandshands_sidebar_detector('home_right',false);

	if(!empty($secondaryWidgetContent)) {
		ufandshands_secondary_widget_area();
	}
?>
