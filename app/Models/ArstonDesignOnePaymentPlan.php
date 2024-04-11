<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArstonDesignOnePaymentPlan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function design_one(): BelongsTo
    {
        return $this->belongsTo(ArstonDesignOne::class);
    }

   
}
