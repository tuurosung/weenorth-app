<?php

namespace App\Models\ResumeBuilder;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Education extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = Auth::user()->id;
        });
    }


    protected $table = 'resume_education';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'certificate_awarded',
        'certificate_type',
        'institution',
        'country',
        'region',
        'city',
        'start_date',
        'end_date',
        'currently_studying',
        'grade',
    ];



    /**
     * Attributes -------------------------------------------------------------------------------
     */


    public function educationPeriod(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->start_date . ' - ' . $this->end_date
        );
    }

    public function educationLocation(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->region . ', ' . $this->city
        );
    }
}
