<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Nav extends Component
{
    public $nav;
    public function mount($nav='profile')
    {
        $this->nav = $nav;
    }
    public function render()
    {
        return view('livewire.user.nav');
    }
}
