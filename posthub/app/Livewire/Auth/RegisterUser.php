<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\UserProfile;
use App\Livewire\Forms\RegisterForm;
use App\Livewire\Forms\UserProfileForm;

class RegisterUser extends Component
{
    public RegisterForm $userForm;
    public UserProfileForm $profileForm;

    public bool $isNext = false;

    public function next()
    {   
        $this->userForm->validate();
        $this->isNext = !$this->isNext;
    }

    public function register()
    {   
        $this->userForm->validate();
        $this->profileForm->validate();

        //dd($this->userForm, $this->profileForm);

        return redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.auth.register-user');
    }
}
