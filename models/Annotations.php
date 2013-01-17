<?php

class Anontate_Annotations extends Anontate_Base {
	
	protected $_prefix = "annotations/";
	
	public $poem_name;
	public $annotations = array();
	
	public function __construct($poem_name = false) {
		if($poem_name) {
			$this->_filename = $poem_name;
			parent::__construct();
		}
	}
	
	public function get_random_annotation($line) {
		if(!empty($this->annotations[$line])) {
			return $this->annotations[$line][array_rand($this->annotations[$line])];
		} else {
			return false;
		}
	}
	
	public function add_annotation($line, $text) {
		$this->annotations[$line][] = $text;
	}
	
	public function save() {
		$this->_filename = $this->poem_name;
		parent::save();
	}
	
}

?>