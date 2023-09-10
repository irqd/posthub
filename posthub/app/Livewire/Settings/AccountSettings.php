<?php

namespace App\Livewire\Settings;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Livewire\Forms\AccountForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSettings extends Component
{   
    public $username;
    public $email;
    public $old_password;
    public $new_password;
    public $password_confirmation;

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->email = auth()->user()->email;
    }

    public function update() 
    {
        $this->validate();

        $user = User::find(auth()->user()->id);
        
        if (Hash::check($this->old_password, $user->password)) {

            if(Hash::check($this->new_password, $user->password)) {
                $this->dispatch('dispatch-toast', detail: [
                    'type' => 'danger',
                    'title' => 'Error!',
                    'message' => 'New password cannot be the same as old password.',
                ]);

                return;
            }

            $user->update([
                // 'username' => $this->username,
                // 'email' => $this->email,
                'password' => Hash::make($this->new_password),
            ]);

            auth()->logout();
            session()->invalidate();
            session()->regenerateToken();

            session()->flash('success', 'Password updated successfully. Please login again.');
            
            return $this->redirect(route('auth.login'), navigate: true);
        } else {
            $this->dispatch('dispatch-toast', detail: [
                'type' => 'danger',
                'title' => 'Error!',
                'message' => 'Incorrect password.',
            ]);
        }
    }

    public function rules()
    {
        return [
            'username' => [
                'required', 
                'string', 
                'min:6', 
                'max:255',
                Rule::unique('users', 'username')->ignore(auth()->user()->id),
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore(auth()->user()->id),
            ],

            'old_password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/',
            ],

            'new_password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/',
            ],

            'password_confirmation' => [
                'required',
                'same:new_password',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'username',
            'email' => 'email',
            'old_password' => 'old password',
            'new_password' => 'new password',
            'password_confirmation' => 'confirm password',
        ];
    }

    public function render()
    {
        return view('livewire.settings.account-settings');
    }
}
