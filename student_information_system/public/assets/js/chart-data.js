// Charts & Graphs



/**
*
* jquery.sparkline.js
*
* v2.1.2
* (c) Splunk, Inc
* Contact: Gareth Watts (gareth@splunk.com)
* http://omnipotent.net/jquery.sparkline/
*
* Generates inline sparkline charts from data supplied either to the method
* or inline in HTML
*
* Compatible with Internet Explorer 6.0+ and modern browsers equipped with the canvas tag
* (Firefox 2.0+, Safari, Opera, etc)
*
* License: New BSD License
*
* Copyright (c) 2012, Splunk Inc.
* All rights reserved. 
* 
*/

// Sparkline Mini Charts 

// bar chart 1
var values = [15, 12, 28, 5, 32, 5, 3, 14, 22, 5, 12, 20, 5, 12, 5];

// Draw a sparkline for the #sparkline element
$('.sparkline').sparkline(values, {
    type: "bar",
	barColor: '#3EB0AD',
    tooltipSuffix: " widgets"
});
// bar chart 2
var values = [20, 5, 35, 10, 5, 15, 7, 3, 20, 10, 12, 16, 21, 15, 14];

// Draw a sparkline for the #sparkline element
$('.sparkline2').sparkline(values, {
    type: "bar",
	barColor: '#3EB0AD',
    tooltipSuffix: " widgets"
});

// bar chart 3
var values = [6, 5, 12, 10, 5, 6, 7, 3, 4, 10, 5, 4, 10, 5, 4, 7, 3, 7, 10];

// Draw a sparkline for the #sparkline element
$('.sparkline3').sparkline(values, {
    type: "bar",
	barColor: '#ffffff',
    tooltipSuffix: "users"
});

// Samples from charts.html
$("#line-ex").sparkline([5,6,7,9,9,5,3,2,2,4,6,7,2,4,6,2,4], {
    type: 'line',
    lineColor: '#ff7f00',
    fillColor: '#007f7f',
    spotColor: '#ff7f00',
    minSpotColor: '#ff7f00',
    maxSpotColor: '#ff7f00',
    spotRadius: 2});

$("#bar-ex").sparkline([15,6,7,2,0,22,12,25,6,7,9,9,5,3,2,2,], {
    type: 'bar',
    barColor: '#ff7f00',
    negBarColor: '#ff7f00'});

$("#bar-ex2").sparkline([15,6,7,2,0,22,12,25,6,7,9,9,5,3,2,2,15,6,7,2,0,22 ], {
    type: 'bar',
	barWidth: 15,
	width: '',
    height: '200',
    barColor: '#ec9a5d',
    negBarColor: '#ff7f00'});
	
$("#bullet-ex").sparkline([10,12,12,9,7], {
    type: 'bullet',
    targetColor: '#ff7f00',
    performanceColor: '#007f7f',
    rangeColors: ['#7eeae4','#4ccece','#2cb7b7']});

$('#compositebar-ex').sparkline('html', { type: 'bar', barColor: '#2cb7b7' });
    $('#compositebar-ex').sparkline([4,1,5,7,9,9,8,7,6,6,4,7,8,4,3], 
        { composite: true, fillColor: false, lineColor: '#ff7f00' });	
	
		
$("#pie-ex1").sparkline([2,3,1], {
    type: 'pie',
    sliceColors: ['#00b49d','#687081','#ff9900','#109618','#66aa00','#dd4477','#0099c6','#990099 ']});
$("#pie-ex2").sparkline([1,1,2], {
    type: 'pie',
    sliceColors: ['#00b49d','#687081','#ff9900','#109618','#66aa00','#dd4477','#0099c6','#990099 ']});
$("#pie-ex3").sparkline([1,1,1], {
    type: 'pie',
    sliceColors: ['#00b49d','#687081','#ff9900','#109618','#66aa00','#dd4477','#0099c6','#990099 ']});
$("#pie-ex4").sparkline([1,2,3], {
    type: 'pie',
    sliceColors: ['#00b49d','#687081','#ff9900','#109618','#66aa00','#dd4477','#0099c6','#990099 ']});
$("#pie-ex5").sparkline([2,3,1], {
    type: 'pie',
    sliceColors: ['#00b49d','#687081','#ff9900','#109618','#66aa00','#dd4477','#0099c6','#990099 ']});
$("#pie-ex6").sparkline([2,3,1], {
    type: 'pie',
	width: '200',
    height: '200',
    sliceColors: ['#00b49d','#687081','#ff9900','#109618','#66aa00','#dd4477','#0099c6','#990099 ']});	
	
$('#discrete-ex').sparkline([4,6,7,7,4,3,2,1,4,4,4,6,7,7,4,3,2,1,4,4,4,6,7,7,4,3,2,1,4,4], {
    type: 'discrete',
    lineColor: '#ff7f00'});	
		
		
// ************ Easy Pie Charts index.html **********//

 			var initPieChart = function() {
                $('.percentage').easyPieChart({
                    animate: 1000
                });
                $('.percentage-light').easyPieChart({
                    trackColor: '#caced7',
					barColor:'#a3346f',
                    scaleColor: false,
                    lineCap: 'butt',
                    lineWidth: 15,
                    animate: 1000
                });

                $('.updateEasyPieChart').on('click', function(e) {
                  e.preventDefault();
                  $('.percentage, .percentage-light').each(function() {
                    var newValue = Math.round(100*Math.random());
                    $(this).data('easyPieChart').update(newValue);
                    $('span', this).text(newValue);
                  });
                });
            };
			
			
// ************ Flot Charts index.html **********//			
			$(function() {
                    // We use an inline data source in the example, usually data would
                    // be fetched from a server
				var data = [],
                        totalPoints = 300;
            
                    function getRandomData() {
            
                        if (data.length > 0)
                            data = data.slice(1);
                        // Do a random walk
                        while (data.length < totalPoints) {
                            var prev = data.length > 0 ? data[data.length - 1] : 50,
                                y = prev + Math.random() * 10 - 5;
            
                            if (y < 0) {
                                y = 0;
                            } else if (y > 100) {
                                y = 100;
                            }
            
                            data.push(y);
                        }
            
                        // Zip the generated y values with the x values
            
                        var res = [];
                        for (var i = 0; i < data.length; ++i) {
                            res.push([i, data[i]])
                        }
                        return res;
                    }
                    // Set up the control widget
                    var updateInterval = 30;
                    $("#updateInterval").val(updateInterval).change(function () {
                        var v = $(this).val();
                        if (v && !isNaN(+v)) {
                            updateInterval = +v;
                            if (updateInterval < 1) {
                                updateInterval = 1;
                            } else if (updateInterval > 2000) {
                                updateInterval = 2000;
                            }
                            $(this).val("" + updateInterval);
                        }
                    });
            
                    var plot = $.plot("#placeholder", [ getRandomData() ], {
						grid: {
                        borderWidth:0,
                        markings: function(axes) {
                            var markings = [];
                            var xaxis = axes.xaxis;
                            for (var x = Math.floor(xaxis.min); x < xaxis.max; x += xaxis.tickSize * 2) {
                                markings.push({ xaxis: { from: x, to: x + xaxis.tickSize }, color: "#000" });
                            }
                            return markings;
                        }
                    },
                    series: {
                            shadowSize: 0,	// Drawing is faster without shadows
							lines: {
								// we don't put in show: false so we can see
								// whether lines were actively disabled
								lineWidth: 2, // in pixels
								fill: true,
								fillColor: "#ea7d7d",
								steps: false
								// Omit 'zero', so we can later default its value to
								// match that of the 'fill' option.
							},
                        },
					colors: ["#d84949"],
					yaxis: {
                            min: 0,
                            max: 100
                        },
                    xaxis: {
                            show: false,
                        }
                    });
                    function update() {
                        plot.setData([getRandomData()]);
                        // Since the axes don't change, we don't need to call plot.setupGrid()
                        plot.draw();
                        setTimeout(update, updateInterval);
                    }
                    update();
                });
				
// ************ Canvas Chart index.html **********//	
 var chart = new CanvasJS.Chart("chartContainer",
		{
			backgroundColor: "#3EB0AD",
			title:{
				text: "",
				fontSize: 30
			},
			axisX:{
				gridColor: "#81d6d4",
				tickColor: "#81d6d4",
				labelFontColor: "#81d6d4",
				valueFormatString: "DD/MMM"

			},                        
                        toolTip:{
                          shared:true
                        },
			theme: "theme2",
			axisY: {
				gridColor: "#81d6d4",
				tickColor: "#81d6d4",
				labelFontColor: "#81d6d4"

			},
			legend:{
				verticalAlign: "center",
				horizontalAlign: "right",
			},
			data: [
			{        
				toolTipContent: "{label}{name}: <strong>{y}</strong>", 
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Visits",
				markerType: "square",
				color: "#ffffff",
				dataPoints: [
				{ x: new Date(2010,0,3), y: 650 },
				{ x: new Date(2010,0,5), y: 700 },
				{ x: new Date(2010,0,7), y: 710 },
				{ x: new Date(2010,0,9), y: 658 },
				{ x: new Date(2010,0,11), y: 734 },
				{ x: new Date(2010,0,13), y: 963 },
				{ x: new Date(2010,0,15), y: 847 },
				{ x: new Date(2010,0,17), y: 853 },
				{ x: new Date(2010,0,19), y: 869 },
				{ x: new Date(2010,0,21), y: 943 },
				{ x: new Date(2010,0,23), y: 970 }
				]
			},
			{        
				type: "line",
				showInLegend: true,
				name: "Unique Visits",
				color: "#18514f",
				lineThickness: 2,

				dataPoints: [
				{ x: new Date(2010,0,3), y: 510 },
				{ x: new Date(2010,0,5), y: 560 },
				{ x: new Date(2010,0,7), y: 540 },
				{ x: new Date(2010,0,9), y: 558 },
				{ x: new Date(2010,0,11), y: 544 },
				{ x: new Date(2010,0,13), y: 693 },
				{ x: new Date(2010,0,15), y: 657 },
				{ x: new Date(2010,0,17), y: 663 },
				{ x: new Date(2010,0,19), y: 639 },
				{ x: new Date(2010,0,21), y: 673 },
				{ x: new Date(2010,0,23), y: 660 }
				]
			}

			
			],
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart.render();
            }
          }
		});

chart.render();
