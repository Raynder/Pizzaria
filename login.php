<?php
require_once '_classes/usuario.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
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
            margin: 150px auto 0px auto;
        }
        input{
            outline: none;
            margin: 10px;
            display: block;
            height: 55px;
            width: 400px;
            border-radius: 30px;
            border: 1px solid white;
            font-size: 16pt;
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
    </style>
</head>
<body>
        <div id="corpo">
            <h1>ENTRAR</h1>
            <form method="post" class="">

                <p><input value="" type="text" placeholder="exemplo@hotmail.com" name="email"></p>
                <p><input value="" type="password" placeholder="Digite a senha" name="senha"></p>
                <p><a href="">Esqueceu sua senha?</a></p>
                <input value="ENTRAR" type="submit">
                <p>Não te uma conta? <a href="cadastre.php">Cadastre-se</a></p>
            </form>
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
                <meta http-equiv="refresh" content="1; URL='pedir-pizza.php'"/>
                <?php

            } else {
                ?>
                <div class="msgerro">
                    Email e/ou senha estão incorretos!
                </div>
                <?php
            }
        }else{
            ?>
            <div class="msgerro">
                <?php echo "Erro: $u->msgErro";?>
            </div>
            <?php

        }
    }else{
        ?>
        <div class="msgerro">
            preencha todos os campos!
        </div>
        <?php
    }
}
?>
</body>
</html>
