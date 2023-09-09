<?php

namespace App\Livewire\Misc;

use Livewire\Component;
use Livewire\Attributes\On;

class NavProfilePicture extends Component
{   
    public $profilePicture;

    public function mount()
    {   
        if(auth()->user()->profile->profile_picture) {
            $this->profilePicture = 'storage/'.auth()->user()->profile->profile_picture;
        } else {
            $this->profilePicture = 'images/default.svg';
        }
    }

    #[On('updateImageView')] 
    public function updateImageView($newImage)
    {
        $this->profilePicture = $newImage;
    }

    public function render()
    {
        return view('livewire.misc.nav-profile-picture');
    }
}
