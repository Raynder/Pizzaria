<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Quase lá</title>
    <link type="text/css" rel="stylesheet" href="_css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="_css/style.css">
    <script type="text/javascript" src="_JS/"></script>

</head>
<body>

<div id="bebidas">
    <a href="#coca-lata"><img class="slide" src="_imagens/_bebidas/_mini/coca-lata.jpg"
                              onclick="det('cclt')"></a>
    <a href="#coca-600"><img class="slide" src="_imagens/_bebidas/_mini/coca-600.png"
                             onclick="det('cc600')"></a>
    <a href="#coca-2"><img class="slide" src="_imagens/_bebidas/_mini/coca-2.png" onclick="det('cc2')"></a>
    <a href="#gua-lata"><img class="slide" src="_imagens/_bebidas/_mini/guarana-lata.png" onclick="det('glt')"></a>
    <a href="#gua-2"><img class="slide" src="_imagens/_bebidas/_mini/guarana-2.png" onclick="det('g2')"></a>
    <a href="#gua-600"><img class="slide" src="_imagens/_bebidas/_mini/guarana-600.png"
                            onclick="det('g600')"></a>

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

</body>
</html>
<?php

if (isset($_POST['ref'])) {
    $beb1 = $_POST['ref'];
    if (!empty($beb1)) {

        $u->conectar("login_projeto", "localhost", "root", "");  //CONEXÃO
        #$u->conectar("id13702487_database","localhost", "id13702487_cardoso", "2GGxdwltfe2@");  //CONEXÃO


        if ($u->erro == '') {
            $u->adicionarbeb($beb1);
        } else {//Não deu certo

        }
    }
}
?>
