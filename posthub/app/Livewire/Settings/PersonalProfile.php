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
        'social_links.*.name' => 'nullable|string|max:255',
        'social_links.*.link' => 'nullable|url|max:255',
    ])]
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
                'link' => 'https://',
            ];
        }
    }

    public function addSocialLink()
    {
        $this->social_links[] = [
            'id' => null,
            'user_id' => null,
            'name' => null,
            'link' => 'https://',
        ];
    }

    public function removeSocialLink($index)
    {
        unset($this->social_links[$index]);
    }

    public function update()
    {
        $updatedForm = $this->form->validate();
        $this->validate();

        DB::transaction(function () use ($updatedForm) {
            // Updates profile
            $this->userProfile->update($updatedForm);

            // create/update social links
            // temp solution, need to find a better way to do this

            TODO: // need to find a better way to do this
            foreach($this->social_links as $social_link) {
                SocialLinks::updateOrCreate(
                    ['id' => $social_link['id']],
                    [
                        'user_id' => auth()->id(),
                        'name' => $social_link['name'],
                        'link' => $social_link['link'],
                    ]
                );
            }

            $this->dispatch('dispatch-toast', detail: [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Your profile has been updated.',
            ]);
        });
    }

    public function validationAttributes()
    {
        return [
            'social_links.*.name' => 'social link name',
            'social_links.*.link' => 'social link url',
        ];
    }

    public function render()
    {
        return view('livewire.settings.personal-profile');
    }
}
