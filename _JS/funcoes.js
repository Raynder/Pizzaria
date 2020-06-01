function mostrar(){
    if (document.getElementById('menu').style.display == 'block'){
        document.getElementById('menu').style.display='none';
    }
    else {
        document.getElementById('menu').style.display='block';
    }
}
function mostrarbeb(){
    if (document.getElementById('bebidas').style.display == 'block'){
        document.getElementById('bebidas').style.display='none';
    }
    else {
        document.getElementById('bebidas').style.display='block';
    }
}
function test(vari) {
    console.log(vari);

}
function adicionarbeb(beb) {
    Swal.fire({
        title: 'Deseja adicionar um(a) '+beb+'?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, adicionar!'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Feito!',
                'Sua bebida foi adicionada!',
                'success'
            )
            window.location.href="addbebida.php?beb="+beb;
        }
    })

}