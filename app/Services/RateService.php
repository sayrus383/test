<?php

namespace App\Services;

use App\Models\Rate;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\QueryBuilder;

class RateService
{
    public function getRates(): Collection
    {
        return QueryBuilder::for(Rate::class)
            ->allowedFilters('currency')
            ->defaultSort('markup_price')
            ->get();
    }
}
