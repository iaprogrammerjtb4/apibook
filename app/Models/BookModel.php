<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'books';

    protected $fillable = [
        'id',
        'ISBN',
        'title',
        'cover_large'
    ];

    protected $hidden = [
        
    ];
}
