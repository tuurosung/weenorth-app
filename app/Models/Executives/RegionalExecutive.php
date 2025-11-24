<?php

namespace App\Models\Executives;

use App\Models\Member;
use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class RegionalExecutive extends Model
{


    protected $fillable = [
        'weenorth_id',
        'region_id',
        'position',
    ];

    public function positionName(): Attribute
    {
        $positions = config('weenorth.the-network.executive_positions');

        return Attribute::make(
            get: fn () => $positions[$this->position]
        );
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'weenorth_id', 'weenorth_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}
