<?php 
require("_classes/conexao.php");
session_start();

$id = $_SESSION['id'];

$consulta = "SELECT * from usuario where id = $id";
$con = $mysqli->query($consulta) or die($mysqli->error);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php


    ?>
<table border="1" width="400px" cellpadding="5px">
    <h2>Cliente</h2>

    <tr>
        <td>Nome</td>
        <td>Endereço</td>
        <td>Complemento</td>
        <td>Telefone</td>

    </tr>
    <?php

    while ($dado = $con->fetch_array()) {
        ?>
        <tr>
            <td><?php echo $dado['nome']; ?></td>
            <td><?php echo $dado['endereco']; ?></td>
            <td><?php echo $dado['complemento']; ?></td>
            <td><?php echo $dado['telefone']; ?></td>

        </tr>
        <?php
    }

    ?>
</table>
    <table border="1" width="300px" cellpadding="5px">
        <h2>Pizzas</h2>

        <tr>
            <td></td>
        <th>Sabor 1:</th>
        <th>Sabor 2:</th>
        <th>Tamanho:</th>
        <th>Borda:</th>
    </tr>
    <?php

    $consulta = "SELECT * from pizzas where id_cliente = $id";
    $con = $mysqli->query($consulta) or die($mysqli->error);

    while ($dado = $con->fetch_array()) {
        ?>
        <tr>
            <th>Pizza </th>
            <td><?php echo  $dado['saborx']; ?></td>
            <td><?php echo  $dado['sabory']; ?></td>
            <td><?php echo  $dado['tamanho']; ?></td>
            <td><?php echo  $dado['borda']; ?></td>

        </tr>


        <?php
    }

    ?>
        <table border="1" width="400px" cellpadding="5px">
            <h2>Bebidas</h2>
            <?php


            $consulta = "SELECT * from bebidas where id_cliente = $id";
            $con = $mysqli->query($consulta) or die($mysqli->error);


            while ($dado = $con->fetch_array()) {
                ?>
                <tr>
                    <td><?php echo $dado['nome_bebida']; ?></td>


                </tr>
                <?php
            }

            ?>
</table>
        <a href="pedir-pizza.php">
</body>
</html>
