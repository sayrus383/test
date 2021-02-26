<?php

namespace App\Console\Commands;

use App\Contracts\Services\RateTickerInterface;
use App\Models\Rate;
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

    protected $rateTickerService;

    /**
     * Create a new command instance.
     *
     * @param RateTickerInterface $rateService
     */
    public function __construct(RateTickerInterface $rateTickerService)
    {
        $this->rateTickerService = $rateTickerService;
        parent::__construct();
    }


    public function handle()
    {
        $rates = $this->rateTickerService->rates();

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
