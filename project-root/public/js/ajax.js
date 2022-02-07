window.addEventListener('load', function () {

    document.getElementById("tekst").innerHTML = "neki tekst";
    document.getElementById("tekst2").innerHTML = "neki tekst";
    document.getElementById("dugme").addEventListener("click", function () {
        console.log("klik");
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            //ovo split treba samo zbog debug rezima
            sviKorisnici = JSON.parse(xhttp.responseText.split("\n")[0]);

            //json.parse parsira string koji je u json formatu i vraca niz objekata koji je pronasao
            // sviKorisnici je niz objekata, svaki objekat sadrzi polje ime i moze mu se pristupiti sa objekat.ime

            tekst = "";
            sviKorisnici.forEach(korisnik => {
                console.log(korisnik.ime)
                tekst = tekst + korisnik.ime + "<br\>";
            })
            document.getElementById("tekst").innerHTML = tekst;
        }
        xhttp.open("GET", "/ajax/korisnici", true);
        xhttp.send();
    });
    document.getElementById("dugme2").addEventListener("click", function () {
        console.log("klik2");
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            //ovo split treba samo zbog debug rezima
            odgovor = xhttp.responseText.split("\n")[0];
            document.getElementById("tekst2").innerHTML = odgovor;
        }
        xhttp.open("POST", "/ajax/korisnik", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // unutar bodija se nalaze parametri za prosledjivanje;
        // tip stringa je
        // name1=value1?name2=value2?name3?value3
        // u php kodu pomocu getVar("nameX") dobijas valueX, kad kad saljes pomocu forme
        xhttp.send("id=" + document.getElementById("id").value);
    });


})