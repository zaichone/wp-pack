<?php 
function theme_uc_displayDefaultComingSoonPage()
{
    theme_uc_displayComingSoonPage(trim(get_bloginfo('title')).' is coming soon', home_url(),'', 'is coming soon');
}
function theme_uc_displayComingSoonPage($title, $headerText,$headerImage, $bodyText)
{
    
    ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
      
        <title><?php echo $title ?></title>
        <?php wp_enqueue_script("jquery"); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link href="<?php echo get_bloginfo( 'template_directory' ).'/inc/under-construction/'; ?>under-construction.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
   	<div class="bodyContent">
            <div class="headerText">
             <?php 
			
			 if(!empty($headerImage)){ ?>
        	 	<img src="<?php echo $headerImage; ?>"   alt=" <?php echo  $headerText; ?>">
             <?php }else{ ?>
             	<?php echo  $headerText; ?>
             <?php } ?>
             </div>
           
            <div class="bodyText">
                <?php echo do_shortcode(html_entity_decode(stripslashes($bodyText))); ?>
            </div>
        </div>
        <div class="footerText"><p>&copy; Copyright <?php echo date('Y'); ?> <?php echo get_bloginfo('title') ?> | Web Design By <a id="pwdlogo" href="http://www.perth-web-design.com.au">Perth Web Design</a></p></div>
    
    <script type="application/javascript">
		// Start allowance of jQuery to $ shortcut
		jQuery(document).ready(function($){
		
			// Convert label to placeholder
				$.each($('.gform_wrapper input, .gform_wrapper textarea'), function () {
				var gfapId = this.id;
				var gfapLabel = $('label[for=' + gfapId + ']');
				$(gfapLabel).hide();
				var gfapLabelValue = $(gfapLabel).text();
				$(this).attr('placeholder',gfapLabelValue);
			});
		
			// Use modernizr to add placeholders for IE
			if(!Modernizr.input.placeholder){$("input,textarea").each(function(){if($(this).val()=="" && $(this).attr("placeholder")!=""){$(this).val($(this).attr("placeholder"));$(this).focus(function(){if($(this).val()==$(this).attr("placeholder")) $(this).val("");});$(this).blur(function(){if($(this).val()=="") $(this).val($(this).attr("placeholder"));});}});}
		
		// Ends allowance of jQuery to $ shortcut
		});
		</script>
    </body>
    </html>
<?php 
}
/* EOF */
?>
