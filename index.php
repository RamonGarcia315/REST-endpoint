<?php
require_once "objednavkaModel.php";

$id = $_GET['id'] ?? null;
$objednavka = $id ? getObjednavkaPodleId($id) : null;
?>

<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail objednávky</title>
</head>
<body>
	<h1>Detail objednávky</h1>

	<?php if ($objednavka): ?>
		<p><strong>ID:</strong> <?= htmlspecialchars($objednavka['id']) ?></p>
		<p><strong>Datum vytvoření:</strong> <?= htmlspecialchars($objednavka['datum']) ?></p>
		<p><strong>Název:</strong> <?= htmlspecialchars($objednavka['nazev']) ?></p>
		<p><strong>Částka:</strong> <?= htmlspecialchars($objednavka['castka']) ?> <?= htmlspecialchars($objednavka['mena']) ?></p>
		<p><strong>Stav:</strong> <?= htmlspecialchars($objednavka['stav']) ?></p>

		<h2>Položky objednávky</h2>
		<ul>
			<?php foreach ($objednavka['polozky'] as $polozka): ?>
				<li><?= htmlspecialchars($polozka['nazev']) ?> - <?= htmlspecialchars($polozka['castka']) ?> <?= htmlspecialchars($objednavka['mena']) ?></li>
			<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<p>Objednávka nenalezena.</p>
	<?php endif; ?>

</body>
</html>