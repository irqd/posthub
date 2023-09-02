<?php

namespace App\Livewire\Auth;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\RegisterForm;
use Illuminate\Auth\Events\Registered;
use App\Livewire\Forms\UserProfileForm;

class RegisterUser extends Component
{
    public RegisterForm $userForm;
    public UserProfileForm $profileForm;

    public bool $isNext = false;
    public $user = null;

    public function next()
    {   
        $this->userForm->validate();
        $this->isNext = !$this->isNext;
    }

    public function register()
    {   
        $this->userForm->validate();
        $this->profileForm->validate();

        try {
            DB::transaction(function () {
                // Create new user
                $this->user = User::create(
                    $this->userForm->all()
                );

                // Create new user profile
                $this->user->profile()->create(
                    $this->profileForm->only([
                        'first_name',
                        'last_name',
                        'birthday',
                        'age',
                    ])
                );
            });
        } catch (Exception $e) {
            session()->flash('danger', 'Something went wrong creating your account. Please try again.');
            return;
        }

        // authenticate user
        auth()->login($this->user);

        return $this->redirect(event(new Registered($this->user)));
    }

    public function render()
    {
        return view('livewire.auth.register-user');
    }
}
