<?php

class Filter {

    private static function string($v) {
		return filter_var($v, FILTER_SANITIZE_STRING);
	}

    private static function output($v) {
        $s1 = filter_var($v, FILTER_SANITIZE_STRING);
        return filter_var($s1, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    private static function int($v) {
		return filter_var($v, FILTER_SANITIZE_NUMBER_INT);
	}

    private static function float($v) {
		return filter_var($v, FILTER_SANITIZE_NUMBER_FLOAT);
	}

    private static function email($v) {
		return filter_var($v, FILTER_SANITIZE_EMAIL);
	}

    private static function url($v) {
		return filter_var($v, FILTER_SANITIZE_URL);
	}

    private static function encoded($v) {
		return filter_var($v, FILTER_SANITIZE_ENCODED);
	}

}