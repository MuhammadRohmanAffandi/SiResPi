<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    protected $table = 'review';
    protected $fillable = [
        'users_id',
        'resep_id',
        'review',
        'tanggal',
    ];
    use HasFactory;
}
