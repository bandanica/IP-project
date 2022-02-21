function proveraL() {
    podaciOk = true;
    greske = "";
    lozinka = document.getElementsByName('novaL')[0].value;

    regBroj = /([0-9])+/;
    regMaloSlovo = /([a-z])+/;
    regVelSlovo = /([A-Z])+/;
    regKarkter = /([!@#$%^&*\\.+])+/;
    regDuzinaPocetak = /^([A-Z]|[a-z]){1}.{7,}$/;

    if (!regBroj.test(lozinka) || !regMaloSlovo.test(lozinka) || !regKarkter.test(lozinka) || !regVelSlovo.test(lozinka) || !regDuzinaPocetak.test(lozinka)) {
        greske = greske.concat("Lozinka nije u dobrom formatu!<br/>")
        podaciOk = false;
    }

    document.getElementById("novaLGreske").innerHTML = greske;
}

function jednakostL(){
    podaciOk = true;
    greske = "";
    //document.getElementById("novaLGreske").innerHTML = greske;
    l1 = document.getElementsByName('novaL')[0].value;
    l2 = document.getElementsByName('potvrdaL')[0].value;
    if (l1!==l2){
        greske = greske.concat("Potvrda lozinke i nova lozinka nisu iste<br/>")
        podaciOk = false;
    }
    if (podaciOk) {
        document.getElementById("dugmeLoz").disabled = false;
    }
    document.getElementById("novaLGreske").innerHTML = greske;
}