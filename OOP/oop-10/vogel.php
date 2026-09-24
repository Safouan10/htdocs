<?php

require_once 'dier.php';

class Vogel extends Dier {

    public function vlieg() {
        echo $this->naam . " vliegt!<br>";
    }

}

?>