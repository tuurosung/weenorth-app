<?php

namespace App\Models\Community;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

class NetworkEvent extends Model
{


    protected $fillable = [
        'event_id',
        'title',
        'date',
        'time',
        'location',
        'created_by_id',
        'description',
        'status',
    ];


    /**
     * Scope query to only return upcoming events
     *
     * @param Builder $query
     * @return void
     */
    #[Scope]
    protected function upcomingEvents(Builder $query): void
    {
        $query->whereDate('date', '>=', today());
    }



    /**
     * Attributes ----------------------------------------------------------------------------
     */


    public function createdByName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->createdBy->name
        );
    }




    /**
     * Relationships ------------------------------------------------------------------------
     */

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

}
