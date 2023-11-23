<?php

namespace App\Managers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class QuoteManager
{
    private $apiUrl = 'https://api.kanye.rest/';

    public function getQuotes($refresh = false)
    {
        try {
            if ($refresh) {
                Cache::forget('kanye.quotes');
            }

            if (Cache::has('kanye.quotes')) {
                return Cache::get('kanye.quotes');
            }

            $quotes = [];
            for ($i = 0; $i < 5; $i++) {
                $response = Http::get($this->apiUrl . 'quotes');

                if ($response->successful()) {
                    $quotes[] = $response->json()['quote'];
                } else {
                    throw new \Exception($response->body(), $response->status());
                }
            }

            Cache::put('kanye.quotes', $quotes, now()->addHour());

            return $quotes;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
