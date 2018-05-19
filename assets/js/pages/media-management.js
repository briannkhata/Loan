/* ------------------------------------------------------------------------------
 *
 *  # Admin dashboard media statistics
 *  # Media Management page
 *
 * ---------------------------------------------------------------------------- */

//*******************MEDIA STATISTICS TAB*******************

// Donut chart
// ------------------------------

// Initialize chart
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawDonut);


// Chart settings
function drawDonut() {

	// Data
	var data = google.visualization.arrayToDataTable([
		['Task', 'Hours per Day'],
		['Work',     11],
		['Eat',      2],
		['Commute',  2],
		['Watch TV', 2],
		['Sleep',    7]
	]);


	// Options
	var options_donut = {
		fontName: 'Roboto',
		pieHole: 0.55,
		height: 150,
		legend: {position: 'none'},
		width: 150,
		chartArea: {
			right: 20,
			width: '86%',
			height: '86%'
		}
	};


	// Instantiate and draw our chart, passing in some options.
	var donut = new google.visualization.PieChart($('#google-donut')[0]);
	donut.draw(data, options_donut);

	var donut2 = new google.visualization.PieChart($('#google-donut2')[0]);
	donut2.draw(data, options_donut);

	var donut3 = new google.visualization.PieChart($('#google-donut3')[0]);
	donut3.draw(data, options_donut);

	var donut4 = new google.visualization.PieChart($('#google-donut4')[0]);
	donut4.draw(data, options_donut);

	var donut5 = new google.visualization.PieChart($('#google-donut5')[0]);
	donut5.draw(data, options_donut);
}


$(function() {

	//*******************FILE MANAGEMENT TAB*******************

	// Checkboxes/radios (Uniform)
	// ------------------------------

	// Default initialization

	$(".styled, .multiselect-container input").uniform({
		radioClass: 'choice'
	});



	//*********************** SEARCHES TAB*********************

	function runCharts() {
		// Set paths
		// ------------------------------

		require.config({
			paths: {
				echarts: 'assets/js/plugins/visualization/echarts'
			}
		});


		// Configuration
		// ------------------------------

		require(
			[
				'echarts',
				'echarts/theme/limitless',
				'echarts/chart/pie',
				'echarts/chart/funnel'
			],


			// Charts setup
			function (ec, limitless) {


				// Initialize charts
				// ------------------------------

				var multiple_donuts = ec.init(document.getElementById('multiple_donuts'), limitless);


				// Charts setup
				// ------------------------------

				//
				// Multiple donuts options
				//

				// Top text label
				var labelTop = {
					normal: {
						label: {
							show: true,
							position: 'center',
							formatter: '{b}\n',
							textStyle: {
								baseline: 'middle',
								fontWeight: 300,
								fontSize: 15
							}
						},
						labelLine: {
							show: false
						}
					}
				};

				// Format bottom label
				var labelFromatter = {
					normal: {
						label: {
							formatter: function (params) {
								return '\n\n' + (100 - params.value) + '%'
							}
						}
					}
				}

				// Bottom text label
				var labelBottom = {
					normal: {
						color: '#eee',
						label: {
							show: true,
							position: 'center',
							textStyle: {
								baseline: 'middle'
							}
						},
						labelLine: {
							show: false
						}
					},
					emphasis: {
						color: 'rgba(0,0,0,0)'
					}
				};

				// Set inner and outer radius
				var radius = [60, 75];

				// Add options
				multiple_donuts_options = {

					// Add title
					title: {
						text: 'Searches',
						subtext: '',
						x: 'left'
					},

					// Add legend
					legend: {
						x: 'center',
						y: '56%',
						data: ['GoogleMaps', 'Facebook', 'Youtube', 'Google+', 'Weixin', 'Twitter', 'Skype', 'Messenger', 'Whatsapp', 'Instagram']
					},

					// Add series
					series: [
						{
							type: 'pie',
							center: ['10%', '32.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name: 'other', value: 46, itemStyle: labelBottom},
								{name: 'GoogleMaps', value: 54,itemStyle: labelTop}
							]
						},
						{
							type: 'pie',
							center: ['30%', '32.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name: 'other', value: 56, itemStyle: labelBottom},
								{name: 'Facebook', value: 44,itemStyle: labelTop}
							]
						},
						{
							type: 'pie',
							center: ['50%', '32.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name: 'other', value: 65, itemStyle: labelBottom},
								{name: 'Youtube', value: 35,itemStyle: labelTop}
							]
						},
						{
							type: 'pie',
							center: ['70%', '32.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name: 'other', value: 70, itemStyle: labelBottom},
								{name: 'Google+', value: 30,itemStyle: labelTop}
							]
						},
						{
							type: 'pie',
							center: ['90%', '32.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name:'other', value:73, itemStyle: labelBottom},
								{name:'Weixin', value:27,itemStyle: labelTop}
							]
						},
						{
							type: 'pie',
							center: ['10%', '82.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name: 'other', value: 78, itemStyle: labelBottom},
								{name: 'Twitter', value: 22,itemStyle: labelTop}
							]
						},
						{
							type: 'pie',
							center: ['30%', '82.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name: 'other', value: 78, itemStyle: labelBottom},
								{name: 'Skype', value: 22,itemStyle: labelTop}
							]
						},
						{
							type: 'pie',
							center: ['50%', '82.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name: 'other', value: 78, itemStyle: labelBottom},
								{name: 'Messenger', value: 22,itemStyle: labelTop}
							]
						},
						{
							type: 'pie',
							center: ['70%', '82.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name: 'other', value: 83, itemStyle: labelBottom},
								{name: 'Whatsapp', value: 17,itemStyle: labelTop}
							]
						},
						{
							type: 'pie',
							center: ['90%', '82.5%'],
							radius: radius,
							itemStyle: labelFromatter,
							data: [
								{name:'other', value:89, itemStyle: labelBottom},
								{name:'Instagram', value:11,itemStyle: labelTop}
							]
						}
					]
				};



				// Apply options
				// ------------------------------

				multiple_donuts.setOption(multiple_donuts_options);



				// Resize charts
				// ------------------------------

				window.onresize = function () {
					setTimeout(function (){
						multiple_donuts.resize();
					}, 200);
				}
			}
		);
	};



	// Initialize chart


	$('.nav-tabs-bottom .run-charts').on('click', function () {
		
			setTimeout(function () {
				runCharts()
			},500);

	});

	

	//*******************MEDIA STATISTICS TAB*******************

	// Bar charts with random data
	// ------------------------------

	// Initialize charts
	generateBarChart("#hours-available-bars", 24, 40, true, "elastic", 1200, 50, "#EC407A", "hours");
	generateBarChart("#hours-available-bars2", 24, 40, true, "elastic", 1200, 50, "#EC407A", "hours2");
	generateBarChart("#hours-available-bars3", 24, 40, true, "elastic", 1200, 50, "#EC407A", "hours3");
	generateBarChart("#goal-bars", 24, 40, true, "elastic", 1200, 50, "#5C6BC0", "goal");
	generateBarChart("#goal-bars2", 24, 40, true, "elastic", 1200, 50, "#5C6BC0", "goal2");
	generateBarChart("#goal-bars3", 24, 40, true, "elastic", 1200, 50, "#5C6BC0", "goal3");
	generateBarChart("#members-online", 24, 50, true, "elastic", 1200, 50, "rgba(255,255,255,0.5)", "members");

	// Chart setup
	function generateBarChart(element, barQty, height, animate, easing, duration, delay, color, tooltip) {


		// Basic setup
		// ------------------------------

		// Add data set
		var bardata = [];
		for (var i=0; i < barQty; i++) {
			bardata.push(Math.round(Math.random()*10) + 10)
		}

		// Main variables
		var d3Container = d3.select(element),
			width = d3Container.node().getBoundingClientRect().width;



		// Construct scales
		// ------------------------------

		// Horizontal
		var x = d3.scale.ordinal()
			.rangeBands([0, width], 0.3)

		// Vertical
		var y = d3.scale.linear()
			.range([0, height]);



		// Set input domains
		// ------------------------------

		// Horizontal
		x.domain(d3.range(0, bardata.length))

		// Vertical
		y.domain([0, d3.max(bardata)])



		// Create chart
		// ------------------------------

		// Add svg element
		var container = d3Container.append('svg');

		// Add SVG group
		var svg = container
			.attr('width', width)
			.attr('height', height)
			.append('g');



		//
		// Append chart elements
		//

		// Bars
		var bars = svg.selectAll('rect')
			.data(bardata)
			.enter()
			.append('rect')
			.attr('class', 'd3-random-bars')
			.attr('width', x.rangeBand())
			.attr('x', function(d,i) {
				return x(i);
			})
			.style('fill', color);



		// Tooltip
		// ------------------------------

		var tip = d3.tip()
			.attr('class', 'd3-tip')
			.offset([-10, 0]);

		// Show and hide
		if(tooltip == "hours" || tooltip == "goal" || tooltip == "hours2" || tooltip == "goal2" || tooltip == "hours3" || tooltip == "goal3" || tooltip == "members") {
			bars.call(tip)
				.on('mouseover', tip.show)
				.on('mouseout', tip.hide);
		}

		// Daily meetings tooltip content
		if(tooltip == "hours") {
			tip.html(function (d, i) {
				return "<div class='text-center'>" +
					"<h6 class='no-margin'>" + d + "</h6>" +
					"<span class='text-size-small'>meetings</span>" +
					"<div class='text-size-small'>" + i + ":00" + "</div>" +
					"</div>"
			});
		}

		// Statements tooltip content
		if(tooltip == "goal") {
			tip.html(function (d, i) {
				return "<div class='text-center'>" +
					"<h6 class='no-margin'>" + d + "</h6>" +
					"<span class='text-size-small'>statements</span>" +
					"<div class='text-size-small'>" + i + ":00" + "</div>" +
					"</div>"
			});
		}

		// Daily meetings tooltip content
		if(tooltip == "hours2") {
			tip.html(function (d, i) {
				return "<div class='text-center'>" +
					"<h6 class='no-margin'>" + d + "</h6>" +
					"<span class='text-size-small'>meetings</span>" +
					"<div class='text-size-small'>" + i + ":00" + "</div>" +
					"</div>"
			});
		}

		// Statements tooltip content
		if(tooltip == "goal2") {
			tip.html(function (d, i) {
				return "<div class='text-center'>" +
					"<h6 class='no-margin'>" + d + "</h6>" +
					"<span class='text-size-small'>statements</span>" +
					"<div class='text-size-small'>" + i + ":00" + "</div>" +
					"</div>"
			});
		}

		// Daily meetings tooltip content
		if(tooltip == "hours3") {
			tip.html(function (d, i) {
				return "<div class='text-center'>" +
					"<h6 class='no-margin'>" + d + "</h6>" +
					"<span class='text-size-small'>meetings</span>" +
					"<div class='text-size-small'>" + i + ":00" + "</div>" +
					"</div>"
			});
		}

		// Statements tooltip content
		if(tooltip == "goal3") {
			tip.html(function (d, i) {
				return "<div class='text-center'>" +
					"<h6 class='no-margin'>" + d + "</h6>" +
					"<span class='text-size-small'>statements</span>" +
					"<div class='text-size-small'>" + i + ":00" + "</div>" +
					"</div>"
			});
		}

		// Online members tooltip content
		if(tooltip == "members") {
			tip.html(function (d, i) {
				return "<div class='text-center'>" +
					"<h6 class='no-margin'>" + d + "0" + "</h6>" +
					"<span class='text-size-small'>members</span>" +
					"<div class='text-size-small'>" + i + ":00" + "</div>" +
					"</div>"
			});
		}



		// Bar loading animation
		// ------------------------------

		// Choose between animated or static
		if(animate) {
			withAnimation();
		} else {
			withoutAnimation();
		}

		// Animate on load
		function withAnimation() {
			bars
				.attr('height', 0)
				.attr('y', height)
				.transition()
				.attr('height', function(d) {
					return y(d);
				})
				.attr('y', function(d) {
					return height - y(d);
				})
				.delay(function(d, i) {
					return i * delay;
				})
				.duration(duration)
				.ease(easing);
		}

		// Load without animateion
		function withoutAnimation() {
			bars
				.attr('height', function(d) {
					return y(d);
				})
				.attr('y', function(d) {
					return height - y(d);
				})
		}



		// Resize chart
		// ------------------------------

		// Call function on window resize
		$(window).on('resize', barsResize);

		// Call function on sidebar width change
		$(document).on('click', '.sidebar-control', barsResize);

		// Resize function
		//
		// Since D3 doesn't support SVG resize by default,
		// we need to manually specify parts of the graph that need to
		// be updated on window resize
		function barsResize() {

			// Layout variables
			width = d3Container.node().getBoundingClientRect().width;


			// Layout
			// -------------------------

			// Main svg width
			container.attr("width", width);

			// Width of appended group
			svg.attr("width", width);

			// Horizontal range
			x.rangeBands([0, width], 0.3);


			// Chart elements
			// -------------------------

			// Bars
			svg.selectAll('.d3-random-bars')
				.attr('width', x.rangeBand())
				.attr('x', function(d,i) {
					return x(i);
				});
		}
	}
	

});
