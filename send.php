<?php
require "connect.php";

$otlet = $_POST["otlet"];
$datum = date('Y-m-d H:i:s');
$fnev = "cigany";

$cmd = $conn->prepare("INSERT INTO otletek (id, otlet, datum, fnev, elfogadott, szavazatok) VALUES (NULL, ?, ?, ?, ?, ?)");
$cmd->bind_param("sssbi", $otlet, $datum, $fnev, 0, 0);
$cmd->execute();
$result = $cmd->get_result();

if ($result) {
    $_SESSION["msg"] = "regsuccess"; //-successful registration
    header("Location: loginpage.php");
    exit;
} else {
    echo "Hiba történt!";
}

?>
