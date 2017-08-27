<?php

class Filter {

    public static function string($v) {
		return filter_var($v, FILTER_SANITIZE_STRING);
	}

    public static function output($v) {
        $s1 = filter_var($v, FILTER_SANITIZE_STRING);
        return filter_var($s1, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    public static function int($v) {
		return filter_var($v, FILTER_SANITIZE_NUMBER_INT);
	}

    public static function float($v) {
		return filter_var($v, FILTER_SANITIZE_NUMBER_FLOAT);
	}

    public static function email($v) {
		return filter_var($v, FILTER_SANITIZE_EMAIL);
	}

    public static function url($v) {
		return filter_var($v, FILTER_SANITIZE_URL);
	}

    public static function encoded($v) {
		return filter_var($v, FILTER_SANITIZE_ENCODED);
	}

}