<?php
/**
*  Logging logic on this class
*/
class Log_to_File implements Logger
{
	private $content;
	private $log 	= 'log.txt';
	private $file;

	function __construct() {
		$this->log = PLAIN_LOGGER_DIR . $this->log;
		add_action('wp_ajax_plainLogger-log-clear', array($this, 'clear_log'));
		add_filter('plainLogger-log', array($this, 'get_log'));
	}

	private function get($permission = "a+") {
		chmod($this->log, 0777);		
		$this->file = fopen($this->log, $permission);
	}

	/**
	 * Set Log Content
	 */
	private function content($content = ''){
		$this->get();
		$content	= fread($this->file, (filesize($this->log) == 0) ? 1 : filesize($this->log) );
		$this->close();
		$this->content = $content;

		return $this->content;
	}

	public function get_log() {
		return self::content();
	}

	public function print_log($label = null, $content = null) {
		$this->get("a");
		$this->set($label, $content);
		$this->close();
	}

	private function set($label, $content) {
		if (is_array($content) || is_object($content)) {
	
			ob_start();

			echo (is_object($content) ? json_encode(unserialize(serialize($content))) : $content);
			$content	= ob_get_contents();
			
			ob_end_clean();
		}
		
		$content	= date("Y/m/d H:s",time() + (7 * HOUR_IN_SECONDS))." ".$label." === ".$content;
		fwrite($this->file, $content."\n");
	}

	private function close() {
		fclose($this->file);
		chmod($this->log, 0600);
	}

	public function clear_log() {
		echo "Clear Log file";
		$this->get('r+');
		ftruncate($this->file, 0);
		$this->close();
		exit();
	}
}
