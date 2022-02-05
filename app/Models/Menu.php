<?php

namespace App\Models;

use App\Entities\Menu as EntitiesMenu;
use CodeIgniter\Model;

class Menu extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'menus';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = EntitiesMenu::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'menu', 'submenu', 'sort', 'active', 'url'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMenu()
    {
        $datas = $this->getBySubmenu(0);
        $result = [];
        foreach ($datas as $data => $value) {
            $result[$data]['parent'] = $value;
            $subs = $this->getBySubmenu($value->id);
            if (count($subs) > 0) {
                foreach ($subs as $sub => $key) {
                    $result[$data]['child'][] = $key;
                }
            } else {
                $result[$data]['child'] = [];
            }
        }
        // echo "<pre>";
        // print_r($result);
        // exit;
        return $result;
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function getBySubmenu($id)
    {
        return $this->where('submenu', $id)
            ->findAll();
    }
}
