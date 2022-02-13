<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Co2SensorReading extends Model
{
    use HasFactory;
    protected $fillable = ['co2', 'temperature', 'humidity', 'sample_time'];
}
