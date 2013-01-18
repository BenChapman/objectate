<?php

namespace Anontate;

class Poem extends Base {

	protected $_prefix = 'poems/';
	
	public $name;
	public $poet;
	public $type;
	public $lines = array();
	public $annotations;
		
	public function __construct($name = false) {
		if($name) {
			$this->_filename = $name;
			parent::__construct();
			$this->annotations = new Annotations($name);
		} else {
			$this->annotations = new Annotations;
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
		$this->annotations->save();
		parent::save();
	}
	
	public function __toString() {
		return $this->name . " by " . $this->poet;
	}
	
}

?>