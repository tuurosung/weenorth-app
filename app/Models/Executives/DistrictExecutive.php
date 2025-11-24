<?php

namespace App\Models\Executives;

use App\Models\Member;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DistrictExecutive extends Model
{


    protected $fillable = [
        'weenorth_id',
        'district_id',
        'position',
    ];


    public function positionName(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            $positions = config('weenorth.the-network.executive_positions');
            return $positions[$attributes['position']] ?? 'Unknown Position';
        });
    }


    public function member()
    {
        return $this->belongsTo(Member::class, 'weenorth_id', 'weenorth_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
