<?php

require 'les6-product.php';
require 'les6-winkelmandje.php';

$p1 = new Product("Boek OOP", 25.50);
$p2 = new Product("USB-stick", 8.99);

$mandje = new Winkelmandje();

echo "Producten toevoegen:<br>";

$mandje->voegToe($p1, 2);
echo "- 2x Boek OOP toegevoegd<br>";

$mandje->voegToe($p2, 1);
echo "- 1x USB-stick toegevoegd<br><br>";

echo "Inhoud winkelmandje:<br>";
echo $mandje->toonItems();

echo "<br>USB-stick verwijderen...<br><br>";

$mandje->verwijder($p2);

echo "Inhoud winkelmandje na verwijderen:<br>";
echo $mandje->toonItems();

echo "<br>Totaal: €" . number_format($mandje->getTotaal(), 2);

?>