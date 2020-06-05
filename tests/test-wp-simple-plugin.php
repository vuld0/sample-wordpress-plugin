<?php
/**
 * PluginTest
 *
 */


class DemoPluginTest extends WP_UnitTestCase {

    //need to setup the environment and instantiate the classes of plugin
    public function setUp() {
            parent::setUp();  
            //we will prepare the environment for testing 
            $this->class_instance = new TestPlugin();
            $this->header_footer_test = new GET_Header_Footer();
        }


//testing a printed shortcode of the plugin
    public function test_print_sample()
    {
    	$info = $this->class_instance->wp_simple_plugin();
    	$this->assertEquals($info,"Yo this is an example plugin");
    }

//testing the header given by the user in the plugin
     public function test_header()
    {
        $head_script = $this->header_footer_test->get_name_header('Header Scripts');
        $expected = 'Header Scripts';
        $this->assertEquals($expected,$head_script);
    }

//testing the footer given by the user in the plugin
    public function test_footer()
    {
        $footer_script = $this->header_footer_test->get_name_header('Footer Scripts');
        $expected = 'Footer Scripts';
        $this->assertEquals($expected,$footer_script);
    }

}