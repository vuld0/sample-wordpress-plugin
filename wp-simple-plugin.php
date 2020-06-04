<?php

/**
 * Plugin Name: WordPress Simple Plugin
 * Plugin URI: http://localhost/blog/
 * Description: Just a sample plugin
 * Version: 1.0.0 
 * Author: Chirag Bablani
 * Author URI: http://www.codetab.org/about/
 * License: GPLv2
 */
class TestPlugin
{
		public function wp_simple_plugin()
		{	
			$info = "Yo this is an example plugin";
			return $info;
		}
	
}
$printing = new TestPlugin();
add_shortcode('example',array('TestPlugin','wp_simple_plugin'));

	function wp_admin_menu_option()
	{
		add_menu_page('Header & Footer Scripts','Site Scripts','manage_options','admin-menu','scripts_page','',200);
	}

	add_action('admin_menu','wp_admin_menu_option');

	function scripts_page()
	{

		if(array_key_exists('submit_scripts_update', $_POST))
		{
			update_option('test_header_scripts',$_POST['header_scripts']);
			update_option('test_footer_scripts',$_POST['footer_scripts']);

			?>

			<div id="setting-error-settings-updated" class="updated settings-error notice is-dismissible">
				<strong>Settings have been saved</strong></div>

			<?php

		}

		$header_scripts = get_option('test_header_scripts','none');
		$footer_scripts = get_option('test_footer_scripts','none');

		?>
		<div class="wrap"> 
			<h2>Update Scripts</h2>

			<form method="post" action="">

			<label for = "header_scripts">Header Scripts</label>
			<textarea name="header_scripts"class="large-text"><?php print $header_scripts; ?></textarea>

			<label for = "footer_scripts">Footer Scripts</label>
			<textarea name="footer_scripts" class="large-text"><?php print $footer_scripts; ?></textarea>
			<input type="submit" name="submit_scripts_update" class="button button-primary" value="UPDATE SCRIPTS">
			</form>
		</div>

	<?php
	}
class GET_Header_Footer
{
	function display_header_scripts()
	{
		$header_scripts = get_option('test_header_scripts','none');

		print $header_scripts;
		return $header_scripts;

	}
	
	function display_footer_scripts()
	{
		$footer_scripts = get_option('test_footer_scripts','none');

		print $footer_scripts;
		return $footer_scripts;

	}
	
}
add_action('wp_head',array('GET_Header_Footer','display_header_scripts'));
add_action('wp_footer',array('GET_Header_Footer','display_footer_scripts'));