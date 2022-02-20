function promenaGrad(){
    prevoz();
    g = document.getElementsByName('gr')[0].value;
    //document.getElementById('op').hidden=false;
    o = document.getElementById('opst');
    ml=document.getElementById('lok');
    u=document.getElementById('ul');
    //prevoz = document.getElementsByName('prevozi[]')[0];
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        ml.innerHTML = "";
        o.innerHTML = "";
        u.innerHTML = "";
        opstine =  JSON.parse(xhttp.responseText.split("\n")[0]);
        opstine.forEach(opstina=>{
            let newOption = new Option(opstina.naziv,opstina.idO);
            o.add(newOption,undefined);
        })
        

    }
    xhttp.open("POST", "/oglasivac/opstineugradu", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // unutar bodija se nalaze parametri za prosledjivanje;
    // tip stringa je
    // name1=value1?name2=value2?name3?value3
    // u php kodu pomocu getVar("nameX") dobijas valueX, kad kad saljes pomocu forme
    xhttp.send("idgrad=" + g);
    console.log(g);


}

function promenaOpstina(){
    ops = document.getElementById('opst').value;
    ml=document.getElementById('lok');
    u=document.getElementById('ul');
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        ml.innerHTML = "";
        u.innerHTML = "";
        lokacije =  JSON.parse(xhttp.responseText.split("\n")[0]);
        lokacije.forEach(mlokacija=>{
            let newOption = new Option(mlokacija.naziv,mlokacija.idL);
            ml.add(newOption,undefined);
        })
        
    }
    xhttp.open("POST", "/oglasivac/lokacijeuopstini", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // unutar bodija se nalaze parametri za prosledjivanje;
    // tip stringa je
    // name1=value1?name2=value2?name3?value3
    // u php kodu pomocu getVar("nameX") dobijas valueX, kad kad saljes pomocu forme
    xhttp.send("idO=" + ops);
    console.log(ops);
}

function promenaLokacije(){
    l = document.getElementById('lok').value;
    u=document.getElementById('ul');
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        u.innerHTML = "";
        ulice =  JSON.parse(xhttp.responseText.split("\n")[0]);
        ulice.forEach(ulica=>{
            let newOption = new Option(ulica.naziv,ulica.idU);
            u.add(newOption,undefined);
        })
    }
    xhttp.open("POST", "/oglasivac/uliceNaLokaciji", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // unutar bodija se nalaze parametri za prosledjivanje;
    // tip stringa je
    // name1=value1?name2=value2?name3?value3
    // u php kodu pomocu getVar("nameX") dobijas valueX, kad kad saljes pomocu forme
    xhttp.send("idL=" + l);
    console.log(l);
}

function proveraOpisa(){
    opis = document.getElementsByName('opisNek')[0].value;
    brojReci = opis.split(' ').length;
    console.log(brojReci);
    if (brojReci>50){
        document.getElementById('zavDugme').disabled=true;
    }
    else{
        document.getElementById('zavDugme').disabled=false;
    }
}

function prevoz(){
    g = document.getElementsByName('gr')[0].value;
    linije = document.getElementById('Glinije');
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        linije.innerHTML = "";
        grl =  JSON.parse(xhttp.responseText.split("\n")[0]);
        grl.forEach(linija=>{
            console.log(linija.broj);
            let newOption = new Option(linija.broj,linija.idL);
            linije.add(newOption,undefined);
        })

    }
    xhttp.open("POST", "/oglasivac/linijeprevoza", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // unutar bodija se nalaze parametri za prosledjivanje;
    // tip stringa je
    // name1=value1?name2=value2?name3?value3
    // u php kodu pomocu getVar("nameX") dobijas valueX, kad kad saljes pomocu forme
    xhttp.send("idgrad=" + g);
    //console.log(g);
}

function createOption(option, label) {
    var option = document.createElement("option");
    option.setAttribute("value", option);
    option.innerHTML = label;

    return option;
}