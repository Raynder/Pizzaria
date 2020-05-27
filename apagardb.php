<?php
session_start();
require_once '_classes/conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pedido Concluido!</title>
    <style>
        body{
            background-image: url("_imagens/pedido-feito.jpg");
        }
        div{
            position: absolute;
            width: 100%;
            height: 100%;
        }
        #texto{
            width: 400px;
            height: 400px;
            left: 50%;
            transform: translate(-50%, -50%);
            position: relative;
            top: 50%;
        }
        h1{
            font-size: 40pt;
        }
        h2{
            font-size: 20pt;
        }
        a{
            text-decoration: none;
            color: inherit;
            background-color: white;
            padding: 10px;
        }

    </style>
</head>
<body>
<div>
    <div id="texto"><h1>Obrigado! Agradecemos a preferencia.</h1>
        <h2>seu pedido foi realizado com sucesso!</h2>
        <h2><a href="index.php">Voltar a Pagina principal</a></h2></div>
    <?php
    #$u->conectar("epiz_25116060_login_projeto","sql102.epizy.com","epiz_25116060","ddd2FuM1gg4");
    #$u->conectar("login_projeto","localhost","root","");

    $id = $_SESSION['id'];

    $delet = "DELETE FROM bebidas WHERE id_cliente = '$id'";
    $del = $mysqli->query($delet) or die ($mysqli->error);


    $delet1 = "DELETE FROM pizzas WHERE id_cliente = '$id'";
    $del2 = $mysqli->query($delet1) or die ($mysqli->error);

    #$delet2 = "DELETE FROM observacoes WHERE id_cliente = '$id'";
    #$del3 = $mysqli->query($delet2) or die($mysqli->error);
    ?></div>
</body>
</html>