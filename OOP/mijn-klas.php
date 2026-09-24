<?php
class Student {
    public $voornaam;
    public $achternaam;
    public $opleiding;

    public function stelVoor() {
        echo "Hallo, ik ben " . $this->voornaam . " " . $this->achternaam . 
        " en ik doe de opleiding " . $this->opleiding . ".<br>";
    }
}

$student01 = new Student();
$student01->voornaam = "Henk";
$student01->achternaam = "Baksteen";
$student01->opleiding = "Software Development";
$student01->stelVoor();

$student02 = new Student();
$student02->voornaam = "Peter";
$student02->achternaam = "Pindakaas";
$student02->opleiding = "Cybersecurity";
$student02->stelVoor();

$student03 = new Student();
$student03->voornaam = "Tim";
$student03->achternaam = "Frikandel";
$student03->opleiding = "AI Software development";
$student03->stelVoor();
?>