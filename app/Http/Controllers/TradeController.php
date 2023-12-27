<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Trade;
use App\Models\User;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function trade()
    {
        $coins = Coin::latest()->take(2)->get();
        return view('theme4.user.trade', compact('coins'));
    }


    public function tradeCoin(Request $request, $id)
    {
        // Validate coin first
        $coin = Coin::find($id);

        if (!$coin) {
            return back()->withError('Coin Not Found');
        }


        $request->validate([
            'trade_amount' . $coin->id => 'required|numeric',
            'trade_time' . $coin->id => 'required|numeric',
            'type' => 'required|in:up,down'
        ], [], [
            'trade_amount' . $coin->id => "Trade Amount",
            'trade_time' . $coin->id => 'Trade Time',
        ]);

        // Get Starting Rate
        $current_rate = $coin->current_price;

        $user = User::find(auth()->user()->id);

        $amount = $request->input('trade_amount' . $coin->id) / $current_rate;

        $user->exchange_balance -= $amount;

        $wallet = $user->wallet($coin->id);

        $wallet->amount += $request->input('trade_amount' . $coin->id);

        // Create a trade
        $trade = new Trade();
        $trade->user_id = $user->id;
        $trade->coin_id = $coin->id;
        $trade->duration = $request->input('trade_time' . $coin->id);
        $trade->duration_type = "minute";
        $trade->ends_at = now()->addMinutes($request->input('trade_time' . $coin->id));
        $trade->bid = $request->input('trade_amount' . $coin->id);
        $trade->type = $request->type;
        $trade->starting_rate = $current_rate;

        // Save the Transaction
        $trade->save();
        $wallet->save();
        $user->save();

        return back()->with(['success' => "Trade Has Been Started Successfully", 'tabactive' => $coin->id]);
    }


    public function stopTrade(Request $request, $id = null)
    {
        if ($id) {

            $trade = Trade::find($id);

            if (!$trade) {
                if ($request->ajax()) {
                    return response()->json(['error' => 'Trade Not Found']);
                }
                return back()->withError("Trade Not Found");
            }
            $this->giveReward($trade);

            if ($request->ajax()) {
                return response()->json(['success' => 'Trade Stopped Successfully']);
            }

            return back()->with(['success' => "Trade Stopped Successfully", 'tabactive' => $trade->coin_id]);
        } else {

            $trades = Trade::where('status', 0)->get();

            foreach ($trades as $trade) {
                $this->giveReward($trade);
            }
        }
    }


    public function giveReward(Trade $trade)
    {
        $coin = Coin::find($trade->coin_id);

        $user = User::find($trade->user_id);


        if ($coin && $user) {
            if (now()->greaterThanOrEqualTo($trade->ends_at)) {

                $wallet = $user->wallet($coin->id);

                $current_rate = $coin->current_price;

                $starting_rate = $trade->starting_rate;

                $bid = $trade->bid;

                $coin_amount = $bid / $current_rate;

                $difference =   ($bid / $starting_rate) - ($bid / $current_rate);


                if ($trade->type == "up") {
                    $margin = $difference + $bid;
                }

                if ($trade->type == "down") {
                    $margin = $bid - $difference;
                }

                $trade->closing_rate = $current_rate;
                $trade->margin = $margin;
                $trade->ends_at = now();
                $trade->status = 1;

                $wallet->amount -= $coin_amount;

                $user->exchange_balance += $margin;

                $wallet->save();
                $user->save();
                $trade->save();
            }
        }
    }
}
