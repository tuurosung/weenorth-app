<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'location',
        'town_city',
        'address',
        'email',
        'phone_number',
        'center_representative',
        'opening_hours'
    ];

    /**
     * Get the district that owns the service center.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
