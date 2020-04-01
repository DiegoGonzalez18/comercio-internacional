
$(window).ready(function(){

    $.ajax({
         //datos que se envian a traves de ajax
        url:   'slider', //archivo que recibe la peticion
        type:  'get', //método de envio
        beforeSend: function () {
                console.log("esperando");
        },
        success:  function (response) {
            a=response.sliders.data;
            cad="";
            for (x=0;x<a.length;x++){
                cad+="<li><img src= '" +a[x]['url'] + "'>" + "<span style='font-family: inherit; font-weight: bold;'" +a[x]['titulo'] + "</span></li>"
        }

        $('.pgwSlider').html(cad);
        console.log(cad);
        }
});
});

