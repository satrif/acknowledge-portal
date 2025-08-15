<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SpasiboForm extends Component
{
    public $to = '';
    public function render()
    {
        $users = User::all();
        return view('livewire.spasibo-form', [
            'users' => $users,
        ]);
    }
}
