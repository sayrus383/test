<?php

namespace App\Http\Controllers\Api\v1;

use App\Entities\Rate;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\RateResource;
use App\Services\BlockChainService;
use Illuminate\Http\Request;

class RateController extends Controller
{
    protected $blockChainService;

    public function __construct(BlockChainService $blockChainService)
    {
        $this->blockChainService = $blockChainService;
    }

    public function index()
    {
        $rates = $this->blockChainService->rates();

        return RateResource::collection($rates);
    }
}
