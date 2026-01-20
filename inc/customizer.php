<?php
/**
 * SKT Cutsnstyle Theme Customizer
 *
 * @package SKT Cutsnstyle
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_cutsnstyle_lite_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class skt_cutsnstyle_lite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#f00a77',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-cutsnstyle-lite'),			
			 'description' => __( 'More color options in PRO Version.', 'skt-cutsnstyle-lite' ),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'skt-cutsnstyle-lite'),
            'priority' => null,
            'description' => __( 'Featured Image Size Should be ( 1400x568 ) More slider settings available in PRO Version.', 'skt-cutsnstyle-lite' )			
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'sanitize_callback'	=> 'skt_cutsnstyle_lite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','skt-cutsnstyle-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'sanitize_callback'	=> 'skt_cutsnstyle_lite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','skt-cutsnstyle-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'sanitize_callback'	=> 'skt_cutsnstyle_lite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','skt-cutsnstyle-lite'),
			'section'	=> 'slider_section'
	));	// Slider Section
	
	
	// Home First Section 	
	$wp_customize->add_section('section_first',array(
		'title'	=> __('Homepage First Section','skt-cutsnstyle-lite'),
		'description'	=> __('Select Page from the dropdown for first section','skt-cutsnstyle-lite'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',	array(
			'sanitize_callback' => 'skt_cutsnstyle_lite_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-setting1',array('type' => 'dropdown-pages',
			'section' => 'section_first',
	));
	
	
// Home Second Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Three Boxes Section','skt-cutsnstyle-lite'),
		'description'	=> __('Select Pages from the dropdown for homepage three boxes section','skt-cutsnstyle-lite'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('threecols_title',array(
			'default'	=> __('Our Services','skt-cutsnstyle-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('threecols_title',array(
			'label'	=> __('Add Title for Section 2','skt-cutsnstyle-lite'),
			'section'	=> 'section_second',
			'setting'	=> 'threecols_title'
	));	
	
	$wp_customize->add_setting('page-column1',	array(
			'sanitize_callback' => 'skt_cutsnstyle_lite_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'sanitize_callback' => 'skt_cutsnstyle_lite_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'sanitize_callback' => 'skt_cutsnstyle_lite_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));	
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','skt-cutsnstyle-lite'),				
			'description' => __( 'More social icon available in PRO Version.', 'skt-cutsnstyle-lite' ),			
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','skt-cutsnstyle-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','skt-cutsnstyle-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','skt-cutsnstyle-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','skt-cutsnstyle-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	
	
	$wp_customize->add_section('bookbutton_sec',array(
			'title'	=> __('Header Book An Appointment Link','skt-cutsnstyle-lite'),
			'priority'		=> null
	));
	$wp_customize->add_setting('appointbutton_link',array(
			'default'	=> '#',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('appointbutton_link',array(
			'label'	=> __('Add link for book an appointment button','skt-cutsnstyle-lite'),
			'section'	=> 'bookbutton_sec',
			'setting'	=> 'appointbutton_link'
	));	
	
	
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','skt-cutsnstyle-lite'),
			'priority'	=> null,			
			'description' => __( 'Need footer widgetized upgrade to PRO Version.', 'skt-cutsnstyle-lite' ),
	));
	$wp_customize->add_setting('skt_cutsnstyle_lite_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_cutsnstyle_lite_Info( $wp_customize, 'cred_section', array(
        'section' => 'footer_area',
        'settings' => 'skt_cutsnstyle_lite_options[credit-info]'
        ) )
    );
	
	
	$wp_customize->add_setting('about_title',array(
			'default'	=> __('About Cut n Style','skt-cutsnstyle-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add title for about girlie','skt-cutsnstyle-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));
	
	$wp_customize->add_setting('about_description',array(
			'default'	=> __('Consectetur, adipisci velit, sed quiaony on numquam eius modi tempora incidunt, ut laboret dolore agnam aliquam quaeratine voluptatem. ut enim ad minima veniamting suscipit suscipit lab velit, sed quiaony on numquam eius.','skt-cutsnstyle-lite'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'about_description', array(	
			'label'	=> __('Add description for our philosophy','skt-cutsnstyle-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_description'
	)) );
	
	$wp_customize->add_setting('recentpost_title',array(
			'default'	=> __('Recent Posts','skt-cutsnstyle-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('recentpost_title',array(
			'label'	=> __('Add title for recent posts','skt-cutsnstyle-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'recentpost_title'
	));
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> __('Contact Info','skt-cutsnstyle-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> __('Add Footer Contact Info','skt-cutsnstyle-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));		
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('100 King St, Melbourne PIC 4000, Australia','skt-cutsnstyle-lite'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
				'label'	=> __('Add contact address here','skt-cutsnstyle-lite'),
				'section'	=> 'footer_area',
				'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('+123 456 7890','skt-cutsnstyle-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','skt-cutsnstyle-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','skt-cutsnstyle-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_mail'
	));
}
add_action( 'customize_register', 'skt_cutsnstyle_lite_customize_register' );

//Integer
function skt_cutsnstyle_lite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function skt_cutsnstyle_lite_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,				
					.copyright-txt span,					
					a.more-button span,
					.cols-4 span,					
					.listpages:hover h4,
					.header .header-inner .nav ul li a:hover, 
					.header .header-inner .nav ul li.current_page_item a
					{ color:<?php echo esc_attr(get_theme_mod('color_scheme','#f00a77')); ?>;}
					 
					.social-icons a:hover, 
					.pagination ul li .current, 
					.pagination ul li a:hover, 
					#commentform input#submit:hover,								
					h3.widget-title,				
					.wpcf7 input[type="submit"],
					.listpages:hover .morelink,
					.MoreLink:hover
					{ background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#f00a77')); ?> !important;}
					
					.header .header-inner .nav,				
					.listpages:hover .morelink,
					.MoreLink,
					.section_title,
					.listpages,
					.listpages h2
					{ border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#f00a77')); ?>;}
					
			</style>  
<?php 
} 
add_action('wp_head','skt_cutsnstyle_lite_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_cutsnstyle_lite_customize_preview_js() {
	wp_enqueue_script( 'skt_cutsnstyle_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_cutsnstyle_lite_customize_preview_js' );


function skt_cutsnstyle_lite_custom_customize_enqueue() {
	wp_enqueue_script( 'skt-cutsnstyle-lite-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'skt_cutsnstyle_lite_custom_customize_enqueue' );