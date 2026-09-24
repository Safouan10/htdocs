<?php

require_once 'User.php';
require_once 'UserDatabase.php';

$db = new UserDatabase();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {

        $message = "Vul alle velden in.";

    } elseif ($db->findUserByUsername($username)) {

        $message = "Gebruikersnaam bestaat al.";

    } else {

        $user = new User($username, $password);
        $db->addUser($user);

        $message = "Registratie gelukt!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registreren</title>
</head>
<body>

<h1>Registreren</h1>

<form method="post">

    Gebruikersnaam:<br>
    <input type="text" name="username"><br><br>

    Wachtwoord:<br>
    <input type="password" name="password"><br><br>

    <button type="submit">Registreren</button>

</form>

<p><?php echo $message; ?></p>

<a href="login.php">Naar login</a>

</body>
</html>