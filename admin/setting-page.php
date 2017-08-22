<?php
add_action( 'admin_menu', 'plain_logger_add_admin_menu' );
add_action( 'admin_init', 'plain_logger_settings_init' );

add_action('admin_enqueue_scripts',  'plainLogger_admin_enqueue');

function plainLogger_admin_enqueue($hook) {
	// if($hook != 'toplevel_page_plain_logger') {
	// 	return;
	// }

	wp_enqueue_script( 'plainLoggerArea_js', PLAIN_LOGGER_DIR_URI . 'admin/assets/field_plainLoggerArea.js', array('jquery'), null, true );
	wp_enqueue_style( 'plainLoggerArea_css', PLAIN_LOGGER_DIR_URI . 'admin/assets/field_plainLoggerArea.css' );
}

function plain_logger_add_admin_menu(  ) { 

	add_submenu_page( 'tools.php', 'Plain Logger', 'Plain Logger', 'manage_options', 'plain_logger', 'plain_logger_options_page' );

}


function plain_logger_settings_init(  ) { 

	register_setting( 'pluginPage', 'plain_logger_settings' );

	add_settings_section(
		'plain_logger_pluginPage_section', 
		__( '', 'plainLogger' ), 
		'plain_logger_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'plain_logger_area', 
		__( 'Log area', 'plainLogger' ), 
		'plain_logger_area_render', 
		'pluginPage', 
		'plain_logger_pluginPage_section' 
	);


}


function plain_logger_area_render(  ) { 
	$content = apply_filters('plainLogger-log','');
	?>
	<div id="field_plainLoggerArea" class='field_plainLoggerArea'>
		<div class='content'>
			<?php echo nl2br($content); ?>
		</div>
		
		<br />
		<p>
			<button type="button" data-target="field_plainLoggerArea" class="logReader-clean button button-primary"><?php _e('Clear log data' , 'plainLogger'); ?></button>
			
			<button type="button" id="refs" data-target="field_plainLoggerArea" class="logReader-refresh button button-secondary"><?php _e('Refresh' , 'plainLogger'); ?></button>
		</p>
	</div>
	<?php

}


function plain_logger_settings_section_callback(  ) { 

	echo __( 'Easily log any event on your WordPress site to text file. <br /> To log event, use <code>do_action( "plain_logger", "Log label", "Logging some event");</code> on some WordPress hook or any place you want to log.', 'plainLogger' );

}


function plain_logger_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Plain Logger</h2>

		<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
		?>

	</form>
	<?php

}

?>