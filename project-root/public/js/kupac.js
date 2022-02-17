window.addEventListener("load", () => {


    searchBox = document.getElementById("searchBox")
    searchBox.addEventListener("input", () => {
        zaPrikaz = pretraga.filter(s => s.toLowerCase().includes(searchBox.value.toLowerCase()))
        //console.log(zaPrikaz)
        list = document.getElementById("suggestionsList")
        //list.inneHTML = ""
        while (list.firstChild) {
            list.removeChild(list.firstChild);
        }
        zaPrikaz.forEach(element => {
            var li = document.createElement("li")
            var a = document.createElement("a")
            // ovako se postavi link za pretragu
            //a.href = "nesto"
            a.innerHTML = element
            li.appendChild(a)
            list.appendChild(li)
        });
    })
})

pretraga = []

function save(lokacija) {
    //console.log(lokacija)
    pretraga.push(lokacija);
}


function NadjiNekretnine() {
    tip = document.getElementById('izabranTip').value;
    lokacije = document.getElementById('Lokacija');
    cena = document.getElementById('cenaDO').value;
    kvadrat = document.getElementById('kvadrOD').value;
    sobe = document.getElementById('brs').value;
    lista = document.getElementById('prikazN');
    // lokacije.forEach(element => console.log(element));

    // getSelectValues(lokacije));

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        lista.innerHTML = "";
        nekretnine = JSON.parse(xhttp.responseText.split("\n")[0]);
        nekretnine.forEach(oglas => {
            lista.innerHTML = lista.innerHTML + oglas.html;
        })

    }

    xhttp.open("POST", "/korisnik/pretragaNekretnine", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    poslati = "izabranTip=" + tip + "&cenaDO=" + cena + "&Lokacija=" + getSelectValues(lokacije).join("\t") + "&kvadrOD=" + kvadrat + "&brs=" + sobe;
    //console.log(poslati)
    xhttp.send(poslati);
}

function promenaStrane(broj){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        lista.innerHTML = "";
        nekretnine = JSON.parse(xhttp.responseText.split("\n")[0]);
        nekretnine.forEach(oglas => {
            lista.innerHTML = lista.innerHTML + oglas.html;
        })

    }
    xhttp.open("POST", "/korisnik/promenaStranice", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("page=" + broj);
}

function getSelectValues(select) {
    var result = [];
    var options = select && select.options;
    var opt;

    for (var i = 0, iLen = options.length; i < iLen; i++) {
        opt = options[i];

        if (opt.selected) {
            result.push(opt.value || opt.text);
        }
    }
    return result;
}