<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_frete";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  throw new Exception("Conexão falhou: " . $conn->connect_error);
}

?>