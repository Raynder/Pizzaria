<?php
session_start();
require("../_classes/conexao.php");
require 'vendor/autoload.php';
global $total;
$id = $_SESSION['id'];

$valor = 0;

$user = "SELECT * FROM usuario WHERE id = $id";
$con = $mysqli->query($user) or die ($mysqli->error);

while ($dado = $con->fetch_array()){
    $cliente = $dado['nome'];
    $telefone = $dado['telefone'];
    $endereco = $dado['endereco'];
    $complemento = $dado['complemento'];
}
$pizzas = "SELECT * FROM pizzas WHERE id_cliente = $id";
$con = $mysqli->query($pizzas) or die ($mysqli->error);

while ($dado = $con->fetch_array()){
    if ($valor == 0){
        $pizzax0 = $dado['saborx'];
        $pizzay0 = $dado['sabory'];
        $tam0 = $dado['tamanho'];
        $borda0 = $dado['borda'];
    }if ($valor == 1){
        $pizzax1 = $dado['saborx'];
        $pizzay1 = $dado['sabory'];
        $tam1 = $dado['tamanho'];
        $borda1 = $dado['borda'];
    }if ($valor == 2){
        $pizzax2 = $dado['saborx'];
        $pizzay2 = $dado['sabory'];
        $tam2 = $dado['tamanho'];
        $borda2 = $dado['borda'];
    }if ($valor == 3){
        $pizzax3 = $dado['saborx'];
        $pizzay3 = $dado['sabory'];
        $tam3 = $dado['tamanho'];
        $borda3 = $dado['borda'];
    }if ($valor == 4){
        $pizzax4 = $dado['saborx'];
        $pizzay4 = $dado['sabory'];
        $tam4 = $dado['tamanho'];
        $borda4 = $dado['borda'];
    }
    ++$valor;
}
$valor = 0;

$bebidas = "SELECT * FROM bebidas WHERE id_cliente = $id";
$con = $mysqli->query($bebidas) or die ($mysqli->error);

while ($dado = $con->fetch_array()){
    if ($valor == 0){
        $bebida0 = $dado['nome_bebida'];
    }if ($valor == 1){
        $bebida1 = $dado['nome_bebida'];
    }if ($valor == 2){
        $bebida2 = $dado['nome_bebida'];
    }
    ++$valor;
}

$observ = "SELECT * FROM observacoes WHERE id_cliente = $id";
$con = $mysqli->query($observ) or die($mysqli->error);

$i = 1;

while ($dado = $con->fetch_array()){
    if($i == 1){
        $obs1 = $dado['observacao'];
    }
    if ($i == 2){
        $obs2 = $dado['observacao'];
    }if ($i == 3){
        $obs3 = $dado['observacao'];
    }
}

if($pizzax0 != '' && $pizzax1 == ''){
    $from = new SendGrid\Email(null, "pizzariacardoso@gmail.com");
    $subject = "Novo Pedido!";
    $to = new SendGrid\Email(null, "raynder4@gmail.com");
    $content = new SendGrid\Content("text/html", "<div> <b><h1>Dados do cliente</h1></b><br>Cliente $cliente<br>Endereço: $endereco<br>Complemento: $complemento<br>Telefone: $telefone<br><br><b><h1>Pedidos</h1></b><br>Primeira pizza : $pizzax0 X $pizzay0<br> Tamanho: $tam0<br>Borda: $borda0 <br><br> <h1>Bebidas</h1><br>$bebida0<br>$bebida1<br>$bebida2<br><br><h1>Observações</h1><br><br>$obs1<br>$obs2<br>$obs3</div>");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

//Necessário inserir a chave
    $apiKey = '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';
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);
}if($pizzax0 != '' && $pizzax1 != '' && $pizzax2 == ''){
        $from = new SendGrid\Email(null, "pizzariacardoso@gmail.com");
        $subject = "Novo Pedido!";
        $to = new SendGrid\Email(null, "raynder4@gmail.com");
        $content = new SendGrid\Content("text/html", "<div id='msg'> <b><h1>Dados do cliente</h1></b><br>Cliente $cliente<br>Endereço: $endereco<br>Complemento: $complemento<br>Telefone: $telefone<br><br><b><h1>Pedidos</h1></b><br>Primeira pizza : $pizzax0 X $pizzay0<br> Tamanho: $tam0<br>Borda: $borda0 <br>Segunda pizza : $pizzax1 X $pizzay1<br> Tamanho: $tam1<br>Borda: $borda1 <br><br> <h1>Bebidas</h1><br>$bebida0<br>$bebida1<br>$bebida2<br><br><h1>Observações</h1><br><br>$obs1<br>$obs2<br>$obs3</div>");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);

//Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
}if($pizzax0 != '' && $pizzax1 != '' && $pizzax2 != ''){
            $from = new SendGrid\Email(null, "pizzariacardoso@gmail.com");
            $subject = "Novo Pedido!";
            $to = new SendGrid\Email(null, "raynder4@gmail.com");
            $content = new SendGrid\Content("text/html", "<div> <b><h1>Dados do cliente</h1></b><br>Cliente $cliente<br>Endereço: $endereco<br>Complemento: $complemento<br>Telefone: $telefone<br><br><b><h1>Pedidos</h1></b><br>Primeira pizza : $pizzax0 X $pizzay0<br> Tamanho: $tam0<br>Borda: $borda0 <br>Segunda pizza : $pizzax1 X $pizzay1<br> Tamanho: $tam1<br>Borda: $borda1 <br>Terceira pizza : $pizzax2 X $pizzay2<br> Tamanho: $tam2<br>Borda: $borda2 <br><br> <h1>Bebidas</h1><br>$bebida0<br>$bebida1<br>$bebida2<br><br><h1>Observações</h1><br><br>$obs1<br>$obs2<br>$obs3</div>");
            $mail = new SendGrid\Mail($from, $subject, $to, $content);

//Necessário inserir a chave
            $apiKey = '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';
            $sg = new \SendGrid($apiKey);

            $response = $sg->client->mail()->send()->post($mail);
}

echo $response->statusCode();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0; URL='../apagardb.php'"/>
    <title></title>
    <style>
        h1{
            color: red;
            background-color: black;
        }
        div#msg{
            background-color: blue;
        }
    </style>
</head>
<body>
    
    </body>
</html>