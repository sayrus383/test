<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    public static $wrap = '';

    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'error' => [
                'message' => $this->resource
            ]
        ];
    }
}
