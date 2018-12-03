<?php 
	define('base_url', 'http://localhost/plntoken');

	//membuat format rupiah
	function rupiah($i){
		
		$rupiah = "Rp " . number_format($i,0,',','.');
		return $rupiah;

	}

 ?>