<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorites extends Model
{
    use HasFactory;

    public function getMovies()
    {
        return $this->hasOne(movies::class, 'id','movie_id');
    }
}
