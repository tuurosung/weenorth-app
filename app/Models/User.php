<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\ResumeBuilder\Bio;
use App\Models\ResumeBuilder\Education;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'access_level',
        'password',
        'weenorth_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     *  Attributes ------------------------------------------------------------------------------
     */

    public function accessLevelDescription(): Attribute
    {
        $accessLevels = config('user.access_levels');

        return Attribute::make(
            get: fn() => $accessLevels[$this->access_level] ?? 'Unknown'
        );
    }


    /**
     * Relationships ----------------------------------------------------------------------------
     */


    public function member(): HasOne
    {
        return $this->hasOne(Member::class, 'weenorth_id', 'weenorth_id');
    }


    /**
     * Resume Relationships
     */

    public function bio(): HasOne
    {
        return $this->hasOne(Bio::class);
    }

    /**
     * Get the education associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Education>
     */
    public function resumeEducation(): HasMany
    {
        return $this->hasMany(Education::class)
            ->orderBy('start_date', 'asc');
    }


    public function workExperiences(): HasMany
    {
        return $this->hasMany(ResumeBuilder\WorkExperience::class)
            ->orderBy('start_date', 'asc');
    }


    public function skills(): HasMany
    {
        return $this->hasMany(ResumeBuilder\Skill::class)
            ->orderBy('skill_description', 'asc');
    }



    /**
     * Methods --------------------------------------------------------------------------------
     */


    /**
     * Determine if user is a member
     *
     * @return bool
     */
    public function isMember(): bool
    {
        if ($this->access_level === 'member') {
            return true;
        }

        return false;
    }


    /**
     * Determine if user is an administrator
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        if ($this->access_level === 'administrator') {
            return true;
        }

        return false;
    }
}
