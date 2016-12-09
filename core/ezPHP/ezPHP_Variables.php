<?php

class ezPHP_Variables extends ezPHP {

	public function assign($k, $v) {

		$this->$k	= $v;
		return $this;
	}

	public function var($k) {
		return $this->$k;
	}
}

?>