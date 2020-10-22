<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('init_xendit')) {
	function init_xendit()
	{
		\Xendit\Xendit::setApiKey("xnd_development_c1tHlkrJRjfNhqGCJy5Gp2y0p03Q1l9vkK5278wzsYC3spx0Jw2569dSyvUOwLty");
	}

	function cek_saldo()
	{
		init_xendit();
		$getBalance = \Xendit\Balance::getBalance('CASH');
//		var_dump($getBalance);
	}

	function get_active_bank()
	{
//		\Xendit\Xendit::
	}

	function generate_pembayaran_ovo($ovoParams)
	{
		init_xendit();
		$createOvo = null;
		try {
			$createOvo = \Xendit\EWallets::create($ovoParams);
		} catch (\Xendit\Exceptions\ApiException $e) {
			print_r($e);
		}
		return $createOvo;
	}

	function generate_pembayaran_linkaja($linkAjaParams)
	{
		init_xendit();
		$createLinkAja = null;
		try {
			$createLinkAja = \Xendit\EWallets::create($linkAjaParams);
		} catch (\Xendit\Exceptions\ApiException $e) {
			print_r($e);
		}
		return $createLinkAja;
	}

	function get_status_pembayaran()
	{

	}

	function get_vabanks()
	{
		init_xendit();
		$getVABanks = \Xendit\VirtualAccounts::getVABanks();
		return $getVABanks;
	}
}
