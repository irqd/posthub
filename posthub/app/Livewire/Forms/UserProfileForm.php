<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class UserProfileForm extends Form
{
    #[Rule('required|string|max:255', as: 'first name')]
    public $firstName = '';

    #[Rule('required|string|max:255', as: 'last name')]
    public $lastName = '';

    #[Rule('required|integer|min:18', as: 'age')]
    public $age = '';

    #[Rule('required', as: 'birthday')]
    #[Rule('date', as: 'birthday')]
    #[Rule('date_format:Y-m-d', as: 'birthday')]
    #[Rule('before:-18 years', message: 'You must be at least 18 years old.', as: 'birthday')]
    public $birthday = '';
}
