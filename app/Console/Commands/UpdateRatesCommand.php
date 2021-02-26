<?php

namespace App\Console\Commands;

use App\Contracts\Services\RateInterface;
use App\Models\Rate;
use App\Services\BlockChainService;
use Illuminate\Console\Command;

class UpdateRatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновление курсов с тикера';

    protected $rateService;

    /**
     * Create a new command instance.
     *
     * @param RateInterface $rateService
     */
    public function __construct(RateInterface $rateService)
    {
        $this->rateService = $rateService;
        parent::__construct();
    }


    public function handle()
    {
        $rates = $this->rateService->rates();

        foreach ($rates as $rate) {
            Rate::updateOrCreate(
                [
                    'currency' => $rate->getCurrency(),
                ],
                [
                    'price'        => $rate->getPrice(),
                    'markup_price' => $rate->getMarkupPrice(),
                    'symbol'       => $rate->getSymbol(),
                ]
            );
        }
    }
}
