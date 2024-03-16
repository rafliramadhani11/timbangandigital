<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Region;
use Livewire\Component;
use App\Livewire\Forms\RegisterForm;


class UserRegister extends Component
{
    public RegisterForm $form;

    public function create()
    {
        $this->validate();
        $this->form->username = strtolower($this->form->username);
        $this->form->password = bcrypt($this->form->password);
        User::create(
            $this->form->all()
        );
        $this->reset();
        return redirect('/login')->with('Registered', 'Berhasil Mendaftar Silahkan Melakukan Login');
    }

    public function render()
    {
        $regions = Region::get();
        return view(
            'livewire.user-register',
            [
                'regions' => $regions
            ]
        );
    }
}
