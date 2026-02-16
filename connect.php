<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "otletlada";
$table = "otletek";

try {
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        $_SESSION["error"] = "Connection failed: " . $conn->connect_error;
        die("Connection failed: " . $conn->connect_error);
        header("Location: failed.php");
        exit;
    }
} catch (\Throwable $err) {
    $_SESSION['error'] = (string) $err;
    //echo "Hiba: " . $_SESSION['error'];
    //echo '<p style="color:red;">Catched error: ' . $err . '</p>';
    echo "Nem sikerült csatlakozni az adatbázishoz";
    //header("Location: failed.php");
    exit;

}
