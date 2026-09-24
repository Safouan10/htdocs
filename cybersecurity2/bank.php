<?php
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['csrf_token'];

if (!isset($_SESSION["betalingen"])) {
    $_SESSION["betalingen"] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["clear_all"])) {
    $_SESSION["betalingen"] = [];
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["naar"])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF aanval gedetecteerd!");
    }

    $naar = $_POST["naar"] ?? "";
    $bedrag = $_POST["bedrag"] ?? "";

    $_SESSION["betalingen"][] = [
        "naar" => $naar,
        "bedrag" => $bedrag
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bank App</title>
</head>
<body>

<h2>Bank applicatie</h2>

<form method="post">
    <input name="naar" placeholder="Naar" required>
    <input name="bedrag" placeholder="Bedrag" required>
    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
    <input type="submit" value="Opslaan">
</form>

<form method="post">
    <button type="submit" name="clear_all" value="1">Clear all</button>
</form>

<h3>Opgeslagen betalingen</h3>

<?php if (count($_SESSION["betalingen"]) > 0): ?>
    <ul>
        <?php foreach ($_SESSION["betalingen"] as $betaling): ?>
            <li>
                Overgemaakt naar:
                <?php echo htmlspecialchars($betaling["naar"]); ?>
                voor €<?php echo htmlspecialchars($betaling["bedrag"]); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Nog geen inzendingen.</p>
<?php endif; ?>

</body>
</html>