<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Page as EntitiesPage;
use App\Models\Menu;
use App\Models\Page;

class Pages extends BaseController
{
    public function index()
    {
        $menu = new Menu();
        $getMenu = $menu->getBySubmenu(0);
        $data = [
            'menu' => $getMenu,
        ];
        return view('pages', $data);
    }

    public function new()
    {
        $menu = new Menu();
        $getMenu = $menu->getBySubmenu(0);
        $data = [
            'menu' => $getMenu,
        ];

        $post = $this->request->getPost();
        $pageModel =  new Page();
        $entity =  new EntitiesPage();
        $file = $this->request->getFile('image');

        $validated = $this->validate([
            'image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[image,1024]'
            ],
        ]);

        if ($file->getName() != "") {
            if ($validated) {
                $fileName = $file->getRandomName();
                $writePath = './upload/';
                $file->move($writePath, $fileName);
                $entity->image = $fileName;
            } else {
                $data = [
                    "uploaded" => false,
                    "error" => [
                        "messsages" => $file
                    ],
                ];
                echo "<pre>";
                var_dump($data);
                echo "</pre>";
            }
        } else
            $entity->image = "";
        $entity->fill($post);
        if (array_key_exists("active", $post)) {
            $entity->active =  1;
        } else {
            $entity->active =  0;
        }

        if (!$pageModel->save($entity)) {
            $data = [
                $pageModel->errors(),
            ];
            echo "<pre>";
            var_dump($data);
            echo "</pre>";
        } else {
            echo "<pre>";
            var_dump("success");
            echo "</pre>";
        }
    }

    public function uploadImages()
    {

        $validated = $this->validate([
            'upload' => [
                'uploaded[upload]',
                'mime_in[upload,image/jpg,image/jpeg,image/png]',
                'max_size[upload,1024]',
            ],
        ]);

        $file = $this->request->getFile('upload');
        if ($validated) {
            $fileName = $file->getRandomName();
            $writePath = './upload/';
            $file->move($writePath, $fileName);
            $data = [
                "uploaded" => true,
                "url" => base_url($writePath . $fileName),
            ];
        } else {
            $data = [
                "uploaded" => false,
                "error" => [
                    "messsages" => $file
                ],
            ];
        }
        return $this->response->setJSON($data);
    }
}
