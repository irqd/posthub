<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Rule;

class LoginUser extends Component
{   
    // use this for live validation
    // #[Rule('validations here')]

    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('error', 'Invalid email or password.');
            return;
        }

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login-user');
    }
}
