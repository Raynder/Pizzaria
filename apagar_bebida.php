<?php
require "_classes/conexao.php";

$id = $_GET['id'];

$apagar = "DELETE FROM bebidas WHERE id_bebida = $id";
$con = $mysqli->query($apagar) or die($mysqli->error);

echo header("location: pedir-pizza.php");