<?php

namespace App\Models;

use CodeIgniter\Model;

class Seats extends Model
{
    protected $table = 'seats';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
    ];
}
