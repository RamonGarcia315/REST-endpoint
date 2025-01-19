<?php

header("Content-Type: application/json");


try {
	$db = new PDO("mysql:host=127.0.0.1;dbname=objednavky;charset=utf8mb4", "root", "",[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	]);
} catch (PDOException $e) {
	http_response_code(500);
	echo json_encode(["error" => "Chyba připojení k databázi"]);
	exit;
}

$id = $_GET['id'] ?? null;

if ($id) {
	$stmt = $db->prepare("SELECT * FROM objednavka WHERE id = ?");
	$stmt->execute([$id]);
	$objednavka = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($objednavka) {
		$stmt = $db->prepare("SELECT nazev, castka FROM objednavka_polozka WHERE objednavka_id = ?");
		$stmt->execute([$id]);
		$objednavka['položky'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($objednavka);
	} else {
		http_response_code(404);
		echo json_encode(["error" => "Objednávka nebyla nalezena"]);
	}

} else {
	http_response_code(400);
	echo json_encode(["error" => "Chybí parametr 'id'"]);
}

?>