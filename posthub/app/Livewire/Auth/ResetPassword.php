<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class ResetPassword extends Component
{   
    #[Rule('required|email|max:255|exists:users,email', as: 'email')]
    public $email = '';

    // ['required','string','min:8','regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/']
    #[Rule('regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/', as: 'password')]
    #[Rule('required', as: 'password')]
    #[Rule('string', as: 'password')]
    #[Rule('min:8', as: 'password')]
    public $password = '';
    
    #[Rule('required|same:password', as: 'confirm password')]
    public $password_confirmation = '';
    
    #[Rule('required')]
    public $token = '';

    public function submit()
    {
        $this->validate();

        $request = [
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token,
        ];

        $status = Password::reset(
            $request,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
        
        if ($status === Password::PASSWORD_RESET) {
            session()->flash('success', 'Password reset successfully! Please login to test new password.');
            return $this->redirect(route('auth.login'));
        } else {
            session()->flash('danger', __($status));
        }
    }

    public function render()
    {   
        return view('livewire.auth.reset-password');
    }
}
