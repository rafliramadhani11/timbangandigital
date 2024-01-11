<?php

namespace App\Models;

use App\Models\Anak;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timbangan extends Model
{
    use HasFactory;

    protected $fillable = ['anak_id', 'umur', 'pb', 'bb'];

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
}
