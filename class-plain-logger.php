<?php

if (!class_exists('Plain_Logger')) {

	class Plain_Logger {
		public static $instance;
		protected $logger;

		public function __construct(){
			if ($this->logger == null) {
				$this->logger = new Log_to_File;
			} 

		 	$this->register_callbacks();
		}

		protected function register_callbacks(){
			add_action( 'plain_logger', array( $this, 'log' ), 10, 2);
		}

		public function set_logger(Logger $logger = null){
			$this->logger = $logger;
		}

		public function log($label, $message) {
			$this->logger->print_log($label, $message);
		}

		public function clear() {
			$this->logger->clear_log();
		}

		public static function get_instance(){
			if (null === static::$instance) {
				static::$instance = new static();
			}
			return static::$instance;
		}
	}

	Plain_Logger::get_instance();
}