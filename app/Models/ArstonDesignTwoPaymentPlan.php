<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArstonDesignTwoPaymentPlan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function design_two(): BelongsTo
    {
        return $this->belongsTo(ArstonDesignTwo::class);
    }
}
