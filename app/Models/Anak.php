<?php

namespace App\Models;

use App\Models\User;
use App\Models\Timbangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anak extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timbangans()
    {
        return $this->hasMany(Timbangan::class)->orderBy('id', 'desc');
    }
}
