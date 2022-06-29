<?php

namespace App\Models;

use CodeIgniter\Model;

class Studios extends Model
{
    protected $table = 'studios';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
    ];
}
