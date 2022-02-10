<?php

require "banco.php";

// Coleta de dados via POST
$name = $_POST['name'];
$topic = $_POST['topic'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$description = $_POST['description'];
$date = date('Y-m-d H:i:s');


$sql = "INSERT INTO contacts(`name`, `topic`, `email`, `phone`, `description`, `date`) 
    VALUES('$name', '$topic', '$email', '$phone', '$description', '$date')";

if (mysqli_query($conexao, $sql)) {
    header("Location: ../resources/pages/status/success.php"); die();
} else {
    header("Location: ../resources/pages/status/error.php"); die();
}
mysqli_close($conexao);