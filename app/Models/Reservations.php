<?php

namespace App\Models;

use CodeIgniter\Model;

class Reservations extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'movie_id',
        'studio_id',
        'price',
        'start_time',
    ];
}
