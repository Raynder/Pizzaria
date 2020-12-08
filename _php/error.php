<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pedido Concluido!</title>
    <style>
        body{
            background-image: url("../_imagens/pedido-feito.jpg");
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
    <div id="texto"><h1>Desculpe!</h1>
        <h2>Houve um erro ao tentar fazer seu pedido!</h2>
        <h2>Peça pelo nosso <a>whatsapp</a>!</h2>
        <h3>Ou por nosso telefone 9 9999-8888</h3>
        <h2><a href="index.php">Voltar a Pagina principal</a></h2></div>
    </div>
</body>
</html>