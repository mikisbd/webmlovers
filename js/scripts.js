$(function(){

    // Menú responsive
    $('.button-collapse').sideNav();

    // Copia al portapapeles los enlaces
    $('#copia-gif-uno').click(function(){
        $(this).css("color","red");
        copyToClipboard('ta-gif-uno');
        Materialize.toast('Image URL copiada', 4000);
    });
    $('#copia-gif-dos').click(function(){
        $(this).css("color","red");
        copyToClipboard('ta-gif-dos');
        Materialize.toast('HTML Code copiado', 4000);
    });
    $('#copia-webm-uno').click(function(){
        $(this).css("color","red");
        copyToClipboard('ta-webm-uno');
        Materialize.toast('Video URL copiada', 4000);
    });
    $('#copia-webm-dos').click(function(){
        $(this).css("color","red");
        copyToClipboard('ta-webm-dos');
        Materialize.toast('HTML Code copiado', 4000);
    });
    $('#copia-url-uno').click(function(){
        $(this).css("color","red");
        copyToClipboard('ta-url-uno');
        Materialize.toast('Image URL copiado', 4000);
    });
    $('#copia-url-dos').click(function(){
        $(this).css("color","red");
        copyToClipboard('ta-url-dos');
        Materialize.toast('HTML Code copiado', 4000);
    });
    $('#copia-url-tres').click(function(){
        $(this).css("color","red");
        copyToClipboard('ta-url-tres');
        Materialize.toast('Video URL copiado', 4000);
    });
    $('#copia-url-cuatro').click(function(){
        $(this).css("color","red");
        copyToClipboard('ta-url-cuatro');
        Materialize.toast('HTML Code copiado', 4000);
    });

    // Formulario de contacto
    var $contactform    = $('#contactform'),
        $success        = "<h5 class='alert-box success'>Tu mensaje se ha enviado correctamente</b></h5><br>";
        
    $contactform.submit(function(){
        $.ajax({
           type: "POST",
           url: "upload/contact.php",
           data: $(this).serialize(),
           success: function(msg)
           {
                if(msg == 'SEND'){
                    response = '<div class="alert-box success">'+ $success +'</div>';
                }
                else{
                    response = '<div class="alert-box error">'+ msg +'</div>';
                }
                $(".error,.success").remove();
                $contactform.prepend(response);
            }
         });
        return false;
    }); 

});

function copyToClipboard(elementId) {
    var aux = document.createElement("input");
    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
}



