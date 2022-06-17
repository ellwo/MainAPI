<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BussinseResource extends JsonResource
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

            'name'=>$this->name,
            'owner'=>$this->user->name,
            'cities'=>collect($this->cities)->map(function($city){
                return $city->name;
            })->toArray(),
            'parts'=>collect($this->parts)->map(function($part){
                return $part->name;
            })->toArray()
            ,
            'products'=>ProductResource::collection($this->products->take(2))

        ];
    }
}
