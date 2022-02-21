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
    ];

    function setActive(string $active)
    {
        $this->attributes["active"] =  $active == null ? 0 : 1;
        return $this;
    }

    function getActive()
    {
        echo '<pre>';
        var_dump($this->attributes["active"]);
        echo '</pre>';
        die;
        return $this->attributes["active"] == null ? 0 : 1;
    }
}
