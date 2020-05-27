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
        p{color: white;}
        body{
            background-image: url("_imagens/fundo-login.png");
            background-position: 40% 10%;
        }
        #corpo{
            width: 420px;
            margin: 110px auto 0px auto;
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
        input.esp {
            margin-bottom: 40px;
        }
        ::-webkit-input-placeholder {
            color: white;
        }
        input[type=submit]{
            background-color: yellow;
            cursor: pointer;
            color: black;
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
    <h1>CADASTRAR</h1>
    <form method="post" class="">

        <p><input value="" type="text" placeholder="Nome Completo" name="nome" maxlength="30"></p>
        <p><input class="esp" value="" type="text" placeholder="Telefone" name="telefone" maxlength="15"></p>
        <p><input value="" type="text" placeholder="endereco" name="endereco" maxlength="50"></p>
        <p><input class="esp" value="" type="text" placeholder="complemento" name="complemento" maxlength="50"></p>
        <p><input value="" type="email" placeholder="Usuario" name="email" maxlength="40"></p>
        <p><input value="" type="password" placeholder="Senha" name="senha" maxlength="15"></p>
        <p><input value="" type="password" placeholder="Confirmar Senha" name="confSenha" maxlength="15"></p>
        <input value="CADASTRAR" type="submit">
    </form>
</div>


<?php
//verificar tentativa de login
if (isset($_POST['nome'])){

    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $endereco = addslashes($_POST['endereco']);
    $complemento = addslashes($_POST['complemento']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confSenha = addslashes($_POST['confSenha']);
    //verificar preenchimento de variaveis
    if (!empty($nome) && !empty($telefone) && !empty($endereco) && !empty($complemento) && !empty($email) && !empty($senha) && !empty($confSenha)){

        $u->conectar("login_projeto","localhost", "root", ""); //CONEXÃO


        if ($u->msgErro == ""){
            if ($senha == $confSenha){
                if ($u->cadastrar($nome, $telefone, $endereco, $complemento, $email, $senha)){
                    ?>
                    <div id="sucesso">
                        Cadastrado com sucesso! <a href="login.php">Acesse para Logar</a>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div class="msgerro">
                        Email ja cadastrado
                    </div>
                    <?php
                }
            }
            else{
                ?>
                <div class="msgerro">
                    Senha e confirmar senha, não correspondem!
                </div>
                <?php
            }
        }
        else{
            ?>
            <div class="msgerro">
                <?php echo "Erro: .$u->msgErro";?>
            </div>
            <?php

        }
    }


    else{
        ?>
        <div class="msgerro">
            Preencha todos os campos!
        </div>
        <?php

    }
}

?>
</body>
</html>