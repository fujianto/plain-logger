<?php

class Log_to_Db implements Logger
{
	
	function __construct() {
		add_action('admin_footer', array($this, 'print_log'));
		add_action('admin_footer',  array($this, 'clear_log'));
	}

	public function print_log($label = null, $message = null) {
		echo $label." - db - ".$message;
	}

	public function get_log(){
		return "Getting log from DB";
	}

	public function clear_log() {
		echo "Clear Log db";
	}
}