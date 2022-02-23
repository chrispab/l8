<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use \App\Models\SensorReading;

class DataImportController extends Controller
{
    // const char *serverName = "http://dotty.dynu.com:8080/post-data.php";  // work hp @ home wifi

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SensorReading  $sensorReading
     * @return \Illuminate\Http\Response
     */
    public function fetchLastNSamples(Request $request, int $NSamples = 15)
    {
        //clear current data in local db
        //get data
        // $NSamples = 15;
        $api_key_value = "tPmAT5Ab3j7F9";

        $response = Http::get('http://dotty.dynu.com:8080/get-n-records.php', [
            'api_key' => $api_key_value,
            'num_records' => $NSamples,
        ]);
        $samples = json_decode($response->body());

        //put it in the local db
        $samples = $samples->data;

        SensorReading::truncate();

        foreach ($samples as $sample) {
            $sensorReading = new SensorReading;
            $sensorReading->co2 = $sample->co2;
            $sensorReading->temperature = $sample->temp;
            $sensorReading->humidity = $sample->humidity;
            $sensorReading->sample_time = $sample->sample_time;
            $sensorReading->save();
        }
        return $samples;
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SensorReading  $sensorReading
     * @return \Illuminate\Http\Response
     */
    public function getLatestSampleFrom(Request $request, int $NSamples = 15)
    {
        //clear current data in local db
        //get data
        // $NSamples = 15;
        $api_key_value = "tPmAT5Ab3j7F9";

        $response = Http::get('http://dotty.dynu.com:8080/get-n-records.php', [
            'api_key' => $api_key_value,
            'num_records' => $NSamples,
        ]);
        $samples = json_decode($response->body());

        //put it in the local db
        $samples = $samples->data;

        SensorReading::truncate();

        foreach ($samples as $sample) {
            $sensorReading = new SensorReading;
            $sensorReading->co2 = $sample->co2;
            $sensorReading->temperature = $sample->temp;
            $sensorReading->humidity = $sample->humidity;
            $sensorReading->sample_time = $sample->sample_time;
            $sensorReading->save();
        }
        return $samples;
    }
}
