<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArstonDesignOneFAQ extends Model
{
    use HasFactory;

    public $table = 'arston_design_one_faqs';
    protected $guarded = [];
    
    public function design_one(): BelongsTo
    {
        return $this->belongsTo(ArstonDesignOne::class);
    }
}
