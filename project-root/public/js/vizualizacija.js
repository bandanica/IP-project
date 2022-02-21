function iscrtavanjeGrafikona() {
    lok = document.getElementById('mikLok').value;
    div = document.getElementById('d3-container');
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        div.innerHTML = "";
        data = [];
        brojevi = JSON.parse(xhttp.responseText.split("\n")[0]);

        brojevi.forEach(jedan => {
            data.push({name: jedan.mesec, broj: jedan.prodato});
        })

        const width = 800;
        const height = 500;
        const margin = {top: 50, bottom: 50, left: 50, right: 50};


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
            .domain([0, d3.max(data, function (d) {
                return d.broj;
            })])
            .range([height - margin.bottom, margin.top])

        svg
            .append("g")
            .attr("fill", "#68c3d4")
            .selectAll("rect")
            .data(data)
            .join("rect")
            .attr("x", (d, i) => x(i))
            .attr("y", d => y(d.broj))
            .attr('title', (d) => d.broj)
            .attr("class", "rect")
            .attr("height", d => y(0) - y(d.broj))
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

    xhttp.open("GET", "/oglasivac/podaci?lokacija=" + lok, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();


}

window.onload = function () {
    ogl = document.getElementById('ogl').value;
    if (ogl === 'agent') {
        console.log(ogl);
        div = document.getElementById('d3-container');
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            div.innerHTML = "";
            data = [];
            brojevi = JSON.parse(xhttp.responseText.split("\n")[0]);
            brojevi.forEach(jedan => {
                data.push({name: jedan.mesec, broj: jedan.prodato});
            });
            const width = 800;
            const height = 500;
            const margin = {top: 50, bottom: 50, left: 50, right: 50};


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
                .domain([0, d3.max(data, function (d) {
                    return d.broj;
                })])
                .range([height - margin.bottom, margin.top])

            svg
                .append("g")
                .attr("fill", '#68c3d4')
                .selectAll("rect")
                .data(data)
                .join("rect")
                .attr("x", (d, i) => x(i))
                .attr("y", d => y(d.broj))
                .attr('title', (d) => d.broj)
                .attr("class", "rect")
                .attr("height", d => y(0) - y(d.broj))
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
    } else {
        iscrtavanjeGrafikona();
    }

}
