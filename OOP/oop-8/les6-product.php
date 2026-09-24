<?php

class Product {
    private $naam;
    private $prijs;

    public function __construct(string $naam, float $prijs) {
        if ($prijs < 0) {
            $prijs = 0;
        }

        $this->naam = $naam;
        $this->prijs = $prijs;
    }

    public function getNaam(): string {
        return $this->naam;
    }

    public function getPrijs(): float {
        return $this->prijs;
    }
}

?>