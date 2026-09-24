<?php

session_start();

// logout trigger
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>

<h1>Welkom <?php echo $_SESSION['username']; ?></h1>

<a href="login-success.php?logout=1">Uitloggen</a>