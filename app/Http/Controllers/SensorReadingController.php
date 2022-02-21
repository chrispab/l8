<?php

namespace App\Http\Controllers;

use App\Models\SensorReading;
use Illuminate\Http\Request;
use App\Http\Resources\SensorReadingResource;
class SensorReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SensorReading::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nHours()
    {
        return SensorReading::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return SensorReading::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SensorReading  $sensorReading
     * @return \Illuminate\Http\Response
     */
    public function show(SensorReading $sensorReading)
    {
        // return $sensorReading;
        return new SensorReadingResource($sensorReading);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SensorReading  $sensorReading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SensorReading $sensorReading)
    {
        $Reading = SensorReading::findOrFail($sensorReading);
        $Reading->update($request->all());

        return $Reading;    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SensorReading  $sensorReading
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorReading $sensorReading)
    {
        // $Reading = SensorReading::findOrFail($sensorReading);
        $sensorReading->delete();

        return 204;    }
}
