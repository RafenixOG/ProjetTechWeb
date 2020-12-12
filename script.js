function couleur() {
    if (document.getElementById("estProf").value == 1) {
        document.getElementById("body").className = "prof";
        document.getElementById("bouton").className = "boutonProf";
    } else {
        document.getElementById("body").className = "eleve";
        document.getElementById("bouton").className = "boutonEleve";
    }
}