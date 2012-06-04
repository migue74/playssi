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
	
	function formatdate($f, $h = false, $t = 1) {
		$mes = Array('Jan' => 'Ene', 'Apr' => 'Abr', 'Aug' => 'Aug', 'Dec', 'Dic');
		$res = date_create_from_format('d/m/y H:i:s,u', $f);
		$res = date_format($res, 'j M Y');
		$res = explode(' ', $res);
		$res[1] = $mes[$res[1]];
		return implode(' ', $res);
	}