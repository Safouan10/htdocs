<?php
class Bankrekening {
    private $saldo = 0;

    public function stort($bedrag) {
        if ($bedrag > 0) {
            $this->saldo += $bedrag;
            echo "€$bedrag gestort.<br>";
        } else {
            echo "Storting geweigerd: bedrag moet positief zijn.<br>";
        }
    }

    public function opnemen($bedrag) {
        if ($bedrag <= $this->saldo) {
            $this->saldo -= $bedrag;
            echo "€$bedrag opgenomen.<br>";
        } else {
            echo "Opname geweigerd: onvoldoende saldo.<br>";
        }
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

$rekening = new Bankrekening();

$rekening->stort(100);
$rekening->stort(50);
$rekening->stort(-20);

echo "Huidig saldo: €" . $rekening->getSaldo() . "<br>";

$rekening->opnemen(30);
echo "Saldo na opname: €" . $rekening->getSaldo() . "<br>";

$rekening->opnemen(200);
echo "Eindsaldo: €" . $rekening->getSaldo() . "<br>";
?>