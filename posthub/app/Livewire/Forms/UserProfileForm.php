<?php

namespace App\Livewire\Forms;

use App\Models\UserProfile;
use Livewire\Attributes\Rule;
use Livewire\Form;

class UserProfileForm extends Form
{
    #[Rule('required|string|max:255', as: 'first name')]
    public $first_name = '';

    #[Rule('required|string|max:255', as: 'last name')]
    public $last_name = '';

    #[Rule('required', as: 'birthday')]
    #[Rule('date', as: 'birthday')]
    #[Rule('date_format:Y-m-d', as: 'birthday')]
    #[Rule('before:-18 years', message: 'You must be at least 18 years old.', as: 'birthday')]
    public $birthday = '';

    #[Rule('required|integer|min:18', as: 'age')]
    public $age = '';

    #[Rule('nullable|numeric|regex:"^9\d{9}$"', as: 'phone number')]
    public $phone_number = '';

    #[Rule('nullable|string|max:255', as: 'address 1')]
    public $address_1 = '';

    #[Rule('nullable|string|max:255', as: 'address 2')]
    public $address_2 = '';

    #[Rule('nullable|string|max:1000', as: 'bio')]
    public $bio = '';

    public function setUserProfile(UserProfile $userProfile)
    {
        $this->first_name = $userProfile->first_name;
        $this->last_name = $userProfile->last_name;
        $this->birthday = $userProfile->birthday->format('Y-m-d');
        $this->age = $userProfile->age;
        $this->phone_number = $userProfile->phone_number;
        $this->address_1 = $userProfile->address_1;
        $this->address_2 = $userProfile->address_2;
        $this->bio = $userProfile->bio;
    }
}
