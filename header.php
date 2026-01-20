<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Cutsnstyle
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="header">  
        <div class="header-inner">
                <div class="logo">
                <?php skt_cutsnstyle_lite_the_custom_logo(); ?>
                        <a href="<?php echo esc_url( home_url('/') ); ?>">
                                <h1><?php bloginfo('name'); ?></h1>
                                <span class="tagline"><?php bloginfo( 'description' ); ?></span>                          
                        </a>                      
                 </div><!-- logo --> 
                 <div class="headerright">
                 <?php if ( ! dynamic_sidebar( 'sidebar-header' ) ) : ?>
                 <div class="ph-email-colmn">
                   <?php if( get_theme_mod('contact_no', '(0712) 456 9190') ) { ?>
                    <span class="phoneno"><?php echo esc_html(get_theme_mod('contact_no', '(0712) 456 9190')); ?></span>
                  <?php } ?>
                  
                  <?php if( get_theme_mod('contact_mail', 'contact@company.com') ) { ?>
                    <a href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail','contact@company.com')); ?>"><span class="emailicon"><?php echo sanitize_email(get_theme_mod('contact_mail', 'contact@company.com')); ?></span></a>
                  <?php } ?>                 
                 </div>
                  <div class="appoint-colmn">                  
                    <?php if ( get_theme_mod('appointbutton_link', '#') ) { ?> 
                    <a title="Book an Appointment" class="bookbutton" href="<?php echo esc_url(get_theme_mod('appointbutton_link','#')); ?>"><?php echo esc_html('Book an Appointment');?></a>
                    <?php } ?>                               
                 </div> 
                 <?php endif; // end sidebar widget area ?>	                
                 <div class="clear"></div>
             </div><!-- .headerright -->
                 <div class="clear"></div> 
                <div class="toggle">
                <a class="toggleMenu" href="#"><?php _e('Menu','skt-cutsnstyle-lite'); ?></a>
                </div><!-- toggle -->
                <div class="nav">                  
                    <?php wp_nav_menu( array('theme_location' => 'primary')); ?>
                </div><!-- nav -->

                
    </div><!-- header-inner -->
</div><!-- header -->

<?php if ( is_front_page() && ! is_home() ) { ?>
  <div style="display:none"></div> 
<?php } else { ?>
 <div class="space30"></div> 
<?php } ?>
  
<?php if ( is_front_page() && ! is_home() ) { ?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
	<?php if( get_theme_mod('page-setting'.$sld)) { ?>
     <?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
		<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
        $img_arr[] = $image;
        $id_arr[] = $post->ID;
        endwhile;
  	  }
    }
?>
<?php if(!empty($id_arr)){ ?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php 
	$i=1;
	foreach($img_arr as $url){ ?>
      <img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" />
      <?php $i++; }  ?>
    </div>
		<?php 
        $i=1;
        foreach($id_arr as $id){ 
        $title = get_the_title( $id ); 
        $post = get_post($id); 
        $content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 100)); 
        ?>
    <div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo $title; ?></h2>
        <p><?php echo $content; ?></p>
        <div class="clear"></div>
        <div class="slide_more"><a href="<?php the_permalink(); ?>">
          <?php esc_attr_e('Read More', 'skt-cutsnstyle-lite');?>
          </a></div>
      </div>
    </div>
    <?php $i++; } ?>
  </div>
  <div class="clear"></div>
</section>
<?php } else { ?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider1.jpg" alt="" title="#slidecaption1" /> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider2.jpg" alt="" title="#slidecaption2" /> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider3.jpg" alt="" title="#slidecaption3" /> </div>
    <div id="slidecaption1" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('Create Your Hair Style with Us', 'skt-cutsnstyle-lite');?>
        </h2>
      </div>
    </div>
    <div id="slidecaption2" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('Living and Lifestyle Title', 'skt-cutsnstyle-lite'); ?>
        </h2>
      </div>
    </div>
    <div id="slidecaption3" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('Create Your Hair Style with Us', 'skt-cutsnstyle-lite');?>
        </h2>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</section>
<!-- Slider Section -->
<?php } } ?>