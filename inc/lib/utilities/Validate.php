<?php

class Validate {
	static $min_length = 8;
	public static function is_name($value) {
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			return false;
		} else {
			return true;
		}
	}
	public static function is_email($value) {
		if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
			return false;
		} else {
			return true;
		}
	}
	public static function is_password($value) {
		// length min 8
		$length = strlen($value); // strlen(string) - to get string length
		if($length < self::$min_length) {
			return false;
		}

		// min 8, alphanumeric
		// http://www.phpliveregex.com/
		preg_match("/[A-z0-9]+/i", $value, $output);
		if(count($output) == 0) {
			return false;
		}
		return true;
	}
	public static function is_empty($value) {
		if(is_array($value)) {
			if(count($value) > 0) {
				return false;
			} else {
				return true;
			}
		}

		if(is_integer($value)) {
			if($value > 0) {
				return false;
			} else {
				return true;
			}
		}

		if(is_string($value)) {
			$value = trim($value);
			if($value != '') {
				return false;
			} else {
				return true;
			}
		}

		if($value == null) {
			return true;
		} else {
			return false;
		}
	}
}