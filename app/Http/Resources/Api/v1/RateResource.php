<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Rate */
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
            $this->currency => [
                'price'        => $this->price,
                'markup_price' => $this->markup_price,
                'symbol'       => $this->symbol,
            ]
        ];
    }
}
