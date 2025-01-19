<?php
require_once "databaze.php";

function getObjednavkaPodleId($id) {
	global $db;

	$stmt = $db->prepare("SELECT * FROM objednavka WHERE id = ?");
	$stmt->execute([$id]);
	$objednavka = $stmt->fetch(PDO::FETCH_ASSOC);

	if(!$objednavka) {
		return null;
	}

	$stmt = $db->prepare("SELECT * FROM objednavka_polozka WHERE objednavka_id = ?");
	$stmt->execute([$id]);
	$objednavka['polozky'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $objednavka;

}
?>