CREATE DATABASE objednavky DEFAULT CHARSET utf8mb4;

CREATE TABLE objednavka (
	id INT PRIMARY KEY AUTO_INCREMENT,
	datum DATE NOT NULL,
	nazev VARCHAR(255) NOT NULL,
	castka DECIMAL(10,2) NOT NULL,
	mena VARCHAR(3) NOT NULL,
	stav ENUM('čeká na vyřízení', 'vyřízeno', 'zrušeno') NOT NULL
);

INSERT INTO objednavka (datum, nazev, castka, mena, stav) VALUES
('2025-01-01', 'Objednávka 1', 100.00, 'CZK', 'čeká na vyřízení'),
('2025-01-02', 'Objednávka 2', 250.50, 'EUR', 'vyřízeno'),
('2025-01-03', 'Objednávka 3', 75.00, 'USD', 'zrušeno');

CREATE TABLE objednavka_polozka (
	id INT PRIMARY KEY AUTO_INCREMENT,
	objednavka_id INT NOT NULL,
	nazev VARCHAR(255) NOT NULL,
	castka DECIMAL(10,2) NOT NULL,
	FOREIGN KEY (objednavka_id) REFERENCES objednavka(id) ON DELETE CASCADE
);

INSERT INTO objednavka_polozka (objednavka_id, nazev, castka) VALUES
(1, 'Produkt A', 50.00),
(1, 'Produkt B', 50.00),
(2, 'Produkt C', 150.50),
(2, 'Produkt D', 100.00),
(3, 'Produkt E', 75.00);
