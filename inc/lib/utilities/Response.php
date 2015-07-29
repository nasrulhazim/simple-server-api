<?php

class Response {
	static $_response;

	public static function write($name, $value) {
		if(is_null(self::$_response) || empty(self::$_response)) {
			self::$_response = [];
			self::$_response['status'] = true;
			self::$_response['message'] = null;
			self::$_response['data'] = [];
		}

		if(isset($name) && isset($value)) {
			self::$_response[$name] = $value;
		}
	}

	public static function output() {
		echo json_encode(self::$_response);
	}
}