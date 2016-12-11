<?php

class Cache {

	private $key;

	public static function address($file, $secret, $debug = false) {
		if ($debug == false) {
			if (!isset($_SESSION)) {
				$var = hash('sha256', $file . '.' . $secret);
				return $var;
			} else {
				$_SESSION['_ezSession']		=		session_id();
				$var = hash('sha256', $file . '.' . Host::getIpAddress() . '.' . $_SESSION['_ezSession'] . '.' . $secret);
				return $var;
			}
		} else { 
			if (!session_id()) {
				$var = $file . '.' . $secret;
				return $var;
			} else {
				$_SESSION['_ezSession']		=		session_id();
				$var = $file . '.' . Host::getIpAddress() . '.' . $_SESSION['_ezSession'] . '.' . $secret;
				return $var;
			}
		}

	}

}

?>