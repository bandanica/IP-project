
function iscrtavanjeGrafikona(){
    lok = document.getElementById('mikLok').value;
    //console.log(lok);
    div = document.getElementById('d3-container');
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        div.innerHTML = "";
        data=[];
        brojevi = JSON.parse(xhttp.responseText.split("\n")[0]);

        brojevi.forEach(jedan => {
            data.push({name:jedan.mesec, score:jedan.prodato});
        })
        // const data=[
        //     {name:"Jan", score:80},
        //     {name:"Feb",score:100},
        //     {name:"Mart",score:60},
        //     {name:"April",score:80},
        //     {name:"Maj",score:100},
        //     {name:"Jun",score:50},
        //     {name: "Jul",score:70},
        //     {name:"Avg",score:80},
        //     {name:"Sept",score:100},
        //     {name:"Okt",score:120},
        //     {name:"Nov",score:110},
        //     {name:"Dec",score:100}
        // ];

        const width=800;
        const height=400;
        const margin={top:50, bottom:50, left:50,right:50};


        const svg = d3.select('#d3-container')
            .append('svg')
            .attr('width', width - margin.left - margin.right)
            .attr('height', height - margin.top - margin.bottom)
            .attr("viewBox", [0, 0, width, height]);


        const x = d3.scaleBand()
            .domain(d3.range(data.length))
            .range([margin.left, width - margin.right])
            .padding(0.3)

        const y = d3.scaleLinear()
            .domain([0, d3.max(data, function(d) { return d.score; })])
            .range([height - margin.bottom, margin.top])

        svg
            .append("g")
            .attr("fill", 'royalblue')
            .selectAll("rect")
            .data(data)
            .join("rect")
            .attr("x", (d, i) => x(i))
            .attr("y", d => y(d.score))
            .attr('title', (d) => d.score)
            .attr("class", "rect")
            .attr("height", d => y(0) - y(d.score))
            .attr("width", x.bandwidth());

        function yAxis(g) {
            g.attr("transform", `translate(${margin.left}, 0)`)
                .call(d3.axisLeft(y).ticks(null, data.format))
                .attr("font-size", '20px')
        }

        function xAxis(g) {
            g.attr("transform", `translate(0,${height - margin.bottom})`)
                .call(d3.axisBottom(x).tickFormat(i => data[i].name))
                .attr("font-size", '20px')
        }

        svg.append("g").call(xAxis);
        svg.append("g").call(yAxis);
        svg.node();


    }

    xhttp.open("GET", "/oglasivac/podaci?lokacija="+lok, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //poslati = "izabranTip=" + tip + "&cenaDO=" + cena + "&Lokacija=" + getSelectValues(lokacije).join("\t") + "&kvadrOD=" + kvadrat + "&brs=" + sobe;
    //console.log("lokacija=" + lok);
    //xhttp.send("lokacija=" + lok);
    xhttp.send();




}

window.onload=function(){
    ogl = document.getElementById('ogl').value;
    if (ogl==='agent'){
        console.log(ogl);
        div = document.getElementById('d3-container');
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            div.innerHTML = "";
            data=[];
            brojevi = JSON.parse(xhttp.responseText.split("\n")[0]);
            brojevi.forEach(jedan => {
                data.push({name:jedan.mesec, score:jedan.prodato});
            });
            const width=800;
            const height=400;
            const margin={top:50, bottom:50, left:50,right:50};


            const svg = d3.select('#d3-container')
                .append('svg')
                .attr('width', width - margin.left - margin.right)
                .attr('height', height - margin.top - margin.bottom)
                .attr("viewBox", [0, 0, width, height]);


            const x = d3.scaleBand()
                .domain(d3.range(data.length))
                .range([margin.left, width - margin.right])
                .padding(0.3)

            const y = d3.scaleLinear()
                .domain([0, d3.max(data, function(d) { return d.score; })])
                .range([height - margin.bottom, margin.top])

            svg
                .append("g")
                .attr("fill", 'royalblue')
                .selectAll("rect")
                .data(data)
                .join("rect")
                .attr("x", (d, i) => x(i))
                .attr("y", d => y(d.score))
                .attr('title', (d) => d.score)
                .attr("class", "rect")
                .attr("height", d => y(0) - y(d.score))
                .attr("width", x.bandwidth());

            function yAxis(g) {
                g.attr("transform", `translate(${margin.left}, 0)`)
                    .call(d3.axisLeft(y).ticks(null, data.format))
                    .attr("font-size", '20px')
            }

            function xAxis(g) {
                g.attr("transform", `translate(0,${height - margin.bottom})`)
                    .call(d3.axisBottom(x).tickFormat(i => data[i].name))
                    .attr("font-size", '20px')
            }

            svg.append("g").call(xAxis);
            svg.append("g").call(yAxis);
            svg.node();


        }

        xhttp.open("GET", "/oglasivac/podaci", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
    }
    else{
        iscrtavanjeGrafikona();
    }

}

function pocetniSadrzaj(ogl){


}