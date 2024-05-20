<?php

namespace App\Livewire;

use Livewire\Component;

class LoginButton extends Component
{x
    public function redirectToLogin()
    {
        return redirect()->route('alumni');
    }

    public function render()
    {
        return view('livewire.login-button');
    }
}