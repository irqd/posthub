<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterForm;
use Livewire\Component;

class RegisterUser extends Component
{
    public RegisterForm $form;

    public function register()
    {
        $this->form->validate();

        return redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.auth.register-user');
    }
}
