<?php

/**
 * Plugin Name: WordPress Simple Plugin
 * Plugin URI: http://localhost/blog/
 * Description: Just a sample plugin
 * Version: 1.0.0 
 * Author: Chirag Bablani
 * License: GPLv2
 */

//Created a class that prints a normal statement on the webpage when a shortcode is given in the post page in wordpress.


class TestPlugin
{
		public function wp_simple_plugin()
		{	
			$info = "Yo this is an example plugin";
			return $info;
		}
	
}

$printing = new TestPlugin();
//adding the shortcode and calling the above defined function

add_shortcode('example',array('TestPlugin','wp_simple_plugin'));


//Now let`s create a menu option in the wordpress dashboard

	function wp_admin_menu_option()
	{
		add_menu_page('Header & Footer Scripts','Site Scripts','manage_options','admin-menu','scripts_page','',200);
	}

	add_action('admin_menu','wp_admin_menu_option');

//Now we want this page to ask for the option to provide the name of the header and footers in the webpage.

	function scripts_page()
	{
		//stores the name of the submitted header and footer scripts

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

//Now let`s display the header and footer scripts on the webpage itself and return the values so that we can test it.

class GET_Header_Footer
{
	public function __construct()
	{
		//adding action
		add_action('wp_head',[$this,'display_header_scripts']);
		add_action('wp_footer',[$this,'display_footer_scripts']);
	}

	public function display_header_scripts()
	{
		$header_scripts = get_option('test_header_scripts','none');

		echo $this->get_name_header($header_scripts);
		
	}
	
	public function display_footer_scripts()
	{
		$footer_scripts = get_option('test_footer_scripts','none');

		echo $this->get_name_footer($footer_scripts);
		

	}
	public function get_name_header($head)
	{
		return $head;
	}
	public function get_name_footer($foot)
	{
		return $foot;
	}
	
}
//Instantiating the class
new GET_Header_Footer();


