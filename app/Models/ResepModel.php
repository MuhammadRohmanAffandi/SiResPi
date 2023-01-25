<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepModel extends Model
{
    protected $table = 'resep';
    protected $fillable = [
        'users_id',
        'judul',
        'deskripsi',
        'foto',
        'tanggal',
    ];
    use HasFactory;
}
