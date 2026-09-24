<?php

$wachtwoord = "geheim123";
$salt = "ROCAmstelland";

$hash = hash("sha256", $salt . $wachtwoord);

echo "<h3>Wachtwoord opslaan</h3>";
echo "Wachtwoord: " . $wachtwoord . "<br>";
echo "Hash: " . $hash . "<br><br>";

$ingevoerd = "geheim123";

$bekende_hash = "e77e0b2f4b65416f79647f3fe8e63732e7fdbf945869b00d1f4f8fd2ef8f2d1c";

$controle_hash = hash("sha256", $salt . $ingevoerd);

echo "<h3>Login controle</h3>";

if ($controle_hash === $bekende_hash) {
    echo "✅ Ingelogd";
} else {
    echo "❌ Fout wachtwoord";
}

?>