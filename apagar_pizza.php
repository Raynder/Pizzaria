<?php
require "_classes/conexao.php";

$id = $_GET['id'];

$apagar = "DELETE FROM pizzas WHERE id_pedido = $id";
$con = $mysqli->query($apagar) or die($mysqli->error);

echo header("location: pedir-pizza2.php");