<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

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

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getStatusBadgeAttribute(): string
    {
        return match($this->membership_status) {
            'active' => '<span class="badge bg-success">Active</span>',
            'inactive' => '<span class="badge bg-secondary">Inactive</span>',
            'suspended' => '<span class="badge bg-danger">Suspended</span>',
            'pending' => '<span class="badge bg-warning">Pending</span>',
            default => '<span class="badge bg-light">Unknown</span>',
        };
    }
}
