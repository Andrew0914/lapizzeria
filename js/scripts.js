$ = jQuery.noConflict();
$(document).ready(function(){

    // accion menu mobil
    $(".mobile-menu a").click(function(){
       $("nav.menu-sitio").toggle("slow");
    });

    // reaccionando al cambio de tamaño de pantalla
    var breakpoint = 768;
    $(window).resize(function(){
        if($(document).width() >= breakpoint){
            $("nav.menu-sitio").show();
        }else{
            $("nav.menu-sitio").hide();
        }
    });
    
});