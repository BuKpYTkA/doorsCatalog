<?php

namespace App\Http\Resources;

use App\Entity\Brand\Brand;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
         * @var Brand $this
         */
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle()
        ];
    }
}
