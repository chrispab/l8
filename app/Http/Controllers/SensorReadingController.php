<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SensorReading;

class SensorReadingController extends Controller
{
    public function index()
    {
        return SensorReading::all();
    }

    public function show($id)
    {
        return SensorReading::find($id);
    }

    public function store(Request $request)
    {
        return SensorReading::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $Reading = SensorReading::findOrFail($id);
        $Reading->update($request->all());

        return $Reading;
    }

    public function delete(Request $request, $id)
    {
        $Reading = SensorReading::findOrFail($id);
        $Reading->delete();

        return 204;
    }
}
