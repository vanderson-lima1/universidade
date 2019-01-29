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
<<<<<<< HEAD
  });

var tabela = document.querySelector("#menu-index");

tabela.addEventListener("click", function(event) {
    //event.preventDefault();
    var aclicado = event.target;
    console.log(this);
    console.log(aclicado);
    //event.submit();
    aclicado.classList.add("menu-custom-active");        
=======
});

$(document).ready(function(){
    if($('#link-active-1')) {
        $('#link-active-1').addClass('menu-custom-active');
    }    
>>>>>>> ceb7deb7c45d26bd1d8042b386dd81aaafe027ab
});
