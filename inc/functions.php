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
	
	function formatnum($n, $d = 2) {
		return number_format($n, $d, ',', '.');
	}
	
	function formatdate($f, $h = false, $t = 1) {
		$mes = Array('Jan' => 'Ene',
			'Apr' => 'Abr',
			'Aug' => 'Ago',
			'Dec' => 'Dic');
		$f = date_create_from_format('d-M-y H.i.s.u A', $f);
		$res = explode(' ', date_format($f, 'j M Y'));
		$res[1] = $mes[$res[1]];
		return implode(' ', $res);
	}