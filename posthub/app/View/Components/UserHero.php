<?php

namespace App\View\Components;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class UserHero extends Component
{   
    public $user;
    /**
     * Create a new component instance.
     */
    public function __construct(public int $userId)
    {
        $this->user = User::find($this->userId);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-hero');
    }
}
