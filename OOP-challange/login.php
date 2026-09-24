<?php

session_start();

require_once 'UserDatabase.php';

$db = new UserDatabase();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $user = $db->findUserByUsername($username);

    if (!$user) {

        $message = "Gebruiker bestaat niet.";

    } else {

        if (password_verify($password, $user['passwordHash'])) {

            $_SESSION['username'] = $user['username'];

            header("Location: login-success.php");
            exit();

        } else {

            $message = "Verkeerd wachtwoord.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<form method="post">

    Gebruikersnaam:<br>
    <input type="text" name="username"><br><br>

    Wachtwoord:<br>
    <input type="password" name="password"><br><br>

    <button type="submit">Inloggen</button>

</form>

<p><?php echo $message; ?></p>

</body>
</html>