<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Menu extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    protected $attributes = [
        'menu' => null,
        'submenu' => null,
        'sort' => null,
        'active' => null,
        'url' => null,
    ];
}
