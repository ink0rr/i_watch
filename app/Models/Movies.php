<?php

namespace App\Models;

use CodeIgniter\Model;

class Movies extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'image',
        'title',
        'description',
        'duration',
        'genre',
        'age_rating',
        'director',
        'writer',
        'stars'
    ];
}
