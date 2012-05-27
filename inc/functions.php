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