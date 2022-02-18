<?php

namespace App\Models;

use App\Entities\Page as EntitiesPage;
use CodeIgniter\Model;

class Page extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = EntitiesPage::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'menu',
        'display',
        'decs',
        'image',
        'active',
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

    public function getPage($page, $where)

    {
        $datas = $this->getDistinct($page, $where);

        $result = [];
        foreach ($datas as $data => $value) {
            $subs = $this->getBySubmenu($value->section);
            if (count($subs) > 0) {
                foreach ($subs as $sub => $key) {
                    $result[ $value->section][] = $key;
                }
            } else {
                $result[ $value->section]  = [];
            }
        }
        return $result;
    }

    public function getDistinct($page, $where)
    {
        return $this->distinct()->select($page)->where('menu', $where)->findAll();
    }

    public function getBySubmenu($section)
    {
        return $this->where('section', $section)
            ->findAll();
    }
}
