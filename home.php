<?php
/**
* Home Template
*
* Template for front page or home page.
*
* @package Nicholls 2010 Home Theme
* @subpackage Template
*/

// Slider is Active
global $j_flex_active;
$j_flex_active = true;

/** 
* Nicholls Theme Home init action
*
* Initialize the home.php template display differently for this view
*
*/
function nicholls_theme_home_init_action() {
	// Remove Standard header
	remove_action( 'fnbx_header', 'fnbx_default_title' );
	remove_action( 'fnbx_header', 'fnbx_default_description' );
	
	// Adjust layout 
	remove_action( 'fnbx_header_start', 'fnbx_layout_element_open' );
	remove_action( 'fnbx_header_end', 'fnbx_layout_element_close' );
	remove_action( 'fnbx_header', 'fnbx_default_title' );
	remove_action( 'fnbx_header', 'fnbx_default_description' );
	
	add_action( 'nicholls_theme_home_column_a', 'nicholls_theme_widgets_home_special' );
	
	// Image Slider - via plugin
	add_action( 'nicholls_header_start', 'j_flex_slider' );
	
	// Filter to clear out sidebar widgets to make full page
	add_action( 'fnbx_child_init', 'nicholls_template_core_full_page');	
	
	// Google Webmaster Tools verification
	add_action( 'fnbx_wp_head_before', 'nicholls_theme_home_google_verify' );
	
	// Remove standard widgets for home
	if ( is_front_page() ) {
	
	
		// Google Analytics Tracking for Nicholls - See Nicholls Tracking Plugin
		if ( function_exists( 'nicholls_google_analytics' ) ) add_action( 'fnbx_wp_head_after', 'nicholls_google_analytics' );
		
		remove_action( 'fnbx_container_end', 'fnbx_default_widget_sidebar' );
		// add_action( 'fnbx_wp_head_after', 'nicholls_google_analytics' );
	}
}
add_action( 'fnbx_child_init', 'nicholls_theme_home_init_action' );

// Remove Header CSS
function nicholls_theme_home_header_css_filter( $css_text = '' ) {
	return 0;
}
add_filter( 'fnbx_custom_header_css_background',  'nicholls_theme_home_header_css_filter' );

/** 
* Nicholls Theme Home init action
*
* Initialize the home.php template display differently for this view
*
*/
function nicholls_theme_home_google_verify() {
	echo '<meta name="google-site-verification" content="m8Cj8r6-iwttNBQu4C-KGyXG13dMjahXqtU-LG0NT6c" />';
}

/** 
* Nicholls Theme Home Home Widget Sidebar
*
* Display the Home Special sidebar widget on the home.php template.
*
*/
function nicholls_home_widget_sidebar() {
	fnbx_generate_widgets( 'Home Special' );
}

?>

<?php get_header() ?>

		<!-- START: template_home -->
		<?php do_action( 'fnbx_template_home_start', 'template_home' ) ?> 
		
		<?php do_action( 'fnbx_template_home_end', 'template_home' ) ?>
		<!-- END: template_home -->
		
<?php 
// Display Cache Reset Message
echo $page_message; 
?>

<?php get_sidebar() ?>

	<?php do_action( 'nicholls_template_home_start', 'nicholls_template_home' ) ?><!-- START: funroe_template_home -->
	
	<div id="nicholls-home-list-container" class="nicholls-home-list-container-">
		<ul id="nicholls-home-list" class="nicholls-home-list-">
			<li id="nicholls-home-list-apply" class="nicholls-home-list-item nicholls-home-list-apply-"><a class="nicholls-home-list-item-link nicholls-home-apply-link-" href="http://www.nicholls.edu/apply/">Apply Now</a></li>
			<li id="nicholls-home-list-calendar" class="nicholls-home-list-item nicholls-home-list-calendar-"><a class="nicholls-home-list-item-link nicholls-home-calendar-link-" href="http://www.nicholls.edu/calendar/">Calendar</a></li>
			<li id="nicholls-home-list-majors" class="nicholls-home-list-item nicholls-home-list-majors-"><a class="nicholls-home-list-item-link nicholls-home-majors-link-" href="http://www.nicholls.edu/programs/">Majors &amp; Academics</a></li>
			<li id="nicholls-home-list-tour" class="nicholls-home-list-item nicholls-home-list-tour-"><a class="nicholls-home-list-item-link nicholls-home-tour-link-" href="http://www.nicholls.edu/tours/">Schedule A Tour</a></li>
			<li id="nicholls-home-list-finaid" class="nicholls-home-list-item nicholls-home-list-finaid-"><a class="nicholls-home-list-item-link nicholls-home-finaid-link-" href="http://www.nicholls.edu/financial-aid/">Financial Aid</a></li>
			<li id="nicholls-home-list-explore" class="nicholls-home-list-item nicholls-home-list-explore-"><a class="nicholls-home-list-item-link nicholls-home-explore-link-" href="http://www.nicholls.edu/welcome/">Explore Nicholls</a></li>
			<li id="nicholls-home-list-social" class="nicholls-home-list-item nicholls-home-list-social-"><a class="nicholls-home-list-item-link nicholls-home-social-link-" href="http://www.nicholls.edu/about/resources/social-media/">Social Media</a></li>
		</ul>
	</div>

		<?php fnbx_layout_element_open( 'home-column-a' ) ?>

			<?php do_action( 'nicholls_theme_home_column_a') ?>
			
		<?php fnbx_layout_element_close( 'home-column-a' ) ?>
		
		<?php fnbx_layout_element_open( 'home-column-b' ) ?>

			<?php do_action( 'nicholls_theme_home_column_b') ?>
			
		<?php fnbx_layout_element_close( 'home-column-b' ) ?>		

	<?php do_action( 'nicholls_template_home_end', 'nicholls_template_home' ) ?><!-- END: funroe_template_home -->
		
<?php get_footer() ?>
