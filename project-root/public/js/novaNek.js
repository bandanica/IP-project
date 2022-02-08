function promenaGrad(){
    g = document.getElementsByName('gr')[0].value;
    //document.getElementById('op').hidden=false;
    o = document.getElementById('opst');
    ml=document.getElementById('lok');
    u=document.getElementById('ul');

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