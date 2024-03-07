$(function(e) {

	/*widget2 */
	document.querySelector(".canvasw2").innerHTML = '<canvas id="widget2" class=""></canvas>';
	var ctx = document.getElementById("widget2");
	var myChart = new Chart(ctx, {
		type: 'line',
		tooltipFillColor: "rgba(51, 51, 51, 0.55)",
		data: {
			labels: ["Mon", "Tues", "Wed", "Thur", "Fri", "Sat", "Sun"],
			type: 'line',
			datasets: [{
				label: "Total Uninstalled",
				data: [45, 55, 42, 67, 49, 62, 52],
				backgroundColor: 'rgba(89, 200, 227,0.3)',
				fill: true,
				borderColor: '#1cc5ef',
				borderWidth: 1,
				pointStyle: 'circle',
				pointRadius: 0,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#1cc5ef',
				lineTension: 0.28,
				
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			interaction: {
				intersect: false,
				mode: 'index',
			},
			plugins: {
				legend: {
					display: false,
				},
				tooltip: {
					enabled: true
				}			
			},
			scales: {
				x: {
					display: false,
					grid: {
						color: 'rgba(112, 131, 171, .2)'
					},
				},
				y: {
					display: false,
					grid: {
						display: false,
						drawBorder: true
					},
				}
			},
		}
	});
	/*widget2*/

});

function appwidget1() {
	document.querySelector(".canvasw").innerHTML = '<canvas id="widget1" class=""></canvas>';
	if ($('#widget1').length) {
		var ctx = document.getElementById("widget1");
		var myChart = new Chart(ctx, {
			type: 'line',
			tooltipFillColor: "rgba(51, 51, 51, 0.55)",
			data: {
				labels: ["Mon", "Tues", "Wed", "Thur", "Fri", "Sat", "Sun"],
				type: 'line',
				datasets: [{
					label: "Total Active Users",
					data: [45, 55, 32, 67, 49, 72, 52],
					backgroundColor: hexToRgba(myVarVal, 0.3),
					fill: true,
					borderColor: [myVarVal],
					borderWidth: 1,
					pointStyle: 'circle',
					pointRadius: 0,
					pointBorderColor: 'transparent',
					pointBackgroundColor: [myVarVal],
					lineTension: 0.28,
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				interaction: {
					intersect: false,
					mode: 'index',
				},
				plugins: {
					legend: {
						display: false,
					},
				},
				scales: {
					x: {
						display: false,
						grid: {
							color: 'rgba(112, 131, 171, .1)'
						},
						scaleLabel: {
							display: false,
							labelString: '',
							fontColor: '#a7b4c9'
						}
					},
					y: {
						display: false,
						grid: {
							display: false,
							drawBorder: true
						},
						scaleLabel: {
							display: false,
							labelString: 'Customer retention in %',
							fontColor: '#a7b4c9'
						}
					}
				},
				title: {
					display: false,
					text: 'Normal Legend'
				}
			}
		});
	}
}

function devices() {

	/* Chartjs (#devices) */
	document.querySelector(".chart-wrapperD").innerHTML = '<canvas id="devices" class=""></canvas>';
	var myCanvas = document.getElementById("devices");
	myCanvas.height = 384;
	var myCanvasContext = myCanvas.getContext("2d");
	var gradientStroke1 = myCanvasContext.createLinearGradient(0, 0, 0, 500);
	gradientStroke1.addColorStop(0, hexToRgba(myVarVal, 0.8));

	var gradientStroke2 = myCanvasContext.createLinearGradient(0, 0, 0, 390);
	gradientStroke2.addColorStop(0, 'rgba(28, 197, 239,0.8)');

	var gradientStroke3 = myCanvasContext.createLinearGradient(0, 0, 0, 390);
	gradientStroke3.addColorStop(0, 'rgba(36, 228, 172,0.8)');

	var ctx = document.getElementById("devices").getContext("2d");
		new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "June" , "July"],
			datasets: [{
				label: 'Android',
				data: [3, 3, 7, 4, 6, 3, 5, 3, 5, 3,4,14],
				barThickness: 25,
				backgroundColor: gradientStroke1,
				borderWidth: 1,
				hoverBackgroundColor: gradientStroke1,
				hoverBorderWidth: 0,
				borderColor: gradientStroke1,
				hoverBorderColor: 'gradientStroke1',
				lineTension: .3,
				pointBorderWidth: 0,
				pointHoverRadius: 4,
				pointHoverBorderColor: "gradientStroke1",
				pointHoverBorderWidth: 0,
				pointRadius: 0,
				pointHitRadius: 0,
			}, {

				label: 'Windows',
				data: [7, 6, 10, 6, 8, 10, 9, 5, 10, 4],
				barThickness: 25,
				backgroundColor: gradientStroke2,
				borderWidth: 1,
				hoverBackgroundColor: gradientStroke2,
				hoverBorderWidth: 0,
				borderColor: gradientStroke2,
				hoverBorderColor: 'gradientStroke2',
				lineTension: .3,
				pointBorderWidth: 0,
				pointHoverRadius: 4,
				pointHoverBorderColor: "gradientStroke2",
				pointHoverBorderWidth: 0,
				pointRadius: 0,
				pointHitRadius: 0,
			},
			{

				label: 'Mac',
				data: [12, 12, 12, 12, 12, 12, 12, 12, 12, 12],
				barThickness: 25,
				backgroundColor: gradientStroke3,
				borderWidth: 1,
				hoverBackgroundColor: gradientStroke3,
				hoverBorderWidth: 0,
				borderColor: gradientStroke3,
				hoverBorderColor: 'gradientStroke3',
				lineTension: .3,
				pointBorderWidth: 0,
				pointHoverRadius: 4,
				pointHoverBorderColor: "gradientStroke3",
				pointHoverBorderWidth: 0,
				pointRadius: 0,
				pointHitRadius: 0,
			}
		]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			layout: {
				padding: {
					left: 0,
					right: 0,
					top: 0,
					bottom: 0
				}
			},
			scales: {
				y: {
					
					stacked: true,
					display: true,
					grid: {
						display: true,
						color: "rgba(112, 131, 171, .1)",
					},
					ticks: {
						color: "#a7b4c9"
					},
				},
				x: {
					
					barPercentage: 0.2,
					barValueSpacing :3,
					barDatasetSpacing : 3,
					stacked: true,
					ticks: {
						color: "#a7b4c9",
						font: {
							family: 'Poppins', // Your font family
						},
					},
					grid: {
						color: "rgba(167, 180, 201 ,0.1)",
						display: true
					},

				}
			},
			plugins: {
				legend: {
					display: true,
					labels: {
						color: "#a7b4c9",
						usePointStyle: true,
						padding: 20,
						boxWidth: 5,
						font: {
							family: 'Poppins'
						}
					},
				},			
			},
		}
	});
	/* Chartjs (#devices) closed */

}

function totalInstalled() {

	/* Chartjs (#total-coversations) */
	document.querySelector(".chart-wrapper3").innerHTML = '<canvas id="total-Installed" class="w-100 h-230"></canvas>';
	var ctx = document.getElementById('total-Installed').getContext('2d');
	ctx.height = 100;	
		new Chart(ctx, {
		type: 'line',
		tooltipFillColor: "rgba(51, 51, 51, 0.55)",
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: "Total-Uninstalled",
				backgroundColor: hexToRgba(myVarVal, 0.1),
				fill: true,
				borderColor: [myVarVal],
				borderWidth: 2,
                pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
				lineTension: 0.28,
				data: [0, 50, 5, 100, 50, 130, 100, 140]
			}]
		},
		options: {
			maintainAspectRatio: false,
			responsive: true,
			plugins: {
				legend: {
					display: false,
				},
				tooltip: {
					enabled: true
				}			
			},
			scales: {
				x: {
					grid: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						color: '#a7b4c9',
						font: {
							family: 'Poppins'
						}
					}
				},
				y: {
					display:false,
					ticks: {
						display: false,
					}
				}
			},
		}
	});
	/* Chartjs (#total-coversations) closed */

}