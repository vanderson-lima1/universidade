$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

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

$(document).ready(function(){
    $('.tabs').tabs();
});

$(document).ready(function(){
    $('.tooltipped').tooltip();
});
