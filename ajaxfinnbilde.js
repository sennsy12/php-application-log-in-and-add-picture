/* ajax-finn-fag */
function finn(bildenr) { 
    var foresporsel = new XMLHttpRequest(); /* oppretter request-objekt */

    foresporsel.onreadystatechange = function () {
        if (foresporsel.readyState == 4 && foresporsel.status == 200) /* responsen er fullført og vellykket */ {
            var svar = foresporsel.responseText;
            /* responsteksten legges i variabelen svar */
            var del = svar.split(";");
            var filnavn = del[1];
            var beskrivelse = del[2];
            document.getElementById("filnavn").value = filnavn;
            document.getElementById("beskrivelse").value = beskrivelse;
        }
    }
    foresporsel.open("GET", "ajaxfinnbilde.php?bildenr=" + bildenr);
    foresporsel.send(); /* sender en request */
}