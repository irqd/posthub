<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UserProfilePicture extends Component
{   
    use WithFileUploads;

    public $profilePicture;

    public function updateProfilePicture()
    {
        $this->validate([
            'profilePicture' => 'image|max:1024', // 1MB Max
        ]);

        auth()->user()->profile->update([
            'profile_picture' => $this->profilePicture->store('profile-pictures', 'public'),
        ]);
    }

    public function render()
    {
        return view('livewire.settings.user-profile-picture');
    }
}
