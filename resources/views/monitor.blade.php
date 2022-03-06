<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CO2 Monitor</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/> -->
    <!-- <link rel="shortcut icon" type="image/png" href="favicon-32x32.png" /> -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon-32x32.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">


    <script src="//cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.7/radial/gauge.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- <link rel="stylesheet" href="css/mystyle.css"> --}}

</head>

<body style="background-color: rgb(90, 81, 81)">

    <div class="header">
        <h1>CO<sub>2</sub> Monitor</h1>
    </div>

    <div class="row">
        <div class="column left-side">
            <h2>Sensor</h2>
            <canvas id="co2-gauge" data-type="radial-gauge" data-width="250" data-height="250" data-units="CO2 ppm"
                data-title="false" data-value="500" data-min-value="400" data-max-value="1000"
                data-major-ticks="400,500,600,700,800,900,1000" data-minor-ticks="2" data-stroke-ticks="false"
                data-value-int="1" data-value-dec="0" data-font-value="courier" data-highlights='[
      { "from": 400, "to": 700, "color": "rgba(0,255,0,.5)" },
      { "from": 700, "to": 800, "color": "rgba(255,198,0,.7)" },
      { "from": 800, "to": 1000, "color": "rgba(255,0,0,.5)" }

  ]' data-color-plate="#222" data-color-major-ticks="#f5f5f5" data-color-minor-ticks="#ddd" data-color-title="#fff"
                data-color-units="#ccc" data-color-numbers="#eee" data-color-needle-start="rgba(240, 128, 128, 1)"
                data-color-needle-end="rgba(255, 160, 122, .9)" data-value-box="true" data-animation-rule="bounce"
                data-animation-duration="500" data-animated-value="true"></canvas>
        </div>

        <div class="column middle">
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>

        <div class="column right-side">
            <h2>Latest Reading</h2>
            <div>
                <h3 class="h-inline">CO<sub>2</sub> level(ppm): </h3>
                <h2 class="h-inline" id="co2_level">value</h2>
            </div>
            <div>
                <h4 class="h-inline">Temperature (C): </h4>
                <h3 class="h-inline" id="temperature_level">value</h2>
            </div>
            <div>
                <h4 class="h-inline">Humidity (%): </h4>
                <h3 class="h-inline" id="humidity_level">Humidity (%): </h3>
            </div>
            <div>
                <h4 class="h-inline">Time : </h4>
                <h4 class="h-inline" id="time">Value : </h4>
            </div>

            <div>
                <meter class="co2_meter" id="meter_value" min="400" low="700" high="800" max="1000" optimum="600"
                    value="500"></meter>
            </div>
            <p></p>

            <hr />

            <p>Select a time range</p>
            <div class="rating">
                <label for="rate-1">
                    <input type="radio" id="rate-1" name="hours" value="1" onclick="loadLast_n_HoursData(1)" /><span>1
                        Hour</span>
                </label>
                <label for="rate-2">
                    <input type="radio" id="rate-2" name="hours" value="2" onclick="loadLast_n_HoursData(2)" /><span>2
                        hours</span>
                </label>
                <label for="rate-3">
                    <input type="radio" id="rate-3" name="hours" value="3" onclick="loadLast_n_HoursData(3)" /><span>3
                        hours</span>
                </label>
                <label for="rate-4">
                    <input type="radio" id="rate-4" name="hours" value="4" onclick="loadLast_n_HoursData(4)" /><span>4
                        hours</span>
                </label>
                <label for="rate-5">
                    <input type="radio" id="rate-5" name="hours" value="8" onclick="loadLast_n_HoursData(8)" /><span>8
                        hours</span>
                </label>
                <label for="rate-6">
                    <input type="radio" id="rate-6" name="hours" value="12"
                        onclick="loadLast_n_HoursData(12)" /><span>12 hours</span>
                </label>
                <label for="rate-7">
                    <input type="radio" id="rate-7" name="hours" value="24"
                        onclick="loadLast_n_HoursData(24)" /><span>24 hours</span>
                </label>
                <label for="rate-8">
                    <input type="radio" id="rate-8" name="hours" value="48" onclick="loadLast_n_HoursData(48)" /><span>2
                        days</span>
                </label>
                <label for="rate-9">
                    <input type="radio" id="rate-9" name="hours" value="72" onclick="loadLast_n_HoursData(72)" /><span>3
                        days</span>
                </label>
                <label for="rate-10">
                    <input type="radio" id="rate-10" name="hours" value="96"
                        onclick="loadLast_n_HoursData(96)" /><span>4 days</span>
                </label>
            </div>
            <div class="slide-sw">
                <!-- Rounded switch Slide-->
                <span class="sw-txt">Slide</span>
                <label class="switch" for="slide-window">
                    <input type="checkbox" id="slide-window">
                    <span class="slider round"></span>
                </label>
                <span class="sw-txt">Add</span>
            </div>
        </div>
    </div>
    <?php echo '<pre>'; ?>
</body>

<script src="js/chart.js"></script>

</html>
