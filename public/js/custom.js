/* ======================================================================= */
/* === Menu Toggle / Recolher/Expandir =================================== */
/* === Desativado em 29/01/2019 ========================================== */
/* ======================================================================= */
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

/* ======================================================================= */
/* === Header Secundário / Topo Fixo ===================================== */
/* ======================================================================= */
$(document).ready(function() {
    $(window).scroll(function() {
        if($(window).scrollTop()>100) {
            $('nav').addClass('sticky-nav');
            $('.menu-custom').addClass('menu-custom-scroll');
        }else{
            $('nav').removeClass('sticky-nav');
            $('.menu-custom').removeClass('menu-custom-scroll');
        }
    });
}) ;

/* ======================================================================= */
/* ======================================================================= */
/* ======================================================================= */
$(document).ready(function(){
    $('.tabs').tabs();
});

/* ======================================================================= */
/* === Tooltips para botões: Alterar/Visualizar/Excluir ================== */
/* ======================================================================= */
$(document).ready(function(){
    $('.tooltipped').tooltip();
});

$(document).ready(function() {
    $('select').material_select();
});