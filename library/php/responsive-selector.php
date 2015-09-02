<script>
<?php $actual_link = "'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]'; \n"; ?>
currentLocation = <?php echo $actual_link; ?>
function ajaxGetMobile(){
$.ajax({
      type: 'GET',
      url: <?php echo "'" .  get_bloginfo('template_url') . "/library/php/SetCookieMobile.php', \n";?>
      timeout: 2000,
      success: function(data) {
      // location.reload();
      window.location.href = currentLocation.split('?')[0];
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("error retrieving content");
      }
    })      
}
function ajaxGetFull(){
 $.ajax({
        type: 'GET',
        url: <?php echo "'" .  get_bloginfo('template_url') . "/library/php/SetCookieFull.php', \n";?>
        timeout: 2000,
        success: function(data) {
	window.location.href = "?mobile=no";
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          alert("error retrieving content");
        }
      })
}
function SendCookies(){
    if (jQuery('#responsive-bool').is(':checked')){
        ajaxGetMobile();      
    }else{
        ajaxGetFull();
    }
}
  </script>
<script>
function hideModal(){jQuery('#mobile-modal').hide();}
function responsiveEmbed(){jQuery('iframe').wrap("<div class='responsive-embed'></div>")}
// jQuery('#mobile-modal-close').click(function(){hideModal();});
jQuery('#mobile-modal-close').click(function(){hideModal();});

<?php
$fullLink = ("<li><p id='full-link' alt='change from mobile theme'>View Full Site</p></li>"); 
$mobileLink = ("<li class='mobile-icon' id='mobile-link'>Switch to mobile</li>");
if (isset($_COOKIE["UFLmobileMobile"]) ||  isset($_COOKIE["UFLmobileFull"])){
  echo "hideModal(); \n";
}
if ($detect ->isMobile() && !isset($_COOKIE["UFLmobileFull"])){
  echo "jQuery('#sidebar-nav').appendTo('#main-content'); \n";
  echo "responsiveEmbed(); \n";
  echo 'jQuery("#primary-nav .container").append("' . $fullLink . '");' . "\n";
} 

if (isset($_COOKIE["UFLmobileFull"]) && of_get_option("opt_responsive")){
  echo 'jQuery("#institutional-nav .container").append("' . $mobileLink . '");' . "\n";
}
//hide popup if on desktop
if (!$detect ->isMobile()) { 
    echo "hideModal() \n";
}

?>
jQuery("#full-link").click(function(){ajaxGetFull();});
jQuery("#mobile-link").click(function(){ajaxGetMobile();});

</script>

