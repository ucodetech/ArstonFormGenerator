<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArstonDesignOne extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the fqa for the ArstonDesignOne
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fqa(): HasMany
    {
        return $this->hasMany(ArstonDesignOneFAQ::class, 'design_id', 'id');
    }

    /**
     * Get all of the paymentPlan for the ArstonDesignOne
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentPlan(): HasMany
    {
        return $this->hasMany(ArstonDesignOnePaymentPlan::class, 'design_id', 'id');
    }
}
