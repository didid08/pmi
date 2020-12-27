$(function(){

    $.getJSON('http://localhost/api-corona/provinsi-positif.php', function(covidPositiveData){
        $('#peta-covid-indonesia').vectorMap({
            map: 'indonesia-adm1_merc',
            zoomOnScroll: true,
            series: {
                regions: [{
                    values: covidPositiveData,
                    scale: ['#FF7777', '#FF3333', '#AA0000', '#EE0000', '#CC0000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: 'transparent',
            onRegionTipShow: function(e, el, code){
                el.html(el.html()+' (Positif - '+covidPositiveData[code]+')');
            }
        });
    });

    //Pie
    var options = {
        chart: {
            width: 350,
            type: 'pie',
        },
        labels: ['Positif', 'Sembuh', 'Meninggal'],
        series: [],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
        stroke: {
            width: 0,
        },
        fill: {
            type: 'gradient',
        },
        colors: ['#aa0000', '#cc0000', '#ee0000', '#ff3333', '#ff7777'],
    }
    var chart = new ApexCharts(
        document.querySelector("#bagan-covid-indonesia"),
        options
    );

    $.getJSON('https://jsonp.afeld.me/?callback=?&url=https://api.kawalcorona.com/indonesia', function(covidData2){
        chart.updateSeries([
            parseInt(covidData2[0].positif.replace(',', '')),
            parseInt(covidData2[0].sembuh.replace(',', '')),
            parseInt(covidData2[0].meninggal.replace(',', ''))
        ]);
    });
    
    chart.render();
});