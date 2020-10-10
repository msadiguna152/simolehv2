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

	function pembayaran_ovo()
	{
		init_xendit();
		$ovoParams = [
			'external_id' => 'ovo-ewallet-test878',
			'amount' => 80002,
			'phone' => '08182345323',
			'ewallet_type' => 'OVO'
		];

		$createOvo = \Xendit\EWallets::create($ovoParams);
		var_dump($createOvo);
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
