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