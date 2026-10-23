<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
echo "Selamat datang, " . htmlspecialchars($_SESSION["user"]);
echo "<br>Waktu login: " . htmlspecialchars($_SESSION["waktu"]);
echo ' <br><a href="logout.php">Logout</a>';