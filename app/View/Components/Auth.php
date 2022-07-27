<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\View\Component;

class Auth extends Component
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var User
     */
    public User $currentUser;

    /**
     * Create a new component instance.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
        $this->currentUser = FacadesAuth::user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth');
    }
}
