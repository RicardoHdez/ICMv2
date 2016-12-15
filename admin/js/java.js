function texto(texto){
    var tecla = (document.all) ? texto.keyCode : texto.which;
    if (tecla==8) return true;
    patron =/[A-Za-z ]/;
    var te = String.fromCharCode(tecla);
    return patron.test(te);
}

function justNumbers(e){
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
    return true;     
    return /\d/.test(String.fromCharCode(keynum));
}