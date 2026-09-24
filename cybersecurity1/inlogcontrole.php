<?php
session_start();

$gebruikersnaam = "admin";
$wachtwoord = "geheim";

$logbestand = "loginlog.txt";

if (!isset($_SESSION['pogingen'])) {
    $_SESSION['pogingen'] = 0;
}

if ($_SESSION['pogingen'] >= 3) {
    die("Te veel pogingen. Probeer het later opnieuw.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['username'] === $gebruikersnaam &&
        $_POST['password'] === $wachtwoord) {

        echo "Welkom!";
        $_SESSION['pogingen'] = 0;

        $logregel = date("Y-m-d H:i:s") .
                    " - Succesvolle login van " .
                    $_POST['username'] . "\n";

        file_put_contents($logbestand, $logregel, FILE_APPEND);

    } else {

        sleep(1);

        $_SESSION['pogingen']++;

        echo "Foutieve inlog.";

        $logregel = date("Y-m-d H:i:s") .
                    " - Mislukte login van " .
                    $_POST['username'] . "\n";

        file_put_contents($logbestand, $logregel, FILE_APPEND);
    }
}
?>