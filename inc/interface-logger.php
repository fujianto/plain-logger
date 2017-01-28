<?php
interface Logger {
	public function print_log($lable, $message);
	public function get_log();
	public function clear_log();
}
