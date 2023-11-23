<?php

namespace Tests\Unit;

use App\Models\KanyeQuote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KanyeQuoteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a KanyeQuote model.
     *
     * @return void
     */
    public function testCreateKanyeQuote()
    {
        $quote = 'This is a Kanye West quote.';
        $kanyeQuote = KanyeQuote::create(['quote' => $quote]);

        $this->assertInstanceOf(KanyeQuote::class, $kanyeQuote);
        $this->assertEquals($quote, $kanyeQuote->quote);
    }
}
