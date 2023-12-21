<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    public function prices()
    {
        return $this->hasMany(PriceHistory::class, 'coin_id', 'id');
    }
}