<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Trade;
use App\Models\User;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function trade(){
        $coins = Coin::latest()->take(2)->get();
        return view('theme4.user.trade',compact('coins'));
    }


    public function buyCoin(Request $request, $id)
    {
        // Validate coin first
        $coin = Coin::find($id);

        if (!$coin) {
            return back()->withError('Coin Not Found');
        }

        $request->validate([
            'trade_amount' => 'required|numeric',
            'trade_time' => 'required|numeric',
            'type' => 'required|in:buy,sell '
        ]);

        // Get Starting Rate
        $current_rate = $coin->current_price;

        $user = User::find(auth()->user()->id);

        $amount = $request->trade_amount / $current_rate;

        $user->exchange_balance -= $amount;

        $wallet = $user->wallet($coin->id);

        $wallet->amount += $request->trade_amount;

        // Create a trade
        $trade = new Trade();
        $trade->user_id = $user->id;
        $trade->coin_id = $coin->id;
        $trade->duration = $request->trade_time;
        $trade->duration_type = "minute";
        $trade->ends_at = now()->addMinutes($request->trade_time);
        $trade->bid = $request->trade_amount;
        $trade->type = "buy";
        $trade->starting_rate = $current_rate;

        // Save the Transaction
        $trade->save();
        $wallet->save();
        $user->save();

        return back()->withSuccess("Trade Has Been Started Successfully");
    }


    public function sellCoin(Request $request, $id)
    {
    }
}
