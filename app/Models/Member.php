<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
    }


    protected $table = 'members';

    protected $fillable = [
        'member_id',
        'cohort',
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'region_id',
        'district_id',
        'trade_id',
        'experience_years',
        'skill_level',
        'membership_type',
        'membership_status',
        'joined_date',
        'profile_photo',
        'bio',
        'certification_documents',
        'is_verified',
        'email_verified_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_date' => 'date',
        'email_verified_at' => 'datetime',
        'is_verified' => 'boolean',
        'certification_documents' => 'array',
        'experience_years' => 'integer',
    ];


    /**
     * Attributes -------------------------------------------------------------------
     */


    /**
     * Get the full name of the member.
     *
     * @return Attribute
     */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => "{$this->first_name} {$this->last_name}"
        );
    }


    public function statusBadge(): Attribute
    {
        return Attribute::make(
            get: fn() => match($this->membership_status) {
                'active' => '<span class="badge bg-success">Active</span>',
                'inactive' => '<span class="badge bg-secondary">Inactive</span>',
                'suspended' => '<span class="badge bg-danger">Suspended</span>',
                'pending' => '<span class="badge bg-warning">Pending</span>',
                default => '<span class="badge bg-light">Unknown</span>',
            }
        );
    }




    /**
     * Relationships ----------------------------------------------------------------
     */



    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function trade(): BelongsTo
    {
        return $this->belongsTo(Trade::class);
    }

}
