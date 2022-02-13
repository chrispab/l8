<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Co2SensorReading;

class Co2SensorReadingController extends Controller
{
    //

    public function index()
    {
        return Co2SensorReading::all();
    }

    public function show($id)
    {
        return Co2SensorReading::find($id);
    }

    public function store(Request $request)
    {
        return Co2SensorReading::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Co2SensorReading::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Co2SensorReading::findOrFail($id);
        $article->delete();

        return 204;
    }
}
