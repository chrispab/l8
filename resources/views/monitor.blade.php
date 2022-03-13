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

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="//cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.7/radial/gauge.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/slide-sw.css') }}">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



</head>

<body class="bg-slate-500">

    <header>
        <nav class="flex items-center justify-between p-6 container mx-auto">
        </nav>
    </header>

    <div class="flex items-center justify-between p-6 container mx-auto border border-red-900">

        <div class="column left-side border">
            <div>
                <div class="flex items-center justify-center mx-auto border">
                    <h2>Sensor</h2>
                </div>
                {{-- <div> --}}
                    <canvas id="co2-gauge" data-type="radial-gauge" data-units="ppm" data-title="CO2" data-value="500"
                        data-min-value="400" data-max-value="1000" data-major-ticks="400,500,600,700,800,900,1000"
                        data-minor-ticks="10" data-stroke-ticks="false" data-value-int="1" data-value-dec="0"
                        data-font-value="courier" data-highlights='[
      { "from": 400, "to": 700, "color": "rgba(0,255,0,.5)" },
      { "from": 700, "to": 800, "color": "rgba(255,198,0,.7)" },
      { "from": 800, "to": 1000, "color": "rgba(255,0,0,.5)" }

            ]' data-color-plate="#222" data-color-major-ticks="#f5f5f5" data-color-minor-ticks="#ddd"
                        data-color-title="#fff" data-color-units="#ccc" data-color-numbers="#eee"
                        data-color-needle-start="rgba(240, 128, 128, 1)" data-color-needle-end="rgba(255, 160, 122, .9)"
                        data-value-box="true" data-animation-rule="bounce" data-animation-duration="500"
                        data-animated-value="true"></canvas>
                {{-- </div> --}}
            </div>
        </div>

        <div class="border-red-900 w-2/3">
            <figure class="highcharts-figure">
                <div id="chart-container" class="m-5"></div>
            </figure>
        </div>
        {{-- style="height: 600px" --}}


        <div class="column right-side border min-w-max">
            <div class="flex items-center justify-center mx-auto border">
                <h2>Latest Reading</h2>
            </div>
            <div>
                <h3 class="inline">CO<sub>2</sub> level: </h3>
                <h2 class="inline" id="co2_level">value</h2>
                <h3 class="inline">ppm</h3>
            </div>
            <div>
                <h4 class="inline">Temperature (C): </h4>
                <h3 class="inline" id="temperature_level">value</h2>
            </div>
            <div>
                <h4 class="inline">Humidity (%): </h4>
                <h3 class="inline" id="humidity_level">Humidity (%): </h3>
            </div>
            <div>
                <h4 class="inline">Time : </h4>
                <h4 class="inline" id="time">Value : </h4>
            </div>

            <div class="mx-auto flex justify-center items-center">
                <meter class="co2_meter" id="meter_value" min="400" low="700" high="800" max="1000" optimum="600"
                    value="500"></meter>
            </div>

            <hr />


            <div class=" border">
                <p class="m-2">Select a time range</p>



                <div class=" border m-1">
                    <div class="w-full p-1">
                        <input type="radio" class="hidden peer" name="hours" id="hours1">
                        <label for="hours1"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(1)">1 Hour</label>
                    </div>
                    <div class="w-full p-1">
                        <input class="hidden peer" type="radio" name="hours" id="hours2">
                        <label for="hours2"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(2)">2 hours</label>
                    </div>
                    <div class="w-full p-1">
                        <input class="hidden peer" type="radio" name="hours" id="hours3">
                        <label for="hours3"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(3)">3 hours</label>
                    </div>
                    <div class="w-full p-1">
                        <input class="hidden peer" type="radio" name="hours" id="hours4">
                        <label for="hours4"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(4)">4 hours</label>
                    </div>
                    <div class="w-full p-1">
                        <input type="radio" class="hidden peer" name="hours" id="hours8">
                        <label for="hours8"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(8)">8 Hours</label>
                    </div>
                    <div class="w-full p-1">
                        <input class="hidden peer" type="radio" name="hours" id="hours12">
                        <label for="hours12"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(12)">12 hours</label>
                    </div>
                    <div class="w-full p-1">
                        <input class="hidden peer" type="radio" name="hours" id="hours24">
                        <label for="hours24"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(24)">24 hours</label>
                    </div>
                    <div class="w-full p-1">
                        <input class="hidden peer" type="radio" name="hours" id="hours48">
                        <label for="hours48"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(48)">2 days</label>
                    </div>
                    <div class="w-full p-1">
                        <input type="radio" class="hidden peer" name="hours" id="hours72">
                        <label for="hours72"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(72)">3 days</label>
                    </div>
                    <div class="w-full p-1">
                        <input class="hidden peer" type="radio" name="hours" id="hours96">
                        <label for="hours96"
                            class="rounded-md h-10 text-gray-900 active:bg-blue-600  focus:bg-blue-600 peer-checked:bg-blue-500 font-semibold text-sm cursor-pointer transition-all justify-center items-center w-full border flex "
                            onclick="loadLast_n_HoursData(96)">4 days</label>
                    </div>

                </div>

                <div class="text-center border-red-500 border p-2 items-center justify-center content-center">
                    <!-- Rounded switch Slide-->
                    {{-- <div> --}}
                    <span class="sw-txt border border-green-500">Slide</span>
                    {{-- </div> --}}
                    {{-- <div class="sw-txt">Slide</div> --}}

                    <label class="switch" for="slide-window">
                        <input type="checkbox" id="slide-window">
                        <span class="slider round"></span>
                    </label>
                    <span class="sw-txt border border-green-500">Add</span>
                </div>



            </div>




        </div>
    </div>
    <?php echo '<pre>'; ?>
</body>

<script src="js/chart.js"></script>
{{-- gauge --}}
<script src="{{ asset('js/gauge.js') }}"></script>

</html>
