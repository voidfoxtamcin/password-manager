<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_password',
        'deskripsi_password',
        'username',
        'password'
    ];
}
