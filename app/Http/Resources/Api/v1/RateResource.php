<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Entities\Rate */
class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            $this->getCurrency() => [
                'price'        => $this->getPrice(),
                'markup_price' => $this->getMarkupPrice()
            ]
        ];
    }
}
