function f(greske="",podaci=true) {
    //console.log("log");
    //podaciOk = true;
    //greske = "";
    // ovde napisati proveru da li su podaci okej
    ime = document.getElementsByName('ime')[0].value;
    prezime = document.getElementsByName('prez')[0].value;
    korime = document.getElementsByName('korime')[0].value;
    grad = document.getElementsByName('gradici')[0].value;
    lozinka = document.getElementsByName('loz')[0].value;
    datum = document.getElementsByName('rodjenje')[0].value;
    telefon = document.getElementsByName('tel')[0].value;
    mejl = document.getElementsByName('mejl')[0].value;
    console.log(ime,prezime,korime,grad,lozinka,datum,telefon,mejl);
    if (ime==='' || prezime==='' || korime==='' || grad==='' || lozinka==='' || telefon==='' || mejl===''){
        greske=greske.concat("Sva polja su obavezna!");
        podaciOk=false;
    }

    if (podaciOk) {
        document.getElementById("regDugme").disabled = false;
    }
    //ovo postavlja poruku greske ukoliko postoje
    document.getElementById("regGreske").innerHTML = greske;

}
function proveraMejla(){
    podaciOk = true;
    greske="";
    document.getElementById("regGreske").innerHTML = greske;
    mejl = document.getElementsByName('mejl')[0].value;
    regMejl = /^\w+@\w\.\w{2,3}$/;
    if (!regMejl.test(mejl)){
        greske = greske.concat("Mejl nije dobar!\n")
        podaciOk=false;
    }
    if (podaciOk) {
        document.getElementById("regDugme").disabled = false;
    }
    document.getElementById("regGreske").innerHTML = greske;
    f(greske,podaciOk);
}

function proveraLozinke(){
    podaciOk=true;
    greske="";
    document.getElementById("regGreske").innerHTML = greske;
    lozinka=document.getElementsByName('loz')[0].value;
    //regLozinka = new RegExp("^(((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])).{8,})");

    //DODATI SPECIJALNE KARAKTERE
    regLozinka = /^(([A-Z]|[a-z])+((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])).{8,})$/;
    if (!regLozinka.test(lozinka)){
        greske = greske.concat("Lozinka nije u dobrom formatu!\n")
        podaciOk=false;
    }
    if (podaciOk) {
        document.getElementById("regDugme").disabled = false;
    }
    document.getElementById("regGreske").innerHTML = greske;
    f(greske,podaciOk);
}