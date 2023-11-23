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
            // Check if cache needs to be refreshed
            if ($refresh) {
                Cache::forget('kanye.quotes');
            }

            // Check if quotes are cached
            if (Cache::has('kanye.quotes')) {
                return Cache::get('kanye.quotes');
            }

            $quotes = [];

            // Fetch quotes from the API (make 5 requests to gather 5 quotes)
            for ($i = 0; $i < 5; $i++) {
                $response = Http::get($this->apiUrl . 'quotes');

                if ($response->successful()) {
                    $quotes[] = $response->json()['quote'];
                } else {
                    throw new \Exception($response->body(), $response->status());
                }
            }

            // Cache quotes for 1 hour (adjust as needed)
            Cache::put('kanye.quotes', $quotes, now()->addHour());

            return $quotes;
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            throw $e;
        }
    }
}
