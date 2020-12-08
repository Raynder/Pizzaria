<?php
session_start();
require("../_classes/conexao.php");
require_once ('src/PHPMailer.php');
require_once ('src/SMTP.php');
require_once ('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

/* $observ = "SELECT * FROM observacoes WHERE id_cliente = $id";
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
} */

//envio

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'raynder3@gmail.com';
    $mail->Password = 'villalobos@';
    $mail->Port = 587;

    $mail->setFrom('raynder3@gmail.com');
    $mail->addAddress('raynder4@gmail.com', 'Destinatario');

    $mail->isHTML(true);
    $mail->Subject = 'Teste de email';

    if($pizzax0 != '' && $pizzax1 == ''){
        $mail->Body = '<div> <b><h1>Dados do cliente</h1></b><br>Cliente: '.$cliente.'<br>Endereço: '.$endereco.'<br>Complemento: '.$complemento.'<br>Telefone: '.$telefone.'<br><br><b><h1>Pedidos</h1></b><br>Primeira pizza: '.$pizzax0.' X '.$pizzay0.'<br> Tamanho: '.$tam0.'<br>Borda: '.$borda0.' <br><br> <h1>Bebidas</h1><br>'.$bebida0.'<br>'.$bebida1.'<br>'.$bebida2.'<br><br><h1>Observações</h1><br><br>'.$obs1.'<br>'.$obs2.'<br>'.$obs3.'</div>';
    }
    if($pizzax0 != '' && $pizzax1 != '' && $pizzax2 == ''){
        $mail->Body = '<div> <b><h1>Dados do cliente</h1></b><br>Cliente: '.$cliente.'<br>Endereço: '.$endereco.'<br>Complemento: '.$complemento.'<br>Telefone: '.$telefone.'<br><br><b><h1>Pedidos</h1></b><br>Primeira pizza: '.$pizzax0.' X '.$pizzay0.'<br> Tamanho: '.$tam0.'<br>Borda: '.$borda0.' <br>Segunda pizza: '.$pizzax1.' X '.$pizzay1.'<br> Tamanho: '.$tam1.'<br>Borda: '.$borda1.' <br><br> <h1>Bebidas</h1><br>'.$bebida0.'<br>'.$bebida1.'<br>'.$bebida2.'<br><br><h1>Observações</h1><br><br>'.$obs1.'<br>'.$obs2.'<br>'.$obs3.'</div>';
    }
    if($pizzax0 != '' && $pizzax1 != '' && $pizzax2 != ''){
        $mail->Body = '<div> <b><h1>Dados do cliente</h1></b><br>Cliente: '.$cliente.'<br>Endereço: '.$endereco.'<br>Complemento: '.$complemento.'<br>Telefone: '.$telefone.'<br><br><b><h1>Pedidos</h1></b><br>Primeira pizza :'.$pizzax0.' X '.$pizzay0.'<br> Tamanho: '.$tam0.'<br>Borda: '.$borda0.' <br>Segunda pizza: '.$pizzax1.' X '.$pizzay1.'<br> Tamanho: '.$tam1.'<br>Borda: '.$borda1.' <br>Terceira pizza: '.$pizzax2.' X '.$pizzay2.'<br> Tamanho: '.$tam2.'<br>Borda: '.$borda2.' <br><br> <h1>Bebidas</h1><br>'.$bebida0.'<br>'.$bebida1.'<br>'.$bebida2.'<br><br><h1>Observações</h1><br><br>'.$obs1.'<br>'.$obs2.'<br>'.$obs3.'</div>';
    }



    if ($mail->send()){
        echo header("location: ../apagardb.php");
    }else{
        echo 'Email não enviado';
    }

} catch (Exception $e){
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}