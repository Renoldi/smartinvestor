<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Contact extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    protected $attributes = [
        'name' => null,
        // 'address' => null,
        // 'phone' => null,
        // 'whatsapp' => null,
        // 'facebook' => null,
        // 'telegram' => null,
        // 'instagram' => null,
        // 'password' => null,
        'email' => null,
        'message' => null,
        'subject' => null,
    ];
}
