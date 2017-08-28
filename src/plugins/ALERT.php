<?php
class ALERT {
	
	public static function use($type = $_SESSION) {
		self::$_SESSION = $type;
	}

	public static function error($input) {	
		self::$_SESSION['Error'] = $input;
	}
	
	public static function success($input) {	
		self::$_SESSION['Success'] = $input;
	}

	public static function warning($input) {	
		self::$_SESSION['Warning'] = $input;
	}

	public static function notice($input) {	
		self::$_SESSION['Notice'] = $input;
	}

	public static function Validate() {
		if (isset(self::$_SESSION['Error']) && self::$_SESSION['Error'] != "")
			return false;
		else
			return true;
	}

	public static function check($alert) {
		if (isset(self::$_SESSION[$alert]))
			return true;
		else
			return false;
	}

	public static function get($alert) {
		if (isset(self::$_SESSION[$alert])) {
			$var = self::$_SESSION[$alert];
			unset(self::$_SESSION[$alert]);
			return $var;
		} else { return false; }
	}