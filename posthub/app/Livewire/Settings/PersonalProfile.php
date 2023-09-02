<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use App\Models\SocialLinks;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\UserProfileForm;

class PersonalProfile extends Component
{   
    public array $social_links = [];
    public UserProfileForm $form;
    public $userProfile;

    public function mount()
    {
        $this->userProfile = auth()->user()->profile;
        $this->form->setUserProfile($this->userProfile);

        $this->social_links = auth()->user()->socialLinks->toArray();

        if(count($this->social_links) == 0) {
            $this->social_links[] = [
                'id' => null,
                'user_id' => null,
                'name' => null,
                'link' => null,
            ];
        }
    }

    public function addSocialLink()
    {
        $this->social_links[] = [
            'id' => null,
            'user_id' => null,
            'name' => null,
            'link' => null,
        ];
    }

    public function removeSocialLink($index)
    {
        unset($this->social_links[$index]);
    }

    public function update()
    {
        $updatedForm = $this->form->validate();
        //dd($this->form);
        DB::transaction(function () use ($updatedForm) {
            $this->userProfile->update($updatedForm);

            $this->dispatch('dispatch-toast', detail: [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Your profile has been updated.',
            ]);
        });
        
        //$this->emit('error');
        //$this->emit('saved');
    }

    public function render()
    {
        return view('livewire.settings.personal-profile');
    }
}
