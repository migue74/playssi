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
			$fp = fopen('error.log', 'a+');
			fwrite($fp, date("Y/m/d H:i:s") . ' --- ' . $e . "\r\n");
			fclose($fp);
			session_start();
			$_SESSION['dberror'] = 'dberror';
			header('Location: ./index.php');
		}
	}
	
	function activeTab($p) {
		global $pag;
		if ($p == $pag)
			return 'class="active"';
	}
	
	function fdate($f, $h = false) {
		$mes = Array('Jan' => 'Ene', 'Apr' => 'Abr', 'Aug' => 'Ago', 'Dec' => 'Dic');
		$res = date_create_from_format('d/m/y H:i:s,u', $f);
		if (!$h) {
			$res = date_format($res, 'j M Y');
			$res = explode(' ', $res);
			if ($res[1] == 'Jan' || $res[1] == 'Apr' || $res[1] == 'Aug' || $res[1] == 'Dec')
				$res[1] = $mes[$res[1]];
			return implode(' ', $res);
		} else {
			$res = date_format($res, 'j M Y, H:i');
			$res = explode(' ', $res);
			if ($res[1] == 'Jan' || $res[1] == 'Apr' || $res[1] == 'Aug' || $res[1] == 'Dec')
				$res[1] = $mes[$res[1]];
			return implode(' ', $res);
		}
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
	
	function checkNIF($cadena) {
		if (strlen($cadena) != 9)
			return false;      
		$valoresLetra = array(
			0 => 'T', 1 => 'R', 2 => 'W', 3 => 'A', 4 => 'G', 5 => 'M',
			6 => 'Y', 7 => 'F', 8 => 'P', 9 => 'D', 10 => 'X', 11 => 'B',
			12 => 'N', 13 => 'J', 14 => 'Z', 15 => 'S', 16 => 'Q', 17 => 'V',
			18 => 'L', 19 => 'H', 20 => 'C', 21 => 'K',22 => 'E'
		);
		if (preg_match('/^[0-9]{8}[A-Z]$/i', $cadena)) {
			if (strtoupper($cadena[strlen($cadena) - 1]) !=	$valoresLetra[((int) substr($cadena, 0, strlen($cadena) - 1)) % 23])
				return false;
			return true;
		} else if (preg_match('/^[XYZ][0-9]{7}[A-Z]$/i', $cadena)) {
			if (strtoupper($cadena[strlen($cadena) - 1]) !=	$valoresLetra[((int) substr($cadena, 1, strlen($cadena) - 2)) % 23])
				return false;
			return true;
		}
		return false;
	}
	
	function checkEmail($email) {
		if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email))
			return true;
		return false;
	}