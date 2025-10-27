<?php

namespace App\Models\ServiceRequests;

use App\Models\Trade;
use App\Models\Region;
use App\Models\District;
use App\Models\ServiceCenter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ServiceRequest extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = Auth::user()->id;
        });
    }


    protected $primaryKey = 'id';
    protected $keyType = 'int';


    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone',
        'region_id',
        'district_id',
        'service_center_id',
        'trade_id',
        'description',
        'status'
    ];


    /**
     * Attributes ------------------------------------------------------------------------------
     */

    public function statusColour(): Attribute
    {
        return Attribute::make(
            get: fn() => match($this->status) {
                'pending' => 'text-warning',
                'approved' => 'text-success',
                'rejected' => 'text-danger',
                default => 'text-muted',
            }
        );
    }





    /**
     * Relationships ---------------------------------------------------------------------------
     */


    /**
     * Get the district associated with the service request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<District, ServiceRequest>
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }


    /**
     * Get the region associated with the service request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Region, ServiceRequest>
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }


    /**
     * Get the service center associated with the service request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<ServiceCenter, ServiceRequest>
     */
    public function serviceCenter()
    {
        return $this->belongsTo(ServiceCenter::class);
    }


    /**
     * Get the trade associated with the service request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Trade, ServiceRequest>
     */
    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }




    /**
     * Methods ---------------------------------------------------------------------------------------------
     */


    public function isPending()
    {
        return $this->status === 'pending';
    }


    public function isApproved()
    {
        return $this->status === 'approved';
    }


    public function isRejected()
    {
        return $this->status === 'rejected';
    }
}
