<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use Illuminate\Http\Request;

class CoinsController extends Controller
{
    public function index()
    {
        $pageTitle = "Manage Coins";
        $coins = Coin::all();
        return view('backend.coins.index',compact('pageTitle','coins'));
    }
}
