function prikazTelefona(){
    if (document.getElementById('brTel').hidden===true){
        document.getElementById('brTel').hidden=false;
    }
    else{
        document.getElementById('brTel').hidden=true;
    }
}

function dodavaljeOmiljene(idNek){
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/korisnik/dodajUOmiljene", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("idNek=" + idNek);
    console.log(idNek);

}