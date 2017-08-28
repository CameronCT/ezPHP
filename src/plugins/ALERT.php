<?php
class ALERT {
	
	private static $_alertType = $_SESSION;

	public static function use($type = $_SESSION) {
		self::$_alertType = $type;
	}

	public static function error($input) {	
		self::$_alertType['Error'] = $input;
	}
	
	public static function success($input) {	
		self::$_alertType['Success'] = $input;
	}

	public static function warning($input) {	
		self::$_alertType['Warning'] = $input;
	}

	public static function notice($input) {	
		self::$_alertType['Notice'] = $input;
	}

	public static function Validate() {
		if (isset(self::$_alertType['Error']) && self::$_alertType['Error'] != "")
			return false;
		else
			return true;
	}

	public static function check($alert) {
		if (isset(self::$_alertType[$alert]))
			return true;
		else
			return false;
	}

	public static function get($alert) {
		if (isset(self::$_alertType[$alert])) {
			$var = self::$_alertType[$alert];
			unset(self::$_alertType[$alert]);
			return $var;
		} else { return false; }
	}
/*
*	if (!ALERT::Validate())
*/
}