<?php
require_once "connection.php";

$message = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    $user = $stmt->fetch();

    echo "SQL Statement: $sql<br>";
    echo "User: " . htmlspecialchars($username) . "<br>";
    echo "Password: " . htmlspecialchars($password) . "<br>";

    if ($user) {
        $message = "Welkom, je hebt toegang tot de website!";
    } else {
        $message = "Ongeldige login.";
    }
}
?>

<div class="login-box" style="margin:60px;border:1px solid #000;padding:20px;border-radius:10px;width:300px;">
    <h2>Login</h2>

    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input
            type="text"
            id="username"
            name="username"
            value="<?php echo htmlspecialchars($username); ?>"
            required
        ><br><br>

        <label for="password">Password:</label><br>
        <input
            type="text"
            id="password"
            name="password"
            required
        ><br><br>

        <button type="submit">Login</button>
    </form>
</div>

<?php if ($message !== ""): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>