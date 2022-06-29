<?php

namespace App\Models;

use CodeIgniter\Model;

class Screenings extends Model
{
    protected $table = 'screenings';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'movie_id',
        'studio_id',
        'price',
        'start_time',
    ];
}
