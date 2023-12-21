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

            $newPrice = rand($coin->minimum_price, $coin->maximum_price);
            $currentPrice = $coin->current_price;
            if ($coin->minimum_price < 1 || $coin->maximum_price < 1) {
                $newPrice =  mt_rand($coin->minimum_price * 100, $coin->maximum_price * 100) / 100;
            }
            $coin->current_price = $newPrice;

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
