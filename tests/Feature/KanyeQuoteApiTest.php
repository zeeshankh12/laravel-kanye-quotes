<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KanyeQuoteApiTest extends TestCase
{
    /**
     * Test fetching 5 random Kanye West quotes.
     *
     * @return void
     */
    public function testGetRandomQuotes()
    {
        $response = $this->withHeaders([
            'Authorization' => env('API_TOKEN'), // Replace with the actual API token
        ])->get('/api/quotes');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'quotes',
        ]);

        $quotes = $response->json('quotes');
        $this->assertCount(5, $quotes);
        foreach ($quotes as $quote) {
            $this->assertIsString($quote);
        }
    }

    /**
     * Test refreshing quotes and fetching the next 5 random quotes.
     *
     * @return void
     */
    public function testRefreshQuotes()
    {
        $response = $this->withHeaders([
            'Authorization' => env('API_TOKEN'), // Replace with the actual API token
        ])->get('/api/quotes/refresh');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'quotes',
        ]);

        $quotes = $response->json('quotes');
        $this->assertCount(5, $quotes);
        foreach ($quotes as $quote) {
            $this->assertIsString($quote);
        }
    }

    /**
     * Test unauthorized access to quotes API without a valid token.
     *
     * @return void
     */
    public function testUnauthorizedAccess()
    {
        $response = $this->get('/api/quotes');

        $response->assertStatus(401);
    }
}
