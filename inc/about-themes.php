<?php
/**
 * SKT Cutsnstyle
 *
 * @package SKT Cutsnstyle
 */
 
//about theme info
add_action( 'admin_menu', 'sktcutsnstylelite_abouttheme' );
function sktcutsnstylelite_abouttheme() {    	
	add_theme_page( __('About Theme', 'skt-cutsnstyle-lite'), __('About Theme', 'skt-cutsnstyle-lite'), 'edit_theme_options', 'sktcutsnstylelite_guide', 'sktcutsnstylelite_mostrar_guide');   
} 

//guidline for about theme
function sktcutsnstylelite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_html_e('About Theme Info', 'skt-cutsnstyle-lite'); ?>
		   </div>
          <p><?php esc_html_e('CutsNStyle is a simple, flexible and adaptable responsive hair salon, spa, massage, parlor, and local business theme which looks good on all devices. Can be used for photography, personal and portfolio purposes as well because its compatible with NextGen Gallery. It is also compatible with WooCommerce so you can open shop or have E-commerce products.','skt-cutsnstyle-lite'); ?></p>
		  <a href="<?php echo esc_url(SKT_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo esc_url(SKT_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-cutsnstyle-lite'); ?></a> | 
				<a href="<?php echo esc_url(SKT_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-cutsnstyle-lite'); ?></a> | 
				<a href="<?php echo esc_url(SKT_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-cutsnstyle-lite'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_THEME_URL); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>