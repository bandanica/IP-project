window.addEventListener("load", () => {



    searchBox = document.getElementById("searchBox")
    searchBox.addEventListener("input", () => {
        zaPrikaz = pretraga.filter(s=>s.toLowerCase().includes(searchBox.value.toLowerCase()))
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
function save(lokacija){
    //console.log(lokacija)
    pretraga.push(lokacija);
}


