<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($username === "admin" && $password === "12345") {
        $_SESSION["user"]  = $username;
        $_SESSION["waktu"] = date("d-m-Y H:i:s");
        header("Location: dashboard.php");
        exit;
    }
    $error = "Username atau password salah.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
<h2>Login</h2>
<?php if ($error): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form method="post">
    <p>Username: <input type="text" name="username"></p>
    <p>Password: <input type="password" name="password"></p>
    <button type="submit">Masuk</button>
</form>
</body>
</html>