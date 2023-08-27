<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{   
    #[Rule('required|email|exists:users,email')]
    public $email = '';

    public function send()
    {
        $this->validate();

        $status = Password::sendResetLink(
           ['email' => $this->email]
        );
     
        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('success', __($status));
            // back()->with(['success' => __($status)]);
        } else {
            $this->addError('email', __($status));
        }

        // return $status === Password::RESET_LINK_SENT
        //             ? back()->with(['success' => __($status)])
        //             : back()->withErrors(['email' => __($status)]);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
