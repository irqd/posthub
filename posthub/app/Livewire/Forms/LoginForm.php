<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|string', as: 'username or email')]
    public $usernameOrEmail = '';

    #[Rule('required|string')]
    public $password = '';
}
