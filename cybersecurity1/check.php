<?php

$gebruikers = [
    'max'   => '411d393a8618e826b3d1f33dac1d338249494f4ab225ad00ff764ea801b777ee', 
    'lisa' => 'd288df8119a88b165fd0815f5c9651fc194544d00ccae1ecc2bb0dad683f8dbe'  
];

$melding = '';
$gebruikersnaam = $_GET['gebruikersnaam'] ?? '';
$wachtwoord = $_GET['wachtwoord'] ?? '';

if (isset($gebruikers[$gebruikersnaam])) {
    if (hash('sha256', $wachtwoord) === $gebruikers[$gebruikersnaam]) {
        $melding = "Ingelogd als <strong>$gebruikersnaam</strong>!";
    } else {
        $melding = "Fout wachtwoord.";
    }
} else {
    $melding = "Gebruiker bestaat niet.";
}
echo $melding;
?>