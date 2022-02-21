function promenaGrad() {
    g = document.getElementsByName('gr')[0].value;
    //document.getElementById('op').hidden=false;
    o = document.getElementById('opst');

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        o.innerHTML = "";
        opstine = JSON.parse(xhttp.responseText.split("\n")[0]);
        opstine.forEach(opstina => {
            let newOption = new Option(opstina.naziv, opstina.idO);
            o.add(newOption, undefined);
        })

    }
    xhttp.open("POST", "/administrator/opstineugradu", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // unutar bodija se nalaze parametri za prosledjivanje;
    // tip stringa je
    // name1=value1?name2=value2?name3?value3
    // u php kodu pomocu getVar("nameX") dobijas valueX, kad kad saljes pomocu forme
    xhttp.send("idgrad=" + g);
    console.log(g);


}

function promenaOpstina() {
    ops = document.getElementById('opst').value;
    ml = document.getElementById('lok');

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        ml.innerHTML = "";
        lokacije = JSON.parse(xhttp.responseText.split("\n")[0]);
        lokacije.forEach(mlokacija => {
            let newOption = new Option(mlokacija.naziv, mlokacija.idL);
            ml.add(newOption, undefined);
        })
    }
    xhttp.open("POST", "/administrator/lokacijeuopstini", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // unutar bodija se nalaze parametri za prosledjivanje;
    // tip stringa je
    // name1=value1?name2=value2?name3?value3
    // u php kodu pomocu getVar("nameX") dobijas valueX, kad kad saljes pomocu forme
    xhttp.send("idO=" + ops);
    console.log(ops);
}

function promenaTipa() {
    d = document.getElementById("agencija");
    b = document.getElementById("ListaAgencija");
    c = document.getElementById("idlicence");
    if (document.getElementById('agent').checked) {
        d.hidden = false
        d.disabled = false
        b.hidden = false
        b.disabled = false
        c.hidden = false
        c.disabled = false
    } else {
        d.hidden = true
        d.disabled = true
        b.hidden = true
        b.disabled = true
        c.hidden = true
        c.disabled = true
    }
}

function klik() {
    moze = document.getElementsByName('ime')[0].value !== "";
    console.log(moze);
    moze = moze && document.getElementsByName('prez')[0].value !== "";
    console.log(moze);
    moze = moze && document.getElementsByName('korime')[0].value !== "";
    console.log(moze);
    moze = moze && document.getElementsByName('gradici')[0].value !== "";
    console.log(moze);
    moze = moze && document.getElementsByName('rodjenje')[0].value !== "";
    console.log(moze);
    moze = moze && document.getElementsByName('tel')[0].value !== "";
    console.log(moze);
    document.getElementById("regDugme").disabled = !moze;
    document.getElementById('regGreske').innerHTML = "";
    if (!moze) {
        document.getElementById('regGreske').innerHTML = "Sva polja su obavezna";
    }
}