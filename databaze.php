<?php

$host = "127.0.0.1";
$dbname = "objednavky";
$username = "root";
$password = "";

try {
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password,[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	]);
} catch (PDOException $e) {
	die("Chyba připojení k databázi: " . $e->getMessage());
}
?>