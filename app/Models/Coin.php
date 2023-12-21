<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    protected $appends = ['price_jsons','chart_labels'];

    public function prices()
    {
        return $this->hasMany(PriceHistory::class, 'coin_id', 'id');
    }


    public function getPriceJsonsAttribute()
    {
        // Get the current time
        $now = Carbon::now();


        // $startTime = $now->subMinutes(20);
        $startTime = $now->subDays(20);

        $prices = $this->prices()->where('created_at', '>', $startTime)->pluck('current_price');

        return json_encode($prices);
    }

    public function getChartLabelsAttribute()
    {
        // Get the current time
        $now = Carbon::now();


        // $startTime = $now->subMinutes(20);
        $startTime = $now->subDays(20);
        $labels = $this->prices()->where('created_at', '>', $startTime)->pluck('created_at');
        $formatted = $labels->map(function ($item) {
            return $item->format('H:i');
        });
        return json_encode($formatted);
    }
}
