<?php

namespace App\Livewire\Admin;

use App\Models\Region;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Users extends Component
{
    public function render()
    {
        return view('livewire.admin.users', [
            'user_nav' => Auth::user(),
            'regions' => Region::all()
        ]);
    }
}
