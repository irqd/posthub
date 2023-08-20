<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Rule(['required','string', 'min:6', 'max:255','unique:users,username'])]
    public $username = '';

    #[Rule(['required','string','email','max:255','unique:users,email'], onUpdate: false)]
    public $email = '';

    #[Rule(['required','string','min:8', 'confirmed'], onUpdate: false)]
    public $password = '';
    
    public $password_confirmation = '';
}
