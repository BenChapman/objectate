<?php

class Anontate_Index {
	
	private $_type;
	public $index = array();
	
	public function __construct($type = "poems") {
		$this->_type = strtolower($type);
		if($this->_type == 'poems') {
			$index = glob(BASE_DIR . '/poems/*' . Anontate_Base::FILE_FORMAT);
			foreach($index as $card) {
				$replaced[0] = str_replace(BASE_DIR . '/poems/', '', $card);
				$replaced[1] = str_replace(Anontate_Base::FILE_FORMAT, "", $replaced[0]);
				$this->index[] = ucwords(str_replace("_", " ", $replaced[1]));
			}
			unset($index);
		} else {
			throw new Exception('Unknown type for Index');
		}
	}
	
}

?>