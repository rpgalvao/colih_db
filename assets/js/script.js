$(function() {
    $('.telefone').mask('(99) 99999-9999');

    $('nav.mobile').click(function(){
        var listaMenu = $('nav.mobile ul');
        listaMenu.slideToggle();
    });
});