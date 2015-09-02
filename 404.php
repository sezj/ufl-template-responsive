<?php include("header.php"); ?>

	<?php ufandshands_breadcrumbs(); ?>
	
	<div id="content-wrap">
	  <div id="content-shadow">
		<div id="content" class="container">
		
		  <article name ="content" id="main-content" class="span-24" role="main">
		    <div class="box">
  		  <h1>File or Page Not Found</h1>
  		  <p>Sorry, the page you are looking for doesn't appear to exist (or may have moved). </p>
  		  <p>You can search in the search field above, or browse the links below:</p>
  		  <ul>
  		    <li><a href="<?php echo home_url(); ?>">Home</a></li>
  		    <?php wp_list_pages('title_li=&depth=1'); ?>
  		  </ul>

  		  <p>Want to let us know about this error? <a href="mailto:webmaster@eng.ufl.edu">Contact the webmaster</a></p>
        </div>
		  </article><!-- end #main-content -->
		  
	  </div>
	</div>
	</div>
<?php include('user-role-menu.php'); ?>
<?php include("footer.php"); ?>