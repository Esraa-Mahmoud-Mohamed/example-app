<?php

namespace App\View\Components\EndUser;

use App\Models\TeamMember;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TeamMemberComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $teamMembers;
    public function __construct()
    {
        $this->teamMembers = TeamMember::with('user')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.end-user.team-member-component');
    }
}
