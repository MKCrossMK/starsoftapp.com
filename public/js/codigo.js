var product = 15;

function display() {
    document.getElementById("cedula_rnc").value = product;
}


document.addEventListener("DOMContentLoaded", function(event) {



});



function datos() {
    var Hola = 'Hola';

    var options = {
        data: ["blue", "green", "pink", "red", "yellow"]
    };


    $('#cedula_rnc').val(Hola);




}

$(function() {
    var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ];
    $("#cedula_rnc").autocomplete({
        source: availableTags
    });
});