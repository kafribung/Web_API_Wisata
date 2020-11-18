<?php

namespace App\Http\Resources;

use App\Http\Resources\TravelimageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'          => $this->name,
            'description'   => $this->description,
            'location'      => $this->location,
            'bg'            => url('storage', $this->bg),
            'slug'          => $this->slug,
            'author'        => $this->user->name,
            'travel_images' => TravelimageResource::collection($this->travelImages),
            'created_at'    => $this->created_at->diffForHumans(),
        ];
    }
}
