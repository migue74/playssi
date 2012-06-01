<?php
	function query($q) {
		global $host, $username, $password;
		try {
			$conex = new PDO($host, $username, $password);
			$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conex->query($q);
			$conex = null;
			return $stmt;
		} catch (PDOException $e) {
			echo 'ERROR: ' . $e->GetMessage();
		}
	}
	
	function activeTab($p) {
		global $pag;
		if ($p == $pag)
			return 'class="active"';
	}
	
	function fNum($n, $d = 2) {
		return number_format($n, $d, ',', '.');
	}