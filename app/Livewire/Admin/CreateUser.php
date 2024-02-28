<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Region;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\CreateUserForm;

class CreateUser extends Component
{
    public CreateUserForm $form;

    public function create()
    {
        $this->validate();
        $this->form->password = bcrypt($this->form->password);
        User::create(
            $this->form->all()
        );
        $this->reset();
        return redirect()->route('admin.users')->with('stored', 'Berhasil Mendaftar User');
    }

    public function render()
    {
        return view('livewire.admin.create-user', ['regions' => Region::all()]);
    }
}
