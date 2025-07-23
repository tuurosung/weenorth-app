<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'district_name'
    ];

    /**
     * Get the region that owns the district.
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Get the service centers for the district.
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
