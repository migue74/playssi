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
	
	function fdate($f, $h = false, $t = 1) {
		$mes = Array('Jan' => 'Ene', 'Apr' => 'Abr', 'Aug' => 'Ago', 'Dec' => 'Dic');
		$res = date_create_from_format('d/m/y H:i:s,u', $f);
		$res = date_format($res, 'j M Y');
		$res = explode(' ', $res);
		if ($res[1] == 'Jan' || $res[1] == 'Apr' || $res[1] == 'Aug' || $res[1] == 'Dec')
			$res[1] = $mes[$res[1]];
		return implode(' ', $res);
	}
	
	function fnum($n) {
		$n = str_replace(',', '.', $n);
		return number_format($n, 2, ',', '.');
	}
	
	function selected($v, $r) {
		if ($v == $r)
			return 'selected';
	}
	
	function fzero($n) {
		return str_replace('.', ',', ((float) str_replace(',', '.', $n)));
	}