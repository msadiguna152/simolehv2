<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function tanggal_indo($tanggal, $short = false, $cetak_hari = false)
{
	$hari = array(1 => 'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu',
		'Minggu'
	);

	$short_bulan = array(1 => 'Januari',
		'Feb',
		'Mar',
		'Apr',
		'Mei',
		'Jun',
		'Jul',
		'Agu',
		'Sep',
		'Okt',
		'Nov',
		'Des'
	);
	$bulan = array(1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$split_time = explode(' ', $tanggal);
	$split = explode('-', $split_time[0]);
	if ($short) {
		$tgl_indo = $split[2] . ' ' . $short_bulan[(int)$split[1]] . ' ' . $split[0];
	} else {
		$tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
	}

	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo . ', ' . $split_time[1];
}
