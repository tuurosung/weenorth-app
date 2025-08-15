<?php

namespace App\Models\ResumeBuilder;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class WorkExperience extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = Auth::user()->id;
        });
    }

    protected $table = 'resume_work_experiences';

    protected $fillable = [
        'user_id',
        'employment_type',
        'job_title',
        'company_name',
        'location',
        'start_date',
        'end_date',
        'description'
    ];



    /**
     * Attributes ----------------------------------------------------------------
     */


    public function duration(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->calcDuration() .  ($this->still_working_here ? ' (Present)' : '')
        );
    }




    /**
     * Methods
     */

    private function calcDuration()
    {
        $start = Carbon::parse($this->start_date);
        $end = $this->end_date ? Carbon::parse($this->end_date) : now();
        $diff = $start->diff($end);
        $years = $diff->y;
        $months = $diff->m;

        $result = $years ? $years . ' year' . ($years > 1 ? 's' : '') : '';
        $result .= $months ? ($years ? ' ' : '') . $months . ' month' . ($months > 1 ? 's' : '') : '';

        return $result;
    }
}
