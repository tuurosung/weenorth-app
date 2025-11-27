<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Executives\DistrictExecutive;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($district) {
            // Delete all related service centers when a district is deleted
            $district->serviceCenters()->delete();
        });
    }



    protected $fillable = [
        'region_id',
        'district_name'
    ];


    /**
     * Attributes -----------------------------------------------------------------------------------
     */

    public function memberCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->members->count()
        );
    }

    /**
     * Get the region that owns the district.
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class)
            ->withDefault(['region_name' => 'Undefined Region']);
    }

    /**
     * Define the relation between districts and members
     */
    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Define the relation between districts and executives
     */
    public function executives(): HasMany
    {
        return $this->hasMany(DistrictExecutive::class);
    }

    /**
     * Define the relation between districts and service centers
     */
    public function serviceCenters(): HasMany
    {
        return $this->hasMany(ServiceCenter::class);
    }

    /**
     * Get the number of service centers for the district.
     */
    public function getNumberOfServiceCentersAttribute(): int
    {
        return $this->serviceCenters()->count();
    }
}
