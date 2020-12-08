<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>adicionar bebida</title>

</head>
<body>
<h1>ola mundo</h1>
<?php
require_once '_classes/pedidos.php';

session_start();
$u = new Pedido;
$id = $_SESSION['id'];
$bebida = $_GET['beb'];

echo 'adicionando ao id '.$id.' a '.$bebida.'!!';

$u->conectar("login_projeto", "localhost", "root", "");  //CONEXÃO

if ($u->erro == '') {
    $u->adicionarbeb($bebida);
}

echo header("location: pedir-pizza2.php");
?>
</body>
</html>
