
function morrisBarchart1() {

	/*---- morrisBarchart1----*/
	new Morris.Donut({
		element: 'morrisBarchart1',
		data: [{
			value: 23,
			label: 'Completed'
		}, {
			value: 16,
			label: 'In Progress'
		},  {
			value: 15,
			label: 'Not Completed'
		}, {
			value: 5,
			label: 'Not Started'
		}],
		resize: true,
		backgroundColor: 'transparent',
		fontFamily:'poppins',
		labelColor: '#2f4c7d',
		colors: ['#1cc5ef', myVarVal, '#24e4ac', "#ec447c"],
		formatter: function(x) {
			return x + "%"
		}
	}).on('click', function(i, row) {
		console.log(i, row);

	});
	if (document.querySelectorAll('#morrisBarchart1 svg').length >= 2) {	
		let svgs = document.querySelectorAll('#morrisBarchart1 svg')	
		for (var i = 0; i <= svgs.length - 1; i++) {	
			if (i == 0) {	
			}	
			else {	
				svgs[i].remove()	
			}	
		}	
	}	

}


/*-----Chart-----*/
function learnerschart() {
	var options = {
		chart: {
			height: 361,
			type: 'bar',
			toolbar: {
				show: false,
			}
		},
		plotOptions: {
			bar: {
				horizontal: true,
				dataLabels: {
				position: 'top',
			},
		}
		},
		dataLabels: {
			enabled: true,
			offsetX: -14,
			style: {
				fontSize: '12px',
				colors: ['#fff']
			}
		},
		series: [{
			data: [123, 255, 141, 364, 422, 143, 321, 444, 255, 141, 264, 122]
		}],
		xaxis: {
			categories: ['January', 'February', 'March', 'April ', 'May',  'June', 'July', 'August', 'September', 'October', 'November', 'December'],
			labels: {
				show: true,
				style: {
				color: '#adb5be',
				  fontSize: '11px',
				  fontFamily: 'Poppins, Arial, sans-serif',
				  fontWeight: 400,
				  cssClass: 'apexcharts-xaxis-label',
				},
			},
		},
		yaxis: {
			labels: {
				show: true,
				style: {
				color: '#adb5be',
				  fontSize: '11px',
				  fontFamily: 'Poppins, Arial, sans-serif',
				  fontWeight: 400,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
		},
		fill: {
		type: 'gradient',
		gradient: {
			shade: 'dark',
			gradientToColors: [myVarVal, '#765be6'],
			shadeIntensity: 5,
			inverseColors: true,
			type: 'horizontal',
			opacityFrom: .9,
			opacityTo: .9,
		},
		},
		grid: {
			borderColor: 'rgba(112, 131, 171, .1)',
			xaxis: {
				lines: {
					show: true,
					borderColor: 'rgba(112, 131, 171, .1)',
				}
			},
			yaxis: {
				lines: {
					show: false,
				}
			},
			padding: {
			top: 0,
			right: 0,
			bottom: 0,
			left: 10
			},
		},
	}
	document.getElementById('learners').innerHTML = '';
	var chart = new ApexCharts(
		document.querySelector("#learners"), options);
	chart.render();
};
/*---- Chart8----*/