<?php

class Config {
	static $_config;

	public static function load($file, $name) {
		if(empty(self::$_config)) {
			self::$_config = array();
		}

		$config = include($file);
		
		if(!empty($config)) {
			self::$_config[$name] = $config;
		}
	}

	public static function loads($list_of_files) {
		foreach ($list_of_files as $key => $value) {
			self::load($value, $key);
		}
	}

	public static function read($name, $key = null) {
		if(empty($key)) {
			return self::$_config[$name];
		}
		return self::$_config[$name][$key];
	}

	public static function write($name, $value) {
		self::$_config[$name] = $value;
	}

	public static function get_all() {
		return self::$_config;
	}
}

// Config::load('../conf/application.php', 'app');
// Config::load('../conf/database.php', 'dbase');
// Config::load('../conf/email.php', 'mail');
// Config::write('leases', array('Leasehold','Freehold','Hak Milik Sementara', 'MCL'));

// echo Config::read('application', 'name');

// var_dump(Config::get_all());
?>