<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('response')) {
	function response(array $response, string $type)
	{
		if ($type === 'dump') {
			var_dump($response);
		}
		if ($type === 'json') {
			echo json_encode($response);
		}
		if ($type === 'error') {
			echo json_encode(['status' => 'error', 'message' => 'NO RESPOND FOR THAT YOURE LOOOKING']);
		}
		return true;
	}
}
