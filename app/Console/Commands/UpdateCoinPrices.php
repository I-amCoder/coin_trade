<?php

namespace App\Console\Commands;

use App\Models\Coin;
use App\Models\PriceHistory;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Pusher\Pusher;

class UpdateCoinPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coinPrice:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $coins = Coin::latest()->take(2)->get();

        foreach ($coins as $coin) {

            $minDifference = 0.05; // Set the minimum difference you want

            $basePrice = rand($coin->minimum_price * 100, $coin->maximum_price * 100) / 100;

            // Generate a small random difference within the specified range
            $priceDifference = rand(-$minDifference * 100, $minDifference * 100) / 100;

            $newPrice = $basePrice + $priceDifference;

            // Make sure the new price stays within the specified range
            $newPrice = max($coin->minimum_price, min($coin->maximum_price, $newPrice));

            // If you want to round to a specific number of decimal places, you can use number_format
            $newPrice = number_format($newPrice, 3);
            $coin->current_price = $newPrice;

            $currentPrice = $coin->current_price;


            // Create Coin Price History
            $history = new PriceHistory();
            $history->coin_id = $coin->id;
            $history->prev_price = $currentPrice;
            $history->current_price = $newPrice;

            $history->save();
            $coin->save();

            // Delete data before last 20 days
            $time = Carbon::now()->subHours(1);
            PriceHistory::where('created_at', '<', $time)->delete();

            $data['coin_id'] = $coin->id;
            $data['coin_name'] = $coin->name;
            $data['label'] = $history->created_at->format('H:i');
            $data['price'] = $history->current_price;

            // $data['coin_id'] = $coin->id;
            // $data['coin_name'] = $coin->name;
            // $data['label'] = now()->format('H:i');
            // $data['price'] = $newPrice;
            // Inside your code where the price history changes
            $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true,
            ]);
            $pusher->trigger('price-channel-local', 'price-updated', $data);
        }
    }
}
