$(document).ready(function () {
	// 내 메뉴
	var options = {
		series: [70],
		colors: ['#42D8FF'],
		chart: {
			type: 'radialBar',
			sparkline: {
			enabled: true,
			}
		},
		plotOptions: {
			radialBar: {
				startAngle: -90,
				endAngle: 90,
				dataLabels: {
					name: {
					show: false
					},
					value: {
					offsetY: -2,
					fontSize: '200%',
					color: '#fff',
					}
				},
				hollow: {
				size: '100%',
				},
				track: {
				show: true,
				strokeWidth: '100%',
				background: '#999',
				opacity: .5,
				margin: -20,
				}
			}
		},
		};
		var chart = new ApexCharts(document.querySelector("#chart"), options);
		chart.render();
});


$(document).ready(function () {
	// 내 활동
	var options = {
		series: [80],
		colors: ['#00287A'],
		chart: {
			type: 'radialBar',
			sparkline: {
			enabled: true,
			}
		},
		plotOptions: {
			radialBar: {
				startAngle: -90,
				endAngle: 90,
				dataLabels: {
					name: {
					show: false
					},
					value: {
					offsetY: -2,
					fontSize: '200%',
					color: '#00287A',
					}
				},
				hollow: {
				size: '100%',
				},
				track: {
				show: true,
				strokeWidth: '100%',
				background: '#E5ECF4',
				opacity: .5,
				margin: -29,
				}
			}
		},
		};
		var myprogress01 = new ApexCharts(document.querySelector("#myprogress01"), options);
		var myprogress02 = new ApexCharts(document.querySelector("#myprogress02"), options);
		var myprogress03 = new ApexCharts(document.querySelector("#myprogress03"), options);
		myprogress01.render();
		myprogress02.render();
		myprogress03.render();
});