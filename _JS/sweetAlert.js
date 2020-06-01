function rotacao() {
    Swal.fire({
        title: '<span>Vire o celular para o modo paisagem para uma melhor vizualização.</span>',
        background: '#5e0000',

        customClass:{
            popup: 'branco',
        },

        imageUrl: '_imagens/rotacionar.png',
        imageWidth: '100%',
    });
};
function observacao() {
    Swal.fire({
        icon: 'success',
        title: '<span>Ao clicar em pedir pizza sua observação sera salva.</span>',
        background: '#5e0000',

        customClass:{
            popup: 'branco',
        },
    });
}

//ALERTAS DA PAGINA DE LOGIN E CADASTRO!!

function usrpass() {
    Swal.fire({
        icon: 'error',
        title: '<span>Email e/ou senha estão incorretos!</span>',
        background: '#dcd71f',

        customClass:{
            popup: 'branco',
        },
    });
}
function campnull() {
    Swal.fire({
        icon: 'info',
        title: '<span>Preencha todos os campos!</span>',
        background: '#dcd71f',

        customClass:{
            popup: 'branco',
        },
    });
}
function accontsave() {
    Swal.fire({
        icon: 'sucess',
        title: '<span>Cadastro feito com sucesso!</span>',
        background: '#dcd71f',

        customClass:{
            popup: 'branco',
        },
    });
}
function alreadyexist() {
    Swal.fire({
        icon: 'info',
        title: '<span>Email ja cadastrado<br>Tente outro!</span>',
        background: '#dcd71f',

        customClass:{
            popup: 'branco',
        },
    });
}
function notmatch() {
    Swal.fire({
        icon: 'error',
        title: '<span>Senha e confirmar senha não correspondem!</span>',
        background: '#dcd71f',

        customClass:{
            popup: 'branco',
        },
    });
}

//ALERTAS DA PAGINA DE PEDIR PIZZA!!

function pedidofeito() {
    Swal.fire({
        icon: 'sucess',
        title: 'Seu pedido foi adicionado!',
        background: '#5e0000',
    })
}
function marksabor() {
    Swal.fire({
        icon: 'info',
        title: 'Escolha todos os sabores',
        background: '#5e0000',
    })
}