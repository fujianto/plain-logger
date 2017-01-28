<?php

if (!class_exists('Plain_Logger')) {

	class Plain_Logger {
		public static $instance;
		protected $logger;

		public function __construct(){
			if ($this->logger == null) {
				$this->logger = new Log_to_File;
			} 
		}

		public function set_logger(Logger $logger = null){
			$this->logger = $logger;
		}

		public function log($lable, $message) {
			$this->logger->print_log($lable, $message);
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