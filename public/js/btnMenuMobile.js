
$(document).ready(function(){
    $("#btn-abrir-menu-mobile").click(function(){
        $("#menu-mobile").removeClass("hide").addClass("show");
        $("#btn-abrir-menu-mobile, #btn-fechar-menu-mobile").toggle(); // Alterna a visibilidade dos botões de menu e fechar
    });

    $("#btn-fechar-menu-mobile").click(function(){
        $("#menu-mobile").addClass("hide").removeClass("show");
        $("#btn-abrir-menu-mobile, #btn-fechar-menu-mobile").toggle();
    });
});