<?php
/**
 * Class SampleTest
 *
 */

/**
 * Sample test case.
 */
class DemoPluginTest extends WP_UnitTestCase {


    public function setUp() {
            parent::setUp();  

            $this->class_instance = new TestPlugin();
            $this->header_footer_test = new GET_Header_Footer();
        }


    public function test_print_sample()
    {
    	$info = $this->class_instance->wp_simple_plugin();
    	$this->assertEquals($info,"Yo this is an example plugin");
    }
     public function test_header()
    {
        $head_script = $this->header_footer_test->display_header_scripts();
        $this->assertEquals($head_script,"Header Scriptss");
    }
	function test_sample() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}
}