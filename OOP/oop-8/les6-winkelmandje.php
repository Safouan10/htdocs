<?php

require_once 'les6-product.php';

class Winkelmandje {

    private $items = [];

    public function voegToe(Product $p, int $aantal): void {

        foreach ($this->items as &$item) {

            if ($item['product']->getNaam() === $p->getNaam()) {
                $item['aantal'] += $aantal;
                return;
            }
        }

        $this->items[] = [
            'product' => $p,
            'aantal' => $aantal
        ];
    }

    public function verwijder(Product $p): void {

        foreach ($this->items as $key => $item) {

            if ($item['product']->getNaam() === $p->getNaam()) {
                unset($this->items[$key]);
                return;
            }
        }
    }

    public function getTotaal(): float {

        $totaal = 0;

        foreach ($this->items as $item) {
            $totaal += $item['product']->getPrijs() * $item['aantal'];
        }

        return $totaal;
    }

    public function toonItems(): string {

        $output = "";

        foreach ($this->items as $item) {

            $output .= $item['product']->getNaam();
            $output .= " x ";
            $output .= $item['aantal'];
            $output .= " = €";
            $output .= number_format(
                $item['product']->getPrijs() * $item['aantal'],
                2
            );
            $output .= "<br>";
        }

        return $output;
    }
}

?>