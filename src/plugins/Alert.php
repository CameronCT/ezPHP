<?php
class Alert {

	public static function error($input) {	
		$_SESSION['Error'] = $input;
	}
	
	public static function success($input) {	
		$_SESSION['Success'] = $input;
	}

	public static function warning($input) {	
		$_SESSION['Warning'] = $input;
	}

	public static function notice($input) {	
		$_SESSION['Notice'] = $input;
	}

	public static function Validate() {
		if (isset($_SESSION['Error']) && $_SESSION['Error'] != "")
			return false;
		else
			return true;
	}

	public static function check($alert) {
		if (isset($_SESSION[$alert]))
			return true;
		else
			return false;
	}

	public static function get($alert) {
		if (isset($_SESSION[$alert])) {
			$var = $_SESSION[$alert];
			unset($_SESSION[$alert]);
			return $var;
		} else { return false; }
	}
}