<?php

namespace Anontate;

abstract class Base {
	
	const FILE_FORMAT = ".dat";
	
	protected $_prefix = "";
	protected $_filename;
	
	public function __construct() {
		if(!empty($this->_filename)) {
			$object = $this->_open_file();
			foreach($object as $key => $value) {
				$this->$key = $value;
			}
		}
	}
	
	private function _open_file() {
		return unserialize(file_get_contents($this->_getFilename()));
	}
	
	public function save() {
		return file_put_contents($this->_getFilename(), serialize($this));
	}
	
	private function _getFilename() {
		$filename = str_replace(" ", "_", filter_var(
			strtolower($this->_filename),
			FILTER_SANITIZE_STRING,
			array( 'flags' => FILTER_FLAG_STRIP_HIGH )
		));
				
		if(!empty($filename)) {
			return BASE_DIR . "/" . $this->_prefix . $filename . $this::FILE_FORMAT;
		} else {
			throw new Exception("No filename set");
		}
	}
	
}

?>