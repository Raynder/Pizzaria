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
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
    <link rel="stylesheet" type="text/css" href="_css/pedido.css">
    <script src="_JS/pedido.js"></script>
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
<body id="sistem">
<header id="cabeçalho2">

    <nav id="menu" class="navbar-collapse">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="pedir-pizza.php">Pedir Pizza</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
        <label class="canto">Bem Vindo(a) <?php echo $_SESSION['nome']; ?><a href="logout.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sair</a></label>

    </nav>
</header>
<div id="pedido">

    <div id="resumo">

    </div>
    <form method="post">
    <section id="mesa">
        <label for="ntam" class="tamanho"></label>
        <select name="ntam" id="itam">
            <option value="G" onclick="detalhar()">Pizza Grande</option>
            <option value="M">Pizza Média</option>
            <option value="P">Pizza Pequena</option>
        </select>
        <label for="nbor" class="bordas"></label>
        <select name="nbor">
            <option selected value=" ">Nenhuma Borda</option>
            <option value="Catupiri ">Borda de Catupiri</option>
        </select>
        <label id="titulo">Deseja remover algo?informe aqui:</label>
        <textarea placeholder="Dica: Sem cebola na de Calabresa e sem azeitona em todas." rows="7" name="obs"></textarea>
        <input type="button"  id="ok" value="OK" onclick="observacao()">
    </section>

    <section id="pizza">
        <img id="partee" src="_imagens/_sab/parte-e.png">
        <img id="parted" src="_imagens/_sab/parte-d.png">
    </section>

    <div id="sabor">
    <label for="nsab1" class="sabores"></label>

            <select onchange="mudaFoto(this.value)" name="nsab1" id="isab1">
                <option selected value="">Sabor 1</option>
                <option>Calabresa</option>
                <option>Bacon</option>
                <option>Atum</option>
                <option value="Frango_Catupiri">Frango Catupiri</option>
            </select>

            <label for="nsab2" class="sabores"></label>
            <select onchange="mudaFotod(this.value)" name="nsab2" id="isab2">
                <option selected value="">Sabor 2</option>
                <option>Calabresa</option>
                <option>Bacon</option>
                <option>Atum</option>
                <option value="Frango_Catupiri">Frango Catupiri</option>
            </select>
            <input id="botao" type="image" src="_imagens/confirmar.png">
        </form>


</div>
<div id="bebidas">
    <a href="#coca-lata"><img class="slide" src="_imagens/_bebidas/_mini/coca-lata.jpg" onclick="det('cclt')"></a>
    <a href="#coca-600"><img class="slide" src="_imagens/_bebidas/_mini/coca-600.png" onclick="det('cc600')"></a>
    <a href="#coca-2"><img class="slide" src="_imagens/_bebidas/_mini/coca-2.png" onclick="det('cc2')"></a>
    <a href="#gua-lata"><img class="slide" src="_imagens/_bebidas/_mini/guarana-lata.png" onclick="det('glt')"></a>
    <a href="#gua-2"><img class="slide" src="_imagens/_bebidas/_mini/guarana-2.png" onclick="det('g2')"></a>
    <a href="#gua-600"><img class="slide" src="_imagens/_bebidas/_mini/guarana-600.png" onclick="det('g600')"></a>

    <!--DIVS DAS IMAGENS -->

    <form method="post">
        <a name="coca-lata"></a>
        <div id="cclt" class="coca">
            <p><b>Coca-cola Lata</b></p>
            <img id="refri" src="_imagens/_bebidas/coca-lig.png"">
            <input type="text" value="Coca lata" name="ref">
            <input type="image" class="add" src="_imagens/adicionar.png" name="beb" value="Coca lata">
        </div>
    </form>
    <form method="post">
        <a name="coca-600"></a>
        <div id="cc600" class="coca">
            <p><b>Coca-cola 600ml</b></p>
            <img id="refri" src="_imagens/_bebidas/coca-600g.png">
            <input type="text" value="Coca 600" name="ref">
            <input type="image" class="add" src="_imagens/adicionar.png" name="beb" value="Coca 600">
        </div>
    </form>
    <form method="post">
        <a name="coca-2"></a>
        <div id="cc2" class="coca">
            <p><b>Coca-cola 2LT</b></p>
            <img id="refri" src="_imagens/_bebidas/coca-2lt.png">
            <input type="text" value="Coca 2Lt" name="ref">
            <input type="image" class="add" src="_imagens/adicionar.png" name="beb" value="Coca 2Lt">
        </div>
    </form>
    <form method="post">
        <a name="gua-lata"></a>
        <div id="glt" class="guarana">
            <p><b>Guarana Lata</b></p>
            <img id="refri" src="_imagens/_bebidas/guarana-lata.png">
            <input type="text" value="Guarana lata" name="ref">
            <input type="image" class="add" src="_imagens/add2.jpg" name="beb" value="Guarana lata">
        </div>
    </form>
    <form method="post">
        <a name="gua-2"></a>
        <div id="g2" class="guarana">
            <p><b>Guarana 2LT</b></p>
            <img id="refri" src="_imagens/_bebidas/guarana-2.png">
            <input type="text" value="Guarana 2Lt" name="ref">
            <input type="image" class="add" src="_imagens/add2.jpg" name="beb" value="Guarana 2Lt">
        </div>
    </form>
    <form method="post">
        <a name="gua-600"></a>
        <div id="g600" class="guarana">
            <p><b>Guarana 600ml</b></p>
            <img id="refri" src="_imagens/_bebidas/guarana-600.png">
            <input type="text" value="Guarana 600" name="ref">
            <input type="image" class="add" src="_imagens/add2.jpg">
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="_JS/sweetAlert.js"></script>
<?php
    global $nsab2;
    global $nsab1;
    global $tam;
    global $bor;

    if (isset($_POST['ref'])) {
        $beb1 = $_POST['ref'];
            if (!empty($beb1)){

                $u->conectar("login_projeto","localhost", "root", "");  //CONEXÃO
                #$u->conectar("id13702487_database","localhost", "id13702487_cardoso", "2GGxdwltfe2@");  //CONEXÃO


                if ($u->erro == ''){
                    $u->adicionarbeb($beb1);
                }else{//Não deu certo

                }
            }
    }

    if(isset($_POST['obs'])) {
        $obs = $_POST['obs'];
        if (!empty($obs)){
            $u->conectar("login_projeto","localhost", "root", "");  //CONEXÃO

            if ($u->erro == ''){
                $u->adicionarobs($obs);
            }
            else{

            }
        }
    }


    if(isset($_POST['nsab1'])){  //ver se foi preenchido algo em tal variavel

        $nsab1 = $_POST['nsab1']; //pegar a variavel do html e passar para o php
        $nsab2 = $_POST['nsab2'];
        $tam = $_POST['ntam'];
        $bor = $_POST['nbor'];
        $obs = $_POST['obs'];

        if(!empty($nsab1) && !empty($nsab2)){ //verificar se não estão vazias

            $u->conectar("login_projeto","localhost", "root", ""); // fazendo a conexão com o DB

            if($u->erro == ''){ //Deu certo

                $u->adicionar($nsab1, $nsab2, $tam, $bor); //adicionar ao DB

                ?>
                <div class="alerta">
                    <p>Pedido enviado com sucesso!</p>
                </div>
                <?php

            }else{ //Não deu certo

            }
        }else{
            ?>
            <div class="erro">
                <p>Escolha todos os Sabores!!</p>
            </div>
            <?php
        }
    }

?>
<div class="box" id="pedidos">
    <h1>Seus Pedidos</h1>
    <p>
        <?php
        require("_classes/conexao.php");

        $id = $_SESSION['id'];

        $pedidos = "SELECT * FROM pizzas WHERE id_cliente = $id";
        $con = $mysqli->query($pedidos) or die ($mysqli->error);

        while($dado = $con->fetch_array()){
            $id_pedido = $dado['id_pedido'];
            echo "Pizza ".$dado['tamanho']." sabor ".$dado['saborx']." com ".$dado['sabory'];
            ?>
            <a href="apagar_pizza.php?id=<?php echo $dado['id_pedido'];?>"><button type="button">remover</button></a><br>
            <?php
        }
        echo "<br><b>Bebidas</b><br><br>";
        $bebidas = "SELECT * FROM bebidas WHERE id_cliente = $id";
        $con = $mysqli->query($bebidas) or die ($mysqli->error);

        while($dado = $con->fetch_array()){
            $id_bebida = $dado['id_bebida'];
            echo $dado['nome_bebida'];
            ?>
            <a href="apagar_bebida.php?id=<?php echo $dado['id_bebida'];?>"><button type="button">remover</button></a><br>
            <?php
        }
        //FUNÇÃO PARA VERIFICAR SE JA OUVE PEDIDO
        $total = 0;
        $cont = "SELECT * FROM pizzas WHERE id_cliente = $id";
        $con = $mysqli->query($cont) or die ($mysqli->error);
        while ($con->fetch_array()){
            ++$total;
        }
        if ($total == 0){
            ?>
            <script> rotacao();</script>
            <?php
        }
        ?>

    </p>
    <a href="_php/enviar_email.php"><img id="finalizar" src="_imagens/finalizar.png"></a>



</div>

</body>
</html>