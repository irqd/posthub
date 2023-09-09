<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UserProfilePicture extends Component
{   
    use WithFileUploads;

    public $profilePicture;

    public function mount()
    {
        $this->profilePicture = auth()->user()->profile->profile_picture;
    }

    public function updateProfilePicture()
    {
        $this->validate();

        // check if profile_picture is not null
        $this->checkForExistingProfilePicture(auth()->user()->profile->profile_picture);
    
        // update the profile picture
        auth()->user()->profile->update([
            'profile_picture' => $this->profilePicture->store('profile-pictures', 'public'),
        ]);

        // dispatch a toast notification
        $this->dispatch('dispatch-toast', detail: [
            'type' => 'success',
            'title' => 'Success!',
            'message' => 'Profile picture updated successfully!'
        ]);

        // removes the temporary file from the storage
        $this->_removeUpload('profilePicture', $this->profilePicture->getFilename());

        // dispatch an event to update the profile picture in the nav bar

        $this->dispatch('updateImageView', 'storage/'.auth()->user()->profile->profile_picture);

        // will set the type of profile picture to empty string
        // this will remove the button to upload a new profile picture
        $this->profilePicture = '';
    }

    public function deleteProfilePicture()
    {
        // check if profile_picture is not null then delete it
        $this->checkForExistingProfilePicture(auth()->user()->profile->profile_picture);

        // update the profile picture
        auth()->user()->profile->update([
            'profile_picture' => null,
        ]);

        // dispatch a toast notification
        $this->dispatch('dispatch-toast', detail: [
            'type' => 'success',
            'title' => 'Success!',
            'message' => 'Profile picture deleted successfully!'
        ]);

        // dispatch an event to update the profile picture in the nav bar
        $this->dispatch('updateImageView', 'images/default.svg');

        // will set the type of profile picture to null
        // this will remove the button to upload a new profile picture
        $this->profilePicture = null;
    }

    public function checkForExistingProfilePicture($path)
    {
        if($path) {
            // check if path in storage exists
            if(File::exists(public_path('storage/'.$path))){
                File::delete(public_path('storage/'.$path));
            }
        }
    }

    public function rules()
    {
        return [
            'profilePicture' => 'image|max:1024', // 1MB Max
        ];
    }

    public function render()
    {
        return view('livewire.settings.user-profile-picture');
    }
}
