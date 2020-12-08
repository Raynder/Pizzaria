<?php
require_once '_classes/usuario.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="_css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="_JS/sweetAlert.js"></script>
    <title>Login</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        h1{
            color: white;
            text-align: center;
            padding: 20px;
            font-weight: bold;
        }
        a{
            text-decoration: none;
            color: white;
        }
        p{color: white}
        body{
            background-image: url("_imagens/fundo-login.png");
            background-position: 40% 10%;
        }
        #corpo{
            width: 420px;
            align-items: center;
        }
        input{
            outline: none;
            margin: 10px;
            display: block;
            height: 55px;
            width: 400px;
            border-radius: 30px;
            border: 1px solid white;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.0);
            color: white;
        }
        input[type=submit]{
            background-color: yellow;
            cursor: pointer;
            color: black;
        }
        ::-webkit-input-placeholder {
            color: white;
        }
        div#sucesso{
            width: 400px;
            margin: 10px auto;
            padding: 10px;
            background-color: rgba(50, 205, 50, .3);
            border: 1px solid rgb(34, 139, 34);
        }
        .msgerro{
            width: 420px;
            margin: 10px auto;
            padding: 10px;
            background-color: rgba(165, 128, 114, .3);
            border: 1px solid rgb(165, 42, 42);
        }
        @media (max-width: 991px){
            input{
                font-size: 60px;
                height: 120px;
                width: 100%;
            }
            h1{
                font-size: 120px;
            }
            p{
                font-size: 40px;
            }
            #corpo{
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div id="corpo" class="container text-center">
        <div class="col-lg-12"><h1>ENTRAR</h1>
            <form method="post" class="">

                <p class=""><input value="" type="text" placeholder="exemplo@hotmail.com" name="email"></p>
                <p class=""><input value="" type="password" placeholder="Digite a senha" name="senha"></p>
                <p class=""><a href="">Esqueceu sua senha?</a></p>
                <input class="logins" value="ENTRAR" type="submit">
                <p class="login">Não te uma conta? <a href="cadastre.php">Cadastre-se</a></p>
            </form>
        </div>
</div>


<?php
if (isset($_POST['email'])){

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    //verificar preenchimento de variaveis
    if (!empty($email) && !empty($senha)){

        $u->conectar("login_projeto","localhost", "root", ""); //CONEXÃO

        if ($u->msgErro == "") {

            if ($u->logar($email, $senha)) {
                ?>
                <meta http-equiv="refresh" content="1; URL='pedir-pizza2.php'"/>
                <?php

            } else {
                echo '<script> usrpass()</script>';
            }
        }else{
            ?>
            <div class="msgerro">
                <?php echo "Erro: $u->msgErro";?>
            </div>
            <?php

        }
    }else{
        echo '<script>campnull()</script>';
    }
}
?>
</body>
</html>
