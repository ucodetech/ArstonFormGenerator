<?php

namespace App\Traits;

use App\Models\Click;

trait WithClick
{

    public function StoreClick($id){
       Click::create([
            'post_id' => $id,
            'userAgent' => request()->userAgent(),
            'ip_address' => request()->ip(),
        ]);
    }
}