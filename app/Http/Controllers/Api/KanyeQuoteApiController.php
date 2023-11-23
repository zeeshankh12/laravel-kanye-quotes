<?php

namespace App\Http\Controllers\Api;

use App\Managers\QuoteManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KanyeQuoteApiController extends Controller
{
    private $quoteManager;

    public function __construct(QuoteManager $quoteManager)
    {
        $this->quoteManager = $quoteManager;
    }

    public function getRandomQuotes(Request $request)
    {
        try {
            $quotes = $this->quoteManager->getQuotes();

            return response()->json(['quotes' => $quotes], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch quotes.', 'message' => $e->getMessage()], 500);
        }
    }

    public function refreshQuotes()
    {
        try {
            // Fetch and cache new quotes (refresh the cache)
            $quotes = $this->quoteManager->getQuotes(true);

            return response()->json(['quotes' => $quotes], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to refresh quotes.', 'message' => $e->getMessage()], 500);
        }
    }
}
