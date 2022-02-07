function promenaGrad(){
    g = document.getElementsByName('gr')[0].value;
    document.getElementById('op').hidden=false;
    o = document.getElementById('opst');

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        o.innerHTML = "";
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