<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Rate;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\RateResource;
use App\Services\RateService;
use Spatie\QueryBuilder\QueryBuilder;

class RateController extends Controller
{
    protected $rateService;

    public function __construct(RateService $rateService)
    {
        $this->rateService = $rateService;
    }

    public function index()
    {
        $rates = $this->rateService->getRates();

        return RateResource::collection($rates);
    }
}
