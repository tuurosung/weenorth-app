<?php

namespace App\Models\ResumeBuilder;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Skill extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = Auth::user()->id;
        });
    }

    protected $table = 'resume_skills';

    protected $fillable = [
        'skill_description',
        'years_of_experience',
        'experience_level',
    ];



    /**
     * Attributes ------------------------------------------------------------------
     */


    public function experienceBgColour(): Attribute
    {
        return Attribute::make(
            get: fn () => match ($this->experience_level) {
                'Beginner' => 'bg-primary',
                'Intermediate' => 'bg-warning',
                'Expert' => 'bg-success',
                default => 'bg-secondary',
            }
        );
    }


    public function experienceTextColour(): Attribute
    {
        return Attribute::make(
            get: fn () => match ($this->experience_level) {
                'Beginner' => 'text-white',
                'Intermediate' => 'text-dark',
                'Expert' => 'text-white',
                default => 'text-dark',
            }
        );
    }
}
