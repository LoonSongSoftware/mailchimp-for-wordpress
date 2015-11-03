<?php

class RequestTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers MC4WP_Request::create_from_globals
	 */
	public function test_create_from_globals() {
		$_GET = array( 'foo' => 'bar' );
		$_POST = array( 'foo2' => 'bar2' );

		$request = MC4WP_Request::create_from_globals();
		$this->assertInstanceOf( 'MC4WP_Array_Bag', $request->params );
		$this->assertInstanceOf( 'MC4WP_Array_Bag', $request->server );
		$this->assertEquals( $request->params->get('foo'), $_GET['foo'] );
		$this->assertEquals( $request->params->get('foo2'), $_POST['foo2'] );
	}

	/**
	 * @covers MC4WP_Request::is_ajax
	 */
	public function test_is_ajax() {
		$request = new MC4WP_Request( array() );
		$this->assertFalse( $request->is_ajax());

		define( 'DOING_AJAX', true );
		$this->assertTrue( $request->is_ajax() );
	}


}