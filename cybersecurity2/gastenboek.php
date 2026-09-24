<?php
if ($_POST) {
    echo "<h3>Bericht ontvangen:</h3>";
    echo "<p>Van: " . $_POST['naam'] . "</p>";
    echo "<p>" . $_POST['bericht'] . "</p>";
}
?>

<form method="post">
    Naam: <input name="naam"><br><br>
    Bericht: <textarea name="bericht"></textarea><br><br>
    <input type="submit" value="Verstuur">
</form>