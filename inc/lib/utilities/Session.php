<?php

class Session {
	public static function init() {
		session_start();
	}

	public static function destroy() {
		session_unset();
		session_destroy();
	}

	public static function write($key, $value) {
		if(!self::is_session_started()) {
			self::init();
		}
		$_SESSION[$key] = $value;
	}

	public static function read($key) {
		if(!self::is_session_started()) {
			self::init();
		}
		return $_SESSION[$key];
	}
	// http://php.net/session_status
	public static function is_session_started()
	{
	    if ( php_sapi_name() !== 'cli' ) {
	        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
	            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
	        } else {
	            return session_id() === '' ? FALSE : TRUE;
	        }
	    }
	    return FALSE;
	}
}