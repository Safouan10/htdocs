<?php
class Student {
    public $voornaam;
    public $achternaam;
    public $opleiding;

    public function __construct($voornaam, $achternaam, $opleiding) {
        $this->voornaam = $voornaam;
        $this->achternaam = $achternaam;
        $this->opleiding = $opleiding;
    }

    public function stelVoor() {
        echo "Hallo, ik ben " . $this->voornaam . " " . $this->achternaam .
        " en ik doe de opleiding " . $this->opleiding . ".<br>";
    }
}

$student01 = new Student("Peter", "Pindakaas", "Cybersecurity");
$student02 = new Student("Henk", "Baksteen", "Software Development");

$student01->stelVoor();
$student02->stelVoor();
?>