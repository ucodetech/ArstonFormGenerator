<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Register extends Component
{

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';


    public function updatedEmail(){
        //check if email already exist in the database
      return  $this->validate(
        [ 
            'email' => ['email','unique:'.User::class]
        ]);
    }

    public function updatedPassword(){
        $validated = $this->validate([
            'password_confirmation' => ['string', Rules\Password::defaults()],
        ]);
        return $validated;
    }

    public function updatedPasswordConfirmation(){
        $validated = $this->validate([
            'password_confirmation' => ['same:password']

         ]);
        return $validated;
    }
    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
    
    public function render()
    {
        return view('livewire.auth.register');
    }
}
