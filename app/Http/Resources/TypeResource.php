<?php

namespace App\Http\Resources;

use App\Entity\ProductTypes\MainProductType;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
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
         * @var MainProductType $this
         */
        return [
            'id' => $this->getId(),
            'single' => $this->getSingle(),
            'multiple' => $this->getMultiple()
        ];
    }
}
