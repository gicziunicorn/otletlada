<?php
require "connect.php";

$otlet = $_POST["otlet"];
$datum = date('Y-m-d H:i:s');
$fnev = $_POST["felhnev"];

$cmd = $conn->prepare("INSERT INTO otletek (`id`, `otlet`, `datum`, `fnev`, `elfogadott`, `szavazatok`) VALUES (NULL, ?, NOW(), ?, 0, 0);");
$cmd->bind_param("ss", $otlet, $fnev);
$cmd->execute();

echo "Siker";
$_SESSION["msg"] = "siker";
header("Location: index.php");
?>
