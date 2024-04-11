<?php

namespace App\Traits;

use App\Models\Superuser;
use Carbon\Carbon;

trait WithUpdateLastLogin
{
    public function updateLastLogin():void
    {
         $this->lastLogin();
    }
    protected function lastLogin() : void
    {
        Superuser::where('id', auth('superuser')->user()->id)->update([
            'super_last_login' => now()
        ]);
    }


}
