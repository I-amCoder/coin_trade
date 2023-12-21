<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\PriceHistory;
use Illuminate\Http\Request;

class CoinsController extends Controller
{
    public function index()
    {
        $pageTitle = "Manage Coins";
        $coins = Coin::latest()->get();
        return view('backend.coins.index', compact('pageTitle', 'coins'));
    }

    public function stats()
    {
        $pageTitle = "Coins Trade Stats";
        $coins = Coin::latest()->get();
        return view('backend.coins.stats', compact('pageTitle', 'coins'));
    }

    public function updateBounderies(Request $request, $id)
    {
        $coin = Coin::findOrFail($id);

        $request->validate([
            'minimum_price_' . $id => 'required|numeric',
            'maximum_price_' . $id => 'required|numeric',
        ]);

        if ($request->input('minimum_price_' . $id) > $request->input('maximum_price_' . $id)) {
            return back()->withErrors(["minimum_price_" . $id => "Minimum Price should be less than maximum price"]);
        }


        $coin->minimum_price = $request->input('minimum_price_' . $id);
        $coin->maximum_price = $request->input('maximum_price_' . $id);

        $coin->save();

        return back()->withSuccess("Coin Price Bounderies Updated Successfully");
    }

    public function store(Request $request)
    {
        $count = Coin::count();
        if ($count < 2) {

            $request->validate([
                'price' => 'required|string',
                'minimum_price' => 'required|numeric',
                'maximum_price' => 'required|numeric',
                'logo' => 'required|mimes:png,jpg,jpeg,webp',
            ]);

            $coin = new Coin();
            $this->submit($request, $coin);

            return back()->withSuccess("Coin Saved Successfully");
        } else {
            redirect()->back()->withError("You cannot create more than two coins");
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'price' => 'required|string',
            'minimum_price' => 'required|numeric',
            'maximum_price' => 'required|numeric',
            'logo' => 'mimes:png,jpg,jpeg,webp',
        ]);

        $coin = Coin::findOrFail($id);
        $this->submit($request, $coin);

        return back()->withSuccess("Coin Saved Successfully");
    }

    public function submit(Request $request, Coin $coin)
    {
        $coin->name = $request->name;
        $coin->initial_price = $coin->initial_price ??  $request->price;
        $coin->current_price = $request->price;
        $coin->minimum_price = $request->minimum_price;
        $coin->maximum_price = $request->maximum_price;

        if ($request->hasFile('logo')) {
            $logo = uploadImage($request->logo,  filePath('Coins'));
            $coin->logo = $logo;
        }

        $coin->save();

        $history =  new PriceHistory();
        $history->coin_id = $coin->id;
        $history->prev_price = $coin->initial_price;
        $history->current_price = $coin->current_price;
        $history->save();
    }
}
