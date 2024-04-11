<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
   public function mount(){
        $this->logout();
   }
   
   public function logout(){
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();
    return redirect()->route('login');
   }
}
