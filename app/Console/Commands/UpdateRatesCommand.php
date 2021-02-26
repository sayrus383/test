<?php

namespace App\Console\Commands;

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

    protected $blockChainService;

    /**
     * Create a new command instance.
     *
     * @param BlockChainService $blockChainService
     */
    public function __construct(BlockChainService $blockChainService)
    {
        $this->blockChainService = $blockChainService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $rates = $this->blockChainService->rates();

        foreach ($rates as $rate) {
            Rate::create([
                'currency'     => $rate->getCurrency(),
                'price'        => $rate->getPrice(),
                'markup_price' => $rate->getMarkupPrice(),
                'symbol'       => $rate->getSymbol(),
            ]);
        }
    }
}
