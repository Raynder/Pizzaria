<?php
require_once '_classes/pedidos.php';
$u = new Pedido;
global $nsab1;
global $nsab2;
session_start();
if (!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pizzaria Cardoso</title>
    <link rel="stylesheet" type="text/css" href="_css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="_css/style.css">
    <script src="_JS/pedido.js"></script>
    <script type="text/javascript" src="_JS/funcoes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="_JS/sweetAlert.js"></script>
    <script>
        var num;
        num = 0;
        function  incrementar(et) {
            num= num +1;
            et.value = num;
        }


        function det(ident) {
            if (ident == 'cclt'){
                document.getElementById(ident).style.display = 'block';
                document.getElementById('cc600').style.display = 'none';
                document.getElementById('cc2').style.display = 'none';
                document.getElementById('glt').style.display = 'none';
                document.getElementById('g600').style.display = 'none';
                document.getElementById('g2').style.display = 'none';
            }if (ident == 'cc600'){
                document.getElementById(ident).style.display = 'block';
                document.getElementById('cclt').style.display = 'none';
                document.getElementById('cc2').style.display = 'none';
                document.getElementById('glt').style.display = 'none';
                document.getElementById('g600').style.display = 'none';
                document.getElementById('g2').style.display = 'none';
            }if (ident == 'cc2'){
                document.getElementById(ident).style.display = 'block';
                document.getElementById('cclt').style.display = 'none';
                document.getElementById('cc600').style.display = 'none';
                document.getElementById('glt').style.display = 'none';
                document.getElementById('g600').style.display = 'none';
                document.getElementById('g2').style.display = 'none';
            }if (ident == 'glt'){
                document.getElementById(ident).style.display = 'block';
                document.getElementById('cclt').style.display = 'none';
                document.getElementById('cc600').style.display = 'none';
                document.getElementById('cc2').style.display = 'none';
                document.getElementById('g600').style.display = 'none';
                document.getElementById('g2').style.display = 'none';
            }if (ident == 'g600'){
                document.getElementById(ident).style.display = 'block';
                document.getElementById('cclt').style.display = 'none';
                document.getElementById('cc600').style.display = 'none';
                document.getElementById('cc2').style.display = 'none';
                document.getElementById('glt').style.display = 'none';
                document.getElementById('g2').style.display = 'none';
            }if (ident == 'g2'){
                document.getElementById(ident).style.display = 'block';
                document.getElementById('cclt').style.display = 'none';
                document.getElementById('cc600').style.display = 'none';
                document.getElementById('cc2').style.display = 'none';
                document.getElementById('glt').style.display = 'none';
                document.getElementById('g600').style.display = 'none';
            }

        }

    </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a><img src="_imagens/icone.png" class="icone" width="80" height="60"></a>

    <label >Bem Vindo(a) <?php echo $_SESSION['nome']; ?></label>

    <button onclick="mostrar()" class="navbar-toggler bt-menu" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="index.html" class="nav-link">HOME</a>
            </li>
            <li class="nav-item">
                <a href="pedir-pizza2.php" class="nav-link">PEDIR PIZZA</a>
            </li>
            <li class="nav-item">
                <a href="contato.php" class="nav-link">CONTATO</a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sair</a>
            </li>
        </ul>
    </div>



</nav>
<!--SESSÃO DE OPÇOES-->
<div class="container-fluid conteudo">

    <div class="row">

        <section class="Opcoes col-lg-4">

            <form method="post">
                <div class="col-lg-12">
                    <label for="ntam" class="tamanho"></label>

                    <select class="entrada" name="ntam" id="itam">
                        <option value="G" onclick="detalhar()">Pizza Grande</option>
                        <option value="M">Pizza Média</option>
                        <option value="P">Pizza Pequena</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <label for="nbor" class="bordas"></label>

                    <select name="nbor" class="entrada">
                        <option selected value=" ">Nenhuma Borda</option>
                        <option value="Catupiri ">Borda de Catupiri</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <label id="titulo"><p>Deseja remover algo?<br>informe aqui:</p></label>
                </div>
                <div class="col-lg-12">

                <textarea id="entrada-text" class="entrada"
                          placeholder="Dica: Sem cebola na de Calabresa e sem azeitona em todas." rows="7"
                          name="obs"></textarea>
                    <input class="entrada" type="button" id="ok" value="OK" onclick="showbeb()">
                </div>



        </section>

        <section class="mesa col-lg-4">


                <div id="pizza" class="row">


                    <select onchange="mudaFoto(this.value)" name="nsab1" id="isab1" class="entrada-hidden">
                        <optgroup>
                            <option selected value="">Sabor 1</option>
                            <option>Calabresa</option>
                            <option>Bacon</option>
                            <option>Atum</option>
                            <option value="Frango_Catupiri">Frango Catupiri</option>
                        </optgroup>
                    </select>

                    <img id="partee" class="bandeja" src="_imagens/_sab/parte-e.png">
                    <img id="parted" class="bandeja" src="_imagens/_sab/parte-d.png">

                    <select onchange="mudaFotod(this.value)" name="nsab2" id="isab2" class="entrada-hidden right">
                        <optgroup>
                            <option selected value="">Sabor 2</option>
                            <option>Calabresa</option>
                            <option>Bacon</option>
                            <option>Atum</option>
                            <option value="Frango_Catupiri">Frango Catupiri</option>
                        </optgroup>

                    </select>
                </div>

                <!--BOTÃO DE PEDIR PIZZA, E VALOR DO PEDIDO -->
                <div class="row">
                    <input class="botao-pedir col-lg-6 col-md-6 col-sm-6 col-6" type="image" src="_imagens/confirmar.png">

                    <valor class="col-lg-6 col-md-6 col-sm-6 col-6 right"><h2>R$30,00</h2></valor>
                </div>
            </form>


        </section>

        <section class="pedidos col-lg-4">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <script src="_JS/sweetAlert.js"></script>

            <!-- SALVAMENTO DO PEDIDO NO BANCO DE DADOS -->
            <?php
            global $nsab2;
            global $nsab1;
            global $tam;
            global $bor;


            if (isset($_POST['obs'])) {
                $obs = $_POST['obs'];
                if (!empty($obs)) {
                    $u->conectar("login_projeto", "localhost", "root", "");  //CONEXÃO

                    if ($u->erro == '') {
                        $u->adicionarobs($obs);
                    } else {

                    }
                }
            }


            if (isset($_POST['nsab1'])) {  //ver se foi preenchido algo em tal variavel

                $nsab1 = $_POST['nsab1']; //pegar a variavel do html e passar para o php
                $nsab2 = $_POST['nsab2'];
                $tam = $_POST['ntam'];
                $bor = $_POST['nbor'];
                $obs = $_POST['obs'];

                if (!empty($nsab1) && !empty($nsab2)) { //verificar se não estão vazias

                    $u->conectar("login_projeto", "localhost", "root", ""); // fazendo a conexão com o DB

                    if ($u->erro == '') { //Deu certo

                        $u->adicionar($nsab1, $nsab2, $tam, $bor); //adicionar ao DB

                        echo '<script>pedidofeito()</script>';

                    } else { //Não deu certo

                    }
                } else {

                    echo '<script>marksabor()</script>';

                }
            }

            ?>
            <!--FIM DO SALVAMENTO -->

            <!-- DEMOSTRAÇÃO DOS PEDIDOS FEITOS -->

            <div class="box">
                <!-- DIVISÃO PARA MOSTRAR BEBIDAS PEDIDAS -->
                <h1 class="text-center s_pedido">SEUS PEDIDOS</h1>
                <p>
                    <?php
                    require("_classes/conexao.php");

                    $id = $_SESSION['id'];

                    $pedidos = "SELECT * FROM pizzas WHERE id_cliente = $id";
                    $con = $mysqli->query($pedidos) or die ($mysqli->error);

                    while ($dado = $con->fetch_array()) {
                    $id_pedido = $dado['id_pedido'];
                    if ($dado['saborx'] == $dado['sabory']){
                    ?>
                <p class="inteiro">
                    <?php
                    echo "Pizza " . $dado['tamanho'] . " sabor " . $dado['saborx'];
                    }
                    else{
                    ?>
                <p class="inteiro">
                    <?php
                    echo "Pizza " . $dado['tamanho'] . " sabor " . $dado['saborx'] . " X " . $dado['sabory'];
                    }

                    ?>
                    <a href="apagar_pizza.php?id=<?php echo $dado['id_pedido']; ?>">
                        <button type="button" class="direito">remover</button></a>
                </p><br>
                <?php
                }
                //DIVISÃO PARA MOSTRAR BEBIDAS PEDIDAS

                echo "<br><b><h1 class='text-center s_pedido'>BEBIDAS</h1></b><br><br>";
                $bebidas = "SELECT * FROM bebidas WHERE id_cliente = $id";
                $con = $mysqli->query($bebidas) or die ($mysqli->error);

                while ($dado = $con->fetch_array()) {
                    $id_bebida = $dado['id_bebida'];
                    ?>
                    <p class="inteiro">
                        <?php
                        echo $dado['nome_bebida'];
                        ?>
                        <a href="apagar_bebida.php?id=<?php echo $dado['id_bebida']; ?>">
                            <button type="button" class="direito">remover</button></a></p><br>
                    <?php
                }
                //FUNÇÃO PARA VERIFICAR SE JA OUVE PEDIDO
                $total = 0;
                $cont = "SELECT * FROM pizzas WHERE id_cliente = $id";
                $con = $mysqli->query($cont) or die ($mysqli->error);
                while ($con->fetch_array()) {
                    ++$total;
                }
                if ($total == 0) {
                    ?>
                    <script> rotacao();</script>
                    <?php
                }
                ?>

                </p>
                <a href="_php/enviar_email.php"><img id="finalizar" class="col-lg-6 bottom" src="_imagens/finalizar.png" width="100%"></a>


            </div>

            <!--FIM DA DEMOSTRAÇÃO -->

        </section>

        <input id="carrinho" class="hidden" type="checkbox">

        <section class="lateral">
            <label for="carrinho"><img id="car" src="_imagens/bebida.png" onclick="mostrarbeb()" width="80" height="80"></label>

            <div class="container-fluid">
                <div id="bebidas" class="row">
                    <a href="#coca-lata"><img class="slide"
                                              src="_imagens/_bebidas/_mini/coca-lata.jpg"
                                              onclick="adicionarbeb('Coca_lata')"></a>
                    <a href="#coca-600"><img class="slide"
                                             src="_imagens/_bebidas/_mini/coca-600.png"
                                             onclick="adicionarbeb('Coca_600ml')"></a>
                    <a href="#coca-2"><img class="slide"
                                           src="_imagens/_bebidas/_mini/coca-2.png" onclick="adicionarbeb('Coca_2lt')"></a>
                    <a href="#gua-lata"><img class="slide"
                                             src="_imagens/_bebidas/_mini/guarana-lata.png" onclick="adicionarbeb('Guarana_lata')"></a>
                    <a href="#gua-2"><img class="slide"
                                          src="_imagens/_bebidas/_mini/guarana-2.png" onclick="adicionarbeb('Guarana_2lt')"></a>
                    <a href="#gua-600"><img class="slide"
                                            src="_imagens/_bebidas/_mini/guarana-600.png"
                                            onclick="adicionarbeb('Guarana_600ml')"></a>

                </div>
            </div>

        </section>


    </div>
</div>

</body>
</html>
