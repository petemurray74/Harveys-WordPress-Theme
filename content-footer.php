<?php
/*
431 - Mens logos
527 - Womens
547 - Shoes
563 - Lingerie
580 - Luggage
603 - Beauty
616 - Cookshop
631 - Linen
639 - Montgomery

SELECT the footer based on the custom field value
*/

if ($logopage=get_post_meta($post->ID, 'logopage', true)) {
?>
<div class="content-footer-logos row">
	<aside>
<?php
echo do_shortcode('[content_block id='.$logopage.']');
?>
	</aside>
</div>	
<?php } ?>

<div class="content-footer row">
		<aside>
			<div class="one-half column">
				<?php echo do_shortcode('[content_block id=1073]'); ?>
			</div>
			<div class="one-half column">
				<?php echo do_shortcode('[content_block id=1070]'); ?>
			</div>
		</aside>
</div>



