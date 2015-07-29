<?php

class Html {
	public static function tag($tag, $label, $options = array()) {
		if (empty($tag)) {
			return null;
		}
		$attributes = array();

		if(count($options) > 0) {
			foreach ($options as $key => $value) {
				$attributes[] = $key . '="' . $value . '"';
			}	
		}
		
		return '<'.$tag . ' '.join(' ', $attributes) . '>'.$label.'</'.$tag.'>';
	}
}