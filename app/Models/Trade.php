<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'trade_name',
        'description'
    ];



    /**
     * Attributes -----------------------------------------------------------------------
     */

    public function tradeswomenCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->tradeswomen->count()
        );
    }


    public function tradeswomen()
    {
        return $this->hasMany(Member::class);
    }
}
