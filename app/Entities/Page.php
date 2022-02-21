<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Page extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'menu' => null,
        'display' => null,
        'decs' => null,
        'image' => null,
        'active' => null,
        'section' => null,
    ];
 
}
