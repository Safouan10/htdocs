<?php
class Auto {
    public $merk;
    public $bouwjaar;

    public function toon() {
        echo "Dit is een " . $this->merk . " uit " . $this->bouwjaar;
    }
}

$auto = new Auto();
$auto->merk = "Toyota";
$auto->bouwjaar = 2018;
$auto->toon();
?>