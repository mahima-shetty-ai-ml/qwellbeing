$(document).ready(function() {
	
	// Bar Chart

	var barChartData = {
		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor: 'rgba(0, 158, 251, 0.5)',
			borderColor: 'rgba(0, 158, 251, 1)',
			borderWidth: 1,
			data: [35, 59, 80, 81, 56, 55, 40]
		}, {
			label: 'Dataset 2',
			backgroundColor: 'rgba(255, 188, 53, 0.5)',
			borderColor: 'rgba(255, 188, 53, 1)',
			borderWidth: 1,
			data: [28, 48, 40, 19, 86, 27, 90]
		}]
	};

	var ctx = document.getElementById('bargraph').getContext('2d');
	window.myBar = new Chart(ctx, {
		type: 'bar',
		data: barChartData,
		options: {
			responsive: true,
			legend: {
				display: false,
			}
		}
	});

		// Bar Chart 2
	
		barChart();
    
		$(window).resize(function(){
			barChart();
		});
		
		function barChart(){
			$('.bar-chart').find('.item-progress').each(function(){
				var itemProgress = $(this),
				itemProgressWidth = $(this).parent().width() * ($(this).data('percent') / 100);
				itemProgress.css('width', itemProgressWidth);
			});
		};
	});

	// Line Chart Oxygen

	var lineChartData = {
		labels: ["Day 1", "Day 2", "day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day10", "Day 11","Day 12","Day 13","Day 14"],
		datasets: [{
			label: "Oxygen level",
			backgroundColor: "rgba(0, 158, 251, 0.5)",
			data: [98, 98, 95, 90, 80, 78, 78, 85, 90, 88, 95, 98, 97, 98]
		}]
	};
	
	var linectx = document.getElementById('linegraph').getContext('2d');
	window.myLine = new Chart(linectx, {
		type: 'line',
		data: lineChartData,
		options: {
			responsive: true,
			legend: {
				display: false,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
			}
		}
	});

    //line chart for temperature
	var lineChartData1 = {
		labels: ["Day 1", "Day 2", "day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day10", "Day 11","Day 12","Day 13","Day 14"],
		datasets: [{
			label: "Temperature",
			backgroundColor: "rgba(255, 143, 143, 0.637)",
			data: [105, 104, 105, 103, 100, 101, 99, 100, 99, 98, 98, 98, 99, 98]
		}]
	};
	
	var line1ctx = document.getElementById('linegraph1').getContext('2d');
	window.myLine = new Chart(line1ctx, {
		type: 'line',
		data: lineChartData1,
		options: {
			responsive: true,
			legend: {
				display: false,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
			}
		}
	});

    //line chart for heart rate
	var lineChartData2 = {
		labels: ["Day 1", "Day 2", "day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day10", "Day 11","Day 12","Day 13","Day 14"],
		datasets: [{
			label: "Heart Rate",
			backgroundColor: "rgba(160, 160, 160, 0.445)",
			data: [105, 104, 105, 103, 100, 101, 99, 100, 99, 98, 98, 98, 99, 98]
		}]
	};
	
	var line2ctx = document.getElementById('linegraph2').getContext('2d');
	window.myLine = new Chart(line2ctx, {
		type: 'line',
		data: lineChartData2,
		options: {
			responsive: true,
			legend: {
				display: false,
			},
			tooltips: {
				mode: 'index',
				intersect: false,
			}
		}
	});
	
