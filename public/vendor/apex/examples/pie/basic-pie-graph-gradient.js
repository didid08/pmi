var options = {
	chart: {
		width: 400,
		type: 'pie',
	},
	labels: ['Positif', 'Sembuh', 'Meninggal'],
	series: [20, 30, 30],
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
chart.render();