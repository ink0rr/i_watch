<?php

namespace App\Models;

use CodeIgniter\Model;

class Reservations extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'screening_id',
        'seat_id',
        'paid'
    ];
}
