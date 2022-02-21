function f(greske = "", podaciOk = true) {
    //console.log("log");
    //podaciOk = true;
    //greske = "";

    ime = document.getElementsByName('ime')[0].value;
    prezime = document.getElementsByName('prez')[0].value;
    korime = document.getElementsByName('korime')[0].value;
    grad = document.getElementsByName('gradici')[0].value;
    lozinka = document.getElementsByName('loz')[0].value;
    datum = document.getElementsByName('rodjenje')[0].value;
    telefon = document.getElementsByName('tel')[0].value;
    mejl = document.getElementsByName('mejl')[0].value;
    //tipkor = document.getElementsByName('tip');
    tip = '';
    if (document.getElementById('kupac').checked) {
        console.log(document.getElementById('kupac').value);
        document.getElementById("agencija").hidden = true;
        //document.getElementsByName('brlicence').style.display=true;
        tip = 'kupac';
    } else if (document.getElementById('samostalni prodavac').checked) {
        console.log(document.getElementById('samostalni prodavac').value);
        document.getElementById("agencija").hidden = true;
        tip = 'prodavac';
    } else if (document.getElementById('agent').checked) {
        console.log(document.getElementById('agent').value);
        document.getElementById("agencija").hidden = false;
        tip = 'agent';
    }



    console.log(ime, prezime, korime, grad, lozinka, datum, telefon, mejl);
    if (ime === '' || prezime === '' || korime === '' || grad === '' || lozinka === '' || telefon === '' || mejl === '' || tip === '') {
        greske = greske.concat("Sva polja su obavezna!");
        podaciOk = false;
    }

    if (podaciOk) {
        document.getElementById("regDugme").disabled = false;
    }
    //ovo postavlja poruku greske ukoliko postoje
    document.getElementById("regGreske").innerHTML = greske;

}

function proveraMejla() {
    podaciOk = true;
    greske = "";
    document.getElementById("regGreske").innerHTML = greske;
    mejl = document.getElementsByName('mejl')[0].value;
    regMejl = /^\w+@\w\.\w{2,3}$/;
    if (!regMejl.test(mejl)) {
        greske = greske.concat("Mejl nije dobar!\n")
        podaciOk = false;
    }
    //if (podaciOk) {
    //    document.getElementById("regDugme").disabled = false;
    //}
    //document.getElementById("regGreske").innerHTML = greske;
    f(greske, podaciOk);
}

function proveraLozinke() {
    podaciOk = true;
    greske = "";
    document.getElementById("regGreske").innerHTML = greske;
    lozinka = document.getElementsByName('loz')[0].value;
    //regLozinka = new RegExp("^(((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])).{8,})");


    regLozinka = /^(([A-Z]|[a-z])+((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])).{8,})$/;
    regBroj = /([0-9])+/;
    regMaloSlovo = /([a-z])+/;
    regVelSlovo = /([A-Z])+/;
    regKarkter = /([!@#$%^&\\*])+/;
    regDuzinaPocetak = /^([A-Z]|[a-z]){1}.{7,}$/;

    if (!regBroj.test(lozinka) || !regMaloSlovo.test(lozinka) || !regKarkter.test(lozinka) || !regVelSlovo.test(lozinka) || !regDuzinaPocetak.test(lozinka)) {
        greske = greske.concat("Lozinka nije u dobrom formatu!<br/>")
        podaciOk = false;
    }
    if (!regBroj.test(lozinka)) {
        greske = greske.concat("Lozinka mora imati bar jednu cifru<br/>");
    }
    if (!regDuzinaPocetak.test(lozinka)) {
        greske = greske.concat("Lozinka mora imati bar 8 karaktera<br/> i pocinjati slovom<br/>");
    }
    if (!regMaloSlovo.test(lozinka)) {
        greske = greske.concat("Lozinka mora imati bar jedno malo slovo<br/>");
    }
    if (!regVelSlovo.test(lozinka)) {
        greske = greske.concat("Lozinka mora imati bar jedno veliko slovo<br/>");
    }
    if (!regKarkter.test(lozinka)) {
        greske = greske.concat("Lozinka mora imati bar jedan spec. karakter<br/>");
    }
    // if (podaciOk) {
    //     document.getElementById("regDugme").disabled = false;
    // }
    // document.getElementById("regGreske").innerHTML = greske;
    f(greske, podaciOk);
}

function promenaTipa() {

    if (document.getElementById('samostalni prodavac').checked) {
        console.log(document.getElementById('samostalni prodavac').value);
        document.getElementById("ListaAgencija").disabled = true;
        document.getElementById("brlicence").disabled = true;
        //tip='prodavac';
    } else if (document.getElementById('agent').checked) {
        console.log(document.getElementById('agent').value);
        document.getElementById("ListaAgencija").disabled = false;
        document.getElementById("brlicence").disabled = false;
        //tip='agent';
    }
}

