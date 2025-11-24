<?php

namespace App\Models;

use App\Models\Executives\RegionalExecutive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($region) {
            // Delete all related districts when a region is deleted
            $region->districts()->delete();
        });
    }

    protected $fillable = [
        'region_name'
    ];


    /**
     * Attributes ------------------------------------------------------------------------------------
     */

    public function numberOfMembers(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->countMembers()
        );
    }


    public function numberOfDistricts(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->districts()->count()
        );
    }


    /**
     * Relationships --------------------------------------------------------------------------------
     */

    /**
     * Get the districts for the region.
     */
    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }


    public function members(): HasMany
    {
        return $this->hasMany(Member::class, 'region_id', 'id');
    }


    public function executives(): HasMany
    {
        return $this->hasMany(RegionalExecutive::class, 'region_id', 'id');
    }

    /**
     * Get the number of districts for the region.
     */
    public function getNumberOfDistrictsAttribute(): int
    {
        return $this->districts()->count();
    }


    private function countMembers(): int
    {
        return $this->members()->count();
    }
}
