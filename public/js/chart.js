"use strict";

var co2series = [];
//define the chart
var chartT = new Highcharts.Chart({
    chart: {
        renderTo: "container",
        type: "spline",
        zoomType: "x",
        height: (9 / 16) * 100 + "%", // 16:9 ratio
    },
    title: {
        text: "CO2 Level - ppm",
    },
    subtitle: {
        text:
            document.ontouchstart === undefined
                ? "Click and drag in the plot area to zoom in"
                : "Pinch the chart to zoom in",
    },
    series: [
        {
            type: "area",
            data: [],
            name: "CO2 ppm",
            color: "#121212",
        },
    ],
    plotOptions: {
        spline: {
            animation: true,
            dataLabels: { enabled: false },
        },
        // series: { color: "#121212" },
    },

    xAxis: {
        type: "datetime",
        dateTimeLabelFormats: { second: "%H:%M:%S" },
        // dateTimeLabelFormats: { minute: '%H:%M' },
        // dateTimeLabelFormats: { hour: '%H:%M' },
        labels: {
            style: {
                color: "black",
            },
        },
    },
    yAxis: {
        title: { text: "CO2 - ppm" },
        min: 400,
        max: 1000,
        plotBands: [
            {
                color: "rgba(0, 255, 0, 0.5)", // Color value
                from: 300, // Start of the plot band
                to: 700, // End of the plot band
            },
            {
                color: "rgba(255,198,0, 0.5)", // Color value
                from: 701, // Start of the plot band
                to: 800, // End of the plot band
            },
            {
                // color: "#d13d44", // Color value
                color: "rgba(255, 0, 0, 0.5)",
                from: 801, // Start of the plot band
                to: 2000, // End of the plot band
            },
        ],
        labels: {
            style: {
                color: "black",
            },
        },
    },

    plotOptions: {
        area: {
            fillColor: {
                // linearGradient: {
                //   x1: 0,
                //   y1: 0,
                //   x2: 0,
                //   y2: 1,
                // },
                linearGradient: [0, 0, 0, 500],
                stops: [
                    // [0, Highcharts.getOptions().colors[0]],
                    // [
                    //   1,
                    //   Highcharts.color(Highcharts.getOptions().colors[0])
                    //     .setOpacity(0)
                    //     .get("rgba"),
                    // ],
                    [0, "rgba(0, 0, 0, 1)"],
                    [1, "rgba(0, 255, 0, 0.5)"],
                ],
            },
            marker: {
                radius: 2,
            },
            lineWidth: 1,
            states: {
                hover: {
                    lineWidth: 1,
                },
            },
            threshold: null,
        },
    },

    credits: {
        enabled: false,
    },
});

Highcharts.setOptions({
    global: { useUTC: false },
});

//load last n hours of data
// var maxCo2 = 0; //to store max co2 reading
var timeWindowHrs = 1;

loadLast_n_HoursData();
function loadLast_n_HoursData(nHours = 4) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (this.readyState == 4 && this.status == 200) {
            // var x = new Date().getTime();
            console.log("hours requested passed to func= " + nHours);

            const hoursSelected = $("input[name=hours]:checked").val();
            console.log("value of radio selected in UI: " + hoursSelected);
            if (hoursSelected != null) {
                nHours = hoursSelected;
                console.log(
                    "hours taken from UI present so using: " + hoursSelected
                );
            }
            timeWindowHrs = nHours;

            var co2_latest = parseInt(this.responseText);
            console.log("whole reponse text ");
            console.log(this.responseText);
            //get the co2 reading in var
            var json = JSON.parse(this.response);
            var data_array = []; //.co2;
            data_array = json; //.co2;
            console.log("data_array");
            console.log(data_array);

            const co2_reading = data_array[0].co2;
            console.log(co2_reading);

            const dt = data_array[0].sample_time;
            console.log(dt);

            var temperature_str = data_array[0].temperature;
            var humidity = data_array[0].humidity;

            // x=dt;
            // var x = new Date(dt).getTime();
            // console.log(x);
            co2_latest = parseInt(co2_reading);

            document.getElementById("meter_value").value = co2_latest;

            // let str = document.getElementById("co2_level").innerHTML;
            // const encharloc = str.lastIndexOf(":");
            // str.substring(0, encharloc);
            // document.getElementById("co2_level").innerHTML =
            // str.substring(0, encharloc + 2) + co2_latest;

            document.getElementById("co2_level").innerHTML = co2_latest;

            document.getElementById("temperature_level").innerHTML =
                temperature_str;

            document.getElementById("humidity_level").innerHTML = humidity;

            document.getElementById("time").innerHTML = dt;

            var gaugeElement = document.getElementsByTagName("canvas")[0];

            gaugeElement.setAttribute("data-value", co2_latest);
            var gauge = document.gauges.get("co2-gauge");
            gauge.update();

            // co2series =
            // get apir of nums in 2 element Array
            // add 2 2 elem array to another main array -series

            var new_co2_series = [];
            var pair = [];

            var maxCo2 = 1000; //set max to a min of
            var minCo2 = 400; //set min to a min of

            console.log("current max co2 " + maxCo2);
            data_array.forEach(myFunction);
            function myFunction(value, index, array) {
                // txt += value + "<br>";
                // console.log("value");
                // console.log(value);
                pair = [];
                pair.push(new Date(value.sample_time).getTime()); //cv top utc
                pair.push(parseInt(value.co2));
                //is this the biggest c02 reading?
                if (parseInt(value.co2) > maxCo2) {
                    maxCo2 = parseInt(value.co2);
                    // console.log("new max co2 " + maxCo2);
                    // console.log(maxCo2);
                }
                if (parseInt(value.co2) < minCo2) {
                    minCo2 = parseInt(value.co2);
                    // console.log("new max co2 " + maxCo2);
                    // console.log(maxCo2);
                }
                // console.log("pair");
                // console.log(pair);
                new_co2_series.push(pair);
                // console.log("new_co2_series");
                // console.table(new_co2_series);
            }
            console.log("new max co2 " + maxCo2);

            //set chart max to max co2 reading in new_co2_series array
            chartT.yAxis[0].update({ max: maxCo2 });
            chartT.yAxis[0].update({ min: minCo2 });

            // chartT.yAxis[0].update({ max: 1500 });

            new_co2_series.reverse(); //reverse array

            chartT.series[0].setData(new_co2_series, true, true, true);
            //set chart max to max co2 reading in new_co2_series array
            // chartT.setExtremes(null, 100);
        }
    };
    xhttp.open("GET", "/api/read/lastnhours/" + nHours, true);
    xhttp.send(); // console.log("new_co2_series");
    // console.table(new_co2_series);
}

// var co2series = [["2021-09-10 16:42:31",695],["2021-09-10 16:42:46",695],["2021-09-10 16:43:01",693]];
console.log(co2series);

//update values on screen
setInterval(function () {
    var getLatestSample = new XMLHttpRequest();
    getLatestSample.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //pre process
            console.log("whole reponse text: ", this.responseText);
            var data_array = JSON.parse(this.response);
            console.log("data array: ", data_array);
            //co2
            var co2_reading = data_array[0].co2;
            console.log("co2_reading: ", co2_reading);
            var co2_latest = parseInt(co2_reading);
            //sampletime
            var sample_time_str = data_array[0].sample_time;
            console.log("sample_time: ", sample_time_str);
            var sample_time = new Date(sample_time_str).getTime();
            console.log("Date(sample_time_str).getTime(): ", sample_time);
            //temperate and humidity
            var temperature_str = data_array[0].temperature;
            var humidity = data_array[0].humidity;

            let slideFlag = true;
            if (document.getElementById("slide-window").checked) {
                slideFlag = false;
            } else {
                slideFlag = true;
            }
            //addPoint(options [, redraw] [, shift] [, animation] [, withEvent])
            //shift If true, a point is shifted off the start of the series as one is appended to the end.

            // if timeof(last data point) - timeof(first data point) > current selected view time AND window slide enabled
            //      add point with scroll effect
            // else just add point
            // firstDataPointTime = new Date(chartT.series[0].data[0]).getTime();
            const firstDataPointTime = chartT.series[0].data[0].x;
            const firstDataPointValue = chartT.series[0].data[0].y;
            console.log("firstDataPointTime: ", firstDataPointTime);
            console.log("firstDataPointValue: ", firstDataPointValue);
            const lastDataPointTime =
                chartT.series[0].data[chartT.series[0].data.length - 1].x;
            const lastDataPointValue =
                chartT.series[0].data[chartT.series[0].data.length - 1].y;
            console.log("lastDataPointTime: ", lastDataPointTime);
            console.log("lastDataPointValue: ", lastDataPointValue);
            console.log("timeWindowHrs: ", timeWindowHrs);

            // JavaScript Stores Dates as Milliseconds
            const hours = timeWindowHrs;
            const msInNHours = hours * 60 * 60 * 1000;
            if (lastDataPointTime - firstDataPointTime > msInNHours) {
                // if (chartT.series[0].data.length > 2160) {//if over n samples already, scroll window
                chartT.series[0].addPoint(
                    [sample_time, co2_latest],
                    true,
                    slideFlag,
                    true
                );
                console.log("truncate msInNHours:, slideFlag ", msInNHours);
            } else {
                chartT.series[0].addPoint(
                    [sample_time, co2_latest],
                    true,
                    false,
                    true
                );
                console.log("add to series: ", msInNHours);
            }

            document.getElementById("meter_value").value = co2_latest;

            // let str = document.getElementById("co2_level").innerHTML;
            // const encharloc = str.lastIndexOf(":");
            // str.substring(0, encharloc);
            // document.getElementById("co2_level").innerHTML =
            // str.substring(0, encharloc + 2) + co2_latest;

            document.getElementById("co2_level").innerHTML = co2_latest;

            document.getElementById("temperature_level").innerHTML =
                temperature_str;

            document.getElementById("humidity_level").innerHTML = humidity;

            document.getElementById("time").innerHTML = sample_time_str;

            var gaugeElement = document.getElementsByTagName("canvas")[0];

            gaugeElement.setAttribute("data-value", co2_latest);
            var gauge = document.gauges.get("co2-gauge");
            gauge.update();


            // var thechart = document.getElementById("gauge-container");
            // var thechart=$("#gauge-container").highcharts();
            // var thechart = document.getElementById("gauge-container").highcharts();
            var thechartobj = document.getElementById("gauge-container");

            var thechart = Highcharts.charts[thechartobj.getAttribute('data-highcharts-chart')];
            // var thechart = window.charts["gauge-container"];

            var point = thechart.series[0].points[0];
            point.update(co2_latest);
        }
    };
    getLatestSample.open("GET", "/api/read/lastnreadings/1", true);
    getLatestSample.send();
}, 15000); // 15 secs
