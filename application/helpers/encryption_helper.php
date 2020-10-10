<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('encrypt')) {
	function encrypt($string, $key = "", $url_safe = TRUE)
	{
		$CI =& get_instance();
		$ret = $CI->encryption->encrypt($string);

		if ($url_safe) {
			$ret = strtr(
				$ret,
				array(
					'+' => '.',
					'=' => '-',
					'/' => '~'
				)
			);
		}

		return $ret;
	}
}
if (!function_exists('decrypt')) {
	function decrypt($string, $key = "")
	{
		$CI =& get_instance();
		$string = strtr(
			$string,
			array(
				'.' => '+',
				'-' => '=',
				'~' => '/'
			)
		);

		return $CI->encryption->decrypt($string);
	}
}
