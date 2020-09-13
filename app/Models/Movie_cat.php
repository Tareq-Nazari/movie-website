<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_cat extends Model
{
    public $timestamps = false;
    protected $table = 'movie_ct';
    use HasFactory;
}
