<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateUserForm extends Form
{
    #[Validate('required', message: 'Username harus di isi')]
    #[Validate('min:3', message: 'Username minimal :min huruf')]
    #[Validate('regex:/^\S*$/i', message: 'Username tidak boleh mengandung spasi')]
    public $username = '';

    #[Validate('required', message: 'Password harus di isi')]
    #[Validate('min:3', message: 'Password minimal :min huruf')]
    public $password = '';

    #[Validate('required', message: 'Nama Lengkap harus di isi')]
    public $name = '';

    #[Validate('required', message: 'Pekerjaan harus di isi')]
    public $pekerjaan = '';

    #[Validate('required', message: 'Tipe Orang Tua harus di isi')]
    public $type = '';

    #[Validate('required', message: 'Region harus di isi')]
    public $region_id = '';

    #[Validate('required', message: 'Jenis Kelamin harus di isi')]
    public $jeniskelamin = '';

    #[Validate('required', message: 'No Handphone harus di isi')]
    #[Validate('max:15', message: 'No Handphone tidak bisa lebih dari :max')]
    public $nohp = '';

    #[Validate('required', message: 'Tanggal Lahir harus di isi')]
    public $tgllahir = '';

    #[Validate('required', message: 'Kecamatan harus di isi')]
    public $kecamatan = '';

    #[Validate('required', message: 'Kelurahan harus di isi')]
    public $kelurahan = '';

    #[Validate('required', message: 'Alamat harus di isi')]
    public $alamat = '';
}
