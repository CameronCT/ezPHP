<?php

class Validate {

    public static function alphabet($v) {
        if (preg_match('/[^a-zA-Z]/i', $v))
            return false;
        else
            return true;
    }

    public static function alphanum($v) {
        if (preg_match('/[^a-zA-Z_0-9]/i', $v))
            return false;
        else
            return true;
    }

    public static function int($v) {
		return filter_var($v, FILTER_VALIDATE_NUMBER_INT);
	}

    public static function float($v) {
		return filter_var($v, FILTER_VALIDATE_NUMBER_FLOAT);
	}

    public static function email($v) {
		return filter_var($v, FILTER_VALIDATE_EMAIL);
	}

    public static function url($v) {
		return filter_var($v, FILTER_VALIDATE_URL);
	}

}