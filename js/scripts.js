jQ = jQuery.noConflict();
jQ(document).ready(function(){

    // accion menu mobil
    jQ(".mobile-menu a").click(function(){
       jQ("nav.menu-sitio").toggle("slow");
    });

    // reaccionando al cambio de tamaño de pantalla
    var breakpoint = 768;
    jQ(window).resize(function(){
        if(jQ(document).width() >= breakpoint){
            jQ("nav.menu-sitio").show();
        }else{
            jQ("nav.menu-sitio").hide();
        }
    });

    // GALERIA FLUID BOX
    jQ('.gallery a').each(function() {
        jQ(this).attr({'data-fluidbox': ''});
    });
    
    if(jQ('[data-fluidbox]').length > 0 ) {
        jQ('[data-fluidbox]').fluidbox();
    }
    
});