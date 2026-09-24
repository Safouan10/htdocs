<?php
class Rekening {
    public $saldo;

    public function __construct() {
        $this->saldo = 0;
    }

    public function stort($bedrag) {
        $this->saldo += $bedrag;
    }

    public function opname($bedrag) {
        if ($bedrag <= $this->saldo) {
            $this->saldo -= $bedrag;
        } else {
            echo "Opname van €$bedrag mislukt: onvoldoende saldo.<br>";
        }
    }

    public function toonSaldo() {
        return $this->saldo;
    }
}

$mijnRekening = new Rekening();

echo "Beginsaldo: €" . $mijnRekening->toonSaldo() . "<br>";

$mijnRekening->stort(100);
echo "Na storting van €100: €" . $mijnRekening->toonSaldo() . "<br>";

$mijnRekening->stort(50);
echo "Na storting van €50: €" . $mijnRekening->toonSaldo() . "<br>";

$mijnRekening->opname(30);
echo "Na opname van €30: €" . $mijnRekening->toonSaldo() . "<br>";

$mijnRekening->opname(200);
echo "Na poging tot opname van €200: €" . $mijnRekening->toonSaldo() . "<br>";
?>