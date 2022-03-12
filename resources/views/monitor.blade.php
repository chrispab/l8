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

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</head>

<body class="bg-slate-500">


    <header>
        <nav class="flex items-center justify-between p-6 container mx-auto">
            <!-- Logo -->
            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 64">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #319795;
                        }

                        .cls-2,
                        .cls-4 {
                            fill: #2a344f;
                        }

                        .cls-2 {
                            opacity: 0.32;
                            isolation: isolate;
                        }

                        .cls-3 {
                            opacity: 0.16;
                        }

                    </style>
                </defs>
                <title>logo</title>
                <g id="Layer_2" data-name="Layer 2">
                    <g id="Layer_1-2" data-name="Layer 1">
                        <g id="Group_16" data-name="Group 16">
                            <g id="Group_15" data-name="Group 15">
                                <g id="Group_12" data-name="Group 12">
                                    <path id="Path_35" data-name="Path 35" class="cls-1"
                                        d="M53.52,1.87l-22,5.39a1.61,1.61,0,0,1-1.23-.21L19.89.25a1.57,1.57,0,0,0-1.3-.19l-18,5.3A.77.77,0,0,0,0,6.09V16.87L18.59,11.4a1.57,1.57,0,0,1,1.3.19l10.4,6.79a1.53,1.53,0,0,0,1.23.21L54,13.09V2.23a.39.39,0,0,0-.39-.38Z">
                                    </path>
                                    <path id="Path_36" data-name="Path 36" class="cls-1"
                                        d="M40.25,27.84l-8.73,2.1a1.57,1.57,0,0,1-1.23-.21l-10.4-6.8a.37.37,0,0,0-.53.11.31.31,0,0,0-.07.2V33.47a.75.75,0,0,0,.34.63l10.66,7a1.57,1.57,0,0,0,1.23.2l9.23-2.21A6.86,6.86,0,0,0,46,32.45v-.21a4.62,4.62,0,0,0-4.68-4.55A4.93,4.93,0,0,0,40.25,27.84Z">
                                    </path>
                                    <path id="Path_37" data-name="Path 37" class="cls-1"
                                        d="M40.25,50.52l-8.73,2.1a1.61,1.61,0,0,1-1.23-.21l-10.4-6.8a.38.38,0,0,0-.53.1.35.35,0,0,0-.07.21V56.15a.75.75,0,0,0,.34.63l10.66,7a1.53,1.53,0,0,0,1.23.21l9.23-2.22A6.84,6.84,0,0,0,46,55.13v-.21a4.62,4.62,0,0,0-4.68-4.55A4.39,4.39,0,0,0,40.25,50.52Z">
                                    </path>
                                </g>
                                <path id="Path_38" data-name="Path 38" class="cls-2"
                                    d="M30.86,41.29V30a1.63,1.63,0,0,0,.66,0L35.28,29l2.2,10.8-6,1.46A1.47,1.47,0,0,1,30.86,41.29Zm8.82,9.33-8.16,2a1.63,1.63,0,0,1-.66,0V64a1.63,1.63,0,0,0,.66,0l10.36-2.54Zm-8.82-32a1.63,1.63,0,0,0,.66,0l1.57-.38L30.86,7.28Z">
                                </path>
                                <g id="Group_13" data-name="Group 13" class="cls-3">
                                    <path id="Path_39" data-name="Path 39" class="cls-4"
                                        d="M19.29,11.36a1.82,1.82,0,0,1,.6.23l10.4,6.8a1.41,1.41,0,0,0,.57.22V7.27a1.41,1.41,0,0,1-.57-.22L19.89.25a1.82,1.82,0,0,0-.6-.23Z">
                                    </path>
                                    <path id="Path_40" data-name="Path 40" class="cls-4"
                                        d="M30.86,52.64a1.67,1.67,0,0,1-.57-.23l-10.4-6.8a.39.39,0,0,0-.54.11.36.36,0,0,0-.06.2V56.15a.75.75,0,0,0,.34.63l10.66,7a1.73,1.73,0,0,0,.57.22Z">
                                    </path>
                                    <path id="Path_41" data-name="Path 41" class="cls-4"
                                        d="M19.89,22.93a.39.39,0,0,0-.54.11.36.36,0,0,0-.06.2V33.47a.75.75,0,0,0,.34.63l10.66,7a1.58,1.58,0,0,0,.57.22V30a1.43,1.43,0,0,1-.57-.23Z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>

            <!-- Menu items -->
            <div class="text-lg text-gray-600 hidden lg:flex">
                <a href="#" class="block mt-4 lg:inline-block text-teal-600 lg:mt-0 mr-10">
                    Home
                </a>
                <a href="#" class="block mt-4 lg:inline-block hover:text-gray-700 lg:mt-0 mr-10">
                    Services
                </a>
                <a href="#" class="block mt-4 lg:inline-block hover:text-gray-700 lg:mt-0 mr-10">
                    Portfolio
                </a>
                <a href="#" class="block hover:text-gray-700 mt-4 lg:inline-block lg:mt-0 mr-10">
                    Company
                </a>
                <a href="#" class="block hover:text-gray-700 mt-4 lg:inline-block lg:mt-0">
                    Contact
                </a>
            </div>

            <!-- CTA and Hamburger icon -->
            <div class="flex items-center">
                <div class="mr-5 lg:mr-0">
                    <button class="py-2 px-6 rounded-md text-gray-600 hover:text-gray-700 text-lg">Sign in</button>
                    <button class="py-2 px-6 bg-teal-500 hover:bg-teal-600 rounded-md text-white text-lg">Sign
                        up</button>
                </div>
                <div class="block lg:hidden">
                    <button
                        class="flex items-center px-4 py-3 border rounded text-teal-500 border-teal-500 focus:outline-none">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
    </header>


    <div class="flex items-center justify-between p-6 container mx-auto">
        <div class="column left-side border" >
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

        <div class="column middle border-purple-600" >
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>

        <div class="column right-side border">
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
    </div>
    <?php echo '<pre>'; ?>
</body>

<script src="js/chart.js"></script>

</html>
