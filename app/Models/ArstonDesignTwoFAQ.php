<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArstonDesignTwoFAQ extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the design_two that owns the ArstonDesignTwoFAQ
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function design_two(): BelongsTo
    {
        return $this->belongsTo(ArstonDesignTwo::class);
    }
}
