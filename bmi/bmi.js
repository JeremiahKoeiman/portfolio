function bmi() {
    var lengte = document.getElementById('lengte').value;
    var gewicht = document.getElementById('gewicht').value;
    var tantw = "";


    if (!lengte || !gewicht) {
        document.getElementById('uitkomst').innerHTML= "Vul een waarde in!";
        wis();
    } else if (isNaN(lengte) || isNaN(gewicht)) {
        document.getElementById('uitkomst').innerHTML = "U kunt alleen getallen invoeren";
        wis();
    } else {
        tantw = gewicht / (lengte * lengte);
        antw = tantw.toFixed(2);

        document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>";

        if (antw < 18.5) {
            document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>" + "U heeft ondergewicht.";
        } else if (antw > 18.5 && antw <= 24.9) {
            document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>" + "U heeft een normaal gewicht.";
        } else if (antw > 24.9 && antw <= 29.9) {
            document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>" + "U heeft overgewicht.";
        } else if (antw > 29.9 && antw <= 34.9) {
            document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>" + "U heeft obesitas.";
        }else {
            document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>" + "U heeft extreme obesitas!";
        }

        /*if (antw > 18.5 && antw < 24.9) {
            document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>" + "U heeft een gezond en normaal gewicht.";
        } else if (antw > 25 && antw < 29.9) {
            document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>" + "U heeft overgewicht.";
        } else if (antw > 30) {
            document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>" + "U heeft obesitas.";
        } else {
            document.getElementById('uitkomst').innerHTML = "BMI is " + antw + "<br>" + "U heeft ondergewicht!";
        }*/
    }
}

function wis() {
    document.getElementById('lengte').value = "";
    document.getElementById('lengte').placeholder = "0";
    document.getElementById('lengte').focus();
    document.getElementById('gewicht').value = "";
    document.getElementById('gewicht').placeholder = "0";
}