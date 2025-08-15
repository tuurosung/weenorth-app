<?php

namespace App\Models\ResumeBuilder;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Bio extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = Auth::user()->id;
        });
    }

    protected $table = 'resume_bio';


    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'residential_address',
        'date_of_birth',
        'gender',
        'personal_statement',
    ];


}
