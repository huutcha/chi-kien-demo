<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $price = (new SizeResource($this->whenLoaded('sizes')[0]))->price;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'colors' => ColorResource::collection($this->whenLoaded('colors')),
            'sizes' => SizeResource::collection($this->whenLoaded('sizes')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'price' => $price,
            'salePrice' => $price * ((100 - $this->sale)/100)
        ];
    }
}
