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

    xhttp.onload=function(){
        s = document.getElementById('povratnaPoruka');
        s.innerHTML = ""
        odgovor = xhttp.responseText.split("\n")[0];
        if (odgovor==="OK"){
            document.getElementById('dugmeOmiljene').disabled=true;
            document.getElementById('dugmeOmiljene').value="Dodato u omiljene";
        }else{
            s.innerHTML = "Doslo je do greske"
        }

    }


    xhttp.open("POST", "/korisnik/dodajUOmiljene", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("idNek=" + idNek);
    console.log(idNek);

}