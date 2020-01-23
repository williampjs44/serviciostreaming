$(document).ready(function(){
    // gestion pestañas
    $('#perfiles a').click(function(){
        var h= $(this).attr('href');
        $('#detalle > div').hide();
        $(h).show();
    });
    $(".izquierda").click(function(e){
        moverSlide(e, 'izquierda');
    });
    $(".derecha").click(function(e){
        moverSlide(e, 'derecha');
    });
});

function moverSlide(e, direccion){
        e.stopPropagation();
        e.preventDefault();
        var l = $(".slide li").length;
        var u = $(".slide").css("left");
//        console.log(u.substr(0, u.length-2));
        var un = u.substr(0, u.length-2);
        var nuevoleft = 0;
        if(direccion == 'izquierda'){
            nuevoleft = parseFloat(un)-210;
    //        console.log(un,' y ',nuevoleft);
            if(nuevoleft <= -1*l*210){
                nuevoleft = 0;
            }            
        }
        else {
            nuevoleft = parseFloat(un)+210;
            if(nuevoleft >= 0){
                nuevoleft = 0;
            }            
        }
        nuevoleft = nuevoleft+"px";
//        console.log(nuevoleft);
        $(".slide").animate({left: nuevoleft}, 200); 
    if(nuevoleft == 0){
        $(".derecha").css("opacity",0.1);
    }
    else {
        $(".derecha").css("opacity",1);
    }
}