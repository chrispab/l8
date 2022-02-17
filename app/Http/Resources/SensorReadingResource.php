<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SensorReadingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'co2' => $this->co2,
            'temperature' => $this->temperature,
            'sample_time' => $this->sample_time,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
