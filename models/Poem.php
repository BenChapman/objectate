<?php

class Anontate_Poem extends Anontate_Base {

	protected $_prefix = 'poems/';
	
	public $name;
	public $poet;
	public $type;
	public $lines = array();
		
	public function __construct($name = false) {
		if($name) {
			$this->_filename = $name;
			parent::__construct();
		}
	}
	
	public function import_lines($filename) {
		$lines = file($filename);
		foreach($lines as $line) {
			$trimmed_lines[]['text'] = trim($line);
		}
		unset($lines);
		$this->lines = $trimmed_lines;
	}
	
	public function save() {
		$this->_filename = $this->name;
		parent::save();
	}
	
	public function __toString() {
		return $this->name . " by " . $this->poet;
	}
	
}

?>