<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate('required', message: 'Nama Lengkap harus di isi')]
    public $name = '';

    #[Validate('required', message: 'Tipe Orang Tua harus di isi')]
    public $type = '';

    #[Validate('required', message: 'Harap pilih asal Region anda')]
    public $region_id = '';

    #[Validate('required', message: 'Username harus di isi')]
    #[Validate('min:3', message: 'Username minimal :min huruf')]
    #[Validate('regex:/^\S*$/i', message: 'Username tidak boleh mengandung spasi')]
    public $username = '';

    #[Validate('required', message: 'Password harus di isi')]
    #[Validate('min:3', message: 'Password minimal :min huruf')]
    public $password = '';
}
