<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class LoginUser extends Component
{   
    public LoginForm $form;
    public $remember;

    // The maximum number of attempts to allow.
    protected $maxAttempts = 3;
    // The number of minutes to throttle for.
    protected $decaySeconds = 300;
    // Maximum 3 login attempts in 1 minute

    public function login()
    {    
        // /dd($this->form->validate());
        $this->form->validate();

        // checks if the user is using an email or username
        $field = filter_var($this->form->usernameOrEmail, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // set the credentials
        $credentials = [
            $field => $this->form->usernameOrEmail,
            'password' => $this->form->password
        ];

        $throttleKey = "login.".request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, $this->maxAttempts)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $minutes = ceil($seconds / 60); // Convert seconds to minutes and round up
            session()->flash('danger', 'Too many login attempts. Please try again in '.$minutes.' minute'.($minutes == 1 ? '' : 's'));
            return;
        }

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            return $this->redirect(route('posts.index'), navigate: true);
        }

        RateLimiter::hit($throttleKey,$this->decaySeconds);
        $attemptsLeft = RateLimiter::retriesLeft($throttleKey, $this->maxAttempts);
        session()->flash('danger', 'Invalid email or password.'.($attemptsLeft > 0 ? ' '.$attemptsLeft.' attempt'.($attemptsLeft == 1 ? '' : 's').' left.' : ''));
    }

    public function render()
    {
        return view('livewire.auth.login-user');
    }
}
