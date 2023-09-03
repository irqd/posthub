<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use App\Models\SocialLinks;
use App\Models\UserProfile;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\UserProfileForm;

class PersonalProfile extends Component
{      
    #[Rule([
        'socialLinks.*.name' => 'nullable|string|max:255',
        'socialLinks.*.link' => 'nullable|url|max:255',
    ])]
    public array $socialLinks = [];
    public array $socialLinksCopy = [];   

    public UserProfileForm $form;
    public $userProfile;

    public function mount()
    {
        $this->userProfile = auth()->user()->profile;
        $this->form->setUserProfile($this->userProfile);

        $this->socialLinks = auth()->user()->socialLinks->toArray();

        if(count($this->socialLinks) == 0) {
            $this->socialLinks[] = [
                'id' => null,
                'user_id' => null,
                'name' => null,
                'link' => 'https://',
            ];
        }

        $this->socialLinksCopy = $this->socialLinks;
    }

    public function addSocialLink()
    {
        $this->socialLinks[] = [
            'id' => null,
            'user_id' => null,
            'name' => null,
            'link' => 'https://',
        ];
    }

    public function removeSocialLink($index)
    {
        unset($this->socialLinks[$index]);
    }

    public function update()
    {
        $updatedForm = $this->form->validate();
        $this->validate();

        DB::transaction(function () use ($updatedForm) {
            // Updates profile
            $this->userProfile->update($updatedForm);

            // Deletes social links
            $this->deleteSocialLinks($this->socialLinksCopy, $this->socialLinks);
            
            // Updates social links
            $this->updateSocialLinks($this->socialLinks);

            // Dispatches toast
            $this->dispatch('dispatch-toast', detail: [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Your profile has been updated.',
            ]);
        });
    }

    public function updateSocialLinks(array $socialLinks)
    {
        foreach($socialLinks as $socialLInk) {
            SocialLinks::updateOrCreate(
                ['id' => $socialLInk['id']],
                [
                    'user_id' => auth()->id(),
                    'name' => $socialLInk['name'],
                    'link' => $socialLInk['link'],
                ]
            );
        }
    }

    public function deleteSocialLinks(array $socialLinks, array $socialLinksCopy)
    {   
        // check for difference in social links and social links copy
        // if there is a difference delete.
        $diff = array_udiff($socialLinksCopy, $socialLinks, function ($a, $b) {
            return $a['id'] - $b['id'];
        });
        
        if(count($diff) > 0) {
            foreach($diff as $d) {
                SocialLinks::find($d['id'])->delete();
            }
        }
    }

    public function validationAttributes()
    {
        return [
            'socialLinks.*.name' => 'social link name',
            'socialLinks.*.link' => 'social link url',
        ];
    }

    public function render()
    {
        return view('livewire.settings.personal-profile');
    }
}
