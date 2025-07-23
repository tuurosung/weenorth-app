<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_name'
    ];

    /**
     * Get the districts for the region.
     */
    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    /**
     * Get the number of districts for the region.
     */
    public function getNumberOfDistrictsAttribute(): int
    {
        return $this->districts()->count();
    }
}
