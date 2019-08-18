<?php

namespace App\Http\Resources;

use App\Entity\MainProduct\MainProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class MainProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /**
         * @var MainProduct $this
         */
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'price' => $this->getPrice(),
            'brand' => new BrandResource($this->brand()),
            'type' => new TypeResource($this->type()),
            'description' => $this->getDescription(),
            'isActive' => $this->isActive()
        ];
    }
}
