<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $sub_categories = Sub_CategoryResource::collection($this->whenLoaded('sub_categories'));
        return [
            'name' => $this->name,
            'sub_categories' => $sub_categories,
            'countProduct' => $this->countProduct()
        ];
    }
}
