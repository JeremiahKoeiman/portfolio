function plus(){
    var x = parseFloat(document.getElementById('x').value);
    var y = parseFloat(document.getElementById('y').value);
    if (!isNaN(x) && !isNaN(y)){
        var antw = x + y;
        document.getElementById('divResult').innerHTML= x + ' + ' +  y +  ' = ' + antw;
    } else {
        document.getElementById('divResult').innerHTML="X en Y moeten een waarde hebben! \n En voer een getal in!";
    }
}

function minder(){
    var x = parseFloat(document.getElementById('x').value);
    var y = parseFloat(document.getElementById('y').value);
    if (!isNaN(x) && !isNaN(y)){
        var antw = x - y;
        document.getElementById('divResult').innerHTML= x + ' - ' +  y +  ' = ' + antw;
    } else {
        document.getElementById('divResult').innerHTML="X en Y moeten een waarde hebben! \n En voer een getal in!";
    }
}

function keer(){
    var x = parseFloat(document.getElementById('x').value);
    var y = parseFloat(document.getElementById('y').value);
    if (!isNaN(x) && !isNaN(y)){
        var antw = x * y;
        document.getElementById('divResult').innerHTML= x + ' * ' +  y +  ' = ' + antw;
    }else {
        document.getElementById('divResult').innerHTML="X en Y moeten een waarde hebben! \n En voer een getal in!";
    }
}

function delen(){
    var x = parseFloat(document.getElementById('x').value);
    var y = parseFloat(document.getElementById('y').value);
    if (!isNaN(x) && !isNaN(y) && y!==0){
        var antw = x / y;
        document.getElementById('divResult').innerHTML= x + ' / ' +  y +  ' = ' + antw;
        } else{
        document.getElementById('divResult').innerHTML="X en Y moeten een waarde hebben! \n En delen door nul kan niet!";
        }
}

function kwadraat(){
    var x = parseFloat(document.getElementById('x').value);
    var y = parseFloat(document.getElementById('y').value);
    if (!isNaN(x) && !y){
        var antw = x * x;
        document.getElementById('divResult').innerHTML='Het kwardaat van ' + x + ' is ' + antw;
    } else {
        document.getElementById('divResult').innerHTML='Y kan geen waarde hebben! \n En voer een getal in!';
    }

}

function macht(){
    var x = parseFloat(document.getElementById('x').value);
    var y = parseFloat(document.getElementById('y').value);
    if (!isNaN(x) && !isNaN(y)){
        var antw = Math.pow(x,y);
        document.getElementById('divResult').innerHTML= x+' tot de macht '+y+' is: '+antw;
    } else {
        document.getElementById('divResult').innerHTML='Voer een getal in! \n En voer een getal in!';
    }
}

function wortel(){
    var x = parseFloat(document.getElementById('x').value);
    var y = parseFloat(document.getElementById('y').value);
    if (!isNaN(x) && !y){
        if (x <= 0){
            document.getElementById('divResult').innerHTML="De wortel van 0 of lager kan niet berekend worden!";
        } else {
            var antw = Math.sqrt(x);
            var w = antw.toFixed(2);
            document.getElementById('divResult').innerHTML='De wortel van ' + x + ' is: ' + w;
        }
    }else {
        document.getElementById('divResult').innerHTML='Y kan geen waarde hebben! \n En voer een getal in!';
    }
}

function tafel(){
    var x = parseFloat(document.getElementById('x').value);
    var y = parseFloat(document.getElementById('y').value);

    if (!isNaN(x) && !y){
        for (var teller = 1; teller<=10;teller++) {
            document.getElementById('divResult').innerHTML+=teller+'*'+ x+ '='+ teller*x+ '<br>';
        }
    }else {
        document.getElementById('divResult').innerHTML='Y kan geen waarde hebben! \n En voer een getal in!';
    }
}