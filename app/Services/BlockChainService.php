<?php

namespace App\Services;

use App\Entities\Rate;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class BlockChainService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri'        => 'https://blockchain.info',
            'timeout'         => 5.0,
            'connect_timeout' => 5.0,
        ]);
    }

    /**
     * @return Rate[]
     */
    public function rates(): array
    {
        $rates = collect($this->send());

        return $this->toEntities($rates);
    }

    /**
     * @param Collection $rates
     * @return Rate[]
     */
    private function toEntities(Collection $rates): array
    {
        $entities = [];
        foreach ($rates as $currency => $rate) {
            $entities[] = new Rate($currency, $rate['15m'], $rate['symbol']);
        }

        return $entities;
    }

    private function send()
    {
        try {
            $response = $this->client->get('/ticker');

            return json_decode($response->getBody()->getContents(), true);
        } catch (BadResponseException $exception) {
            Log::channel('blockchain')->error($exception->getResponse()->getBody()->getContents());
        } catch (\Exception $exception) {
            Log::channel('blockchain')->error($exception);
        }

        return [];
    }
}
