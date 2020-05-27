function mudaFoto(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado esquerdo*/

    var x = "_imagens/_sab/"+foto+"-e.png";
    document.getElementById("partee").src = x;
}
function mudaFotod(foto) { /* Essa função faz a mudança da imagem que aparece na pizza do lado direito*/

    var x = "_imagens/_sab/"+foto+"-d.png";
    document.getElementById("parted").src = x;
}
function mudaref(foto) { /* Essa função faz a mudança do refrigerante*/

    var x = "_imagens/_bebidas/"+foto+".png";
    document.getElementById("refri").src = x;
}

