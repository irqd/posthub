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
        
        $this->socialLinks[] = [
            'id' => null,
            'user_id' => null,
            'name' => null,
            'link' => null,
        ];

        $this->socialLinksCopy = $this->socialLinks;
    }

    public function addSocialLink()
    {
        $this->socialLinks[] = [
            'id' => null,
            'user_id' => null,
            'name' => null,
            'link' => null,
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
            // if social link name and link is not empty
            // update or create else do nothing.
            if(!empty($socialLInk['name']) && !empty($socialLInk['link'])) {
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
    }

    public function deleteSocialLinks(array $socialLinksCopy, array $socialLinks)
    {   
        // check for difference in social links and social links copy
        // if there is a difference delete.
        $diff = array_udiff($socialLinksCopy, $socialLinks, function ($a, $b) {
            return $a['id'] - $b['id'];
        });
        
        if(!empty($diff)) {
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
