<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisterForm extends Form
{   
    // ['required','string', 'min:6', 'max:255','unique:users,username']
    #[Rule('required|string|min:6|max:255|unique:users,username', as: 'username')]
    public $username = '';

    // ['required','string','email','max:255','unique:users,email']
    #[Rule('required|email|max:255|unique:users,email', as: 'email')]
    public $email = '';

    // ['required','string','min:8','regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/']
    #[Rule('regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/', as: 'password')]
    #[Rule('required', as: 'password')]
    #[Rule('string', as: 'password')]
    #[Rule('min:8', as: 'password')]
    public $password = '';
    
    #[Rule('required|same:userForm.password', as: 'confirm password')]
    public $password_confirmation = '';
}
