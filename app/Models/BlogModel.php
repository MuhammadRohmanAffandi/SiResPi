<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'Blog';
    protected $fillable = [
        'users_id',
        'judul',
        'deskripsi',
        'foto',
        'tanggal',
    ];
    use HasFactory;
}
