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
        return view('pages');
    }

    public function new()
    {
        $menu = new Menu();
        $getMenu = $menu->getBySubmenu(0);
        $data = [
            'menu' => $getMenu,
        ];

        $post = $this->request->getPost();
        if ($post) {
            $pageModel =  new Page();
            $entity =  new EntitiesPage();
            $entity->fill($post);
            // if (!$userModel->save($entity)) {
            //     $data = [
            //         $userModel->errors(),
            //     ];
            //     return $this->respondCreated($data);
            //     // return view('template', $data);
            // } else {
            // return $this->respondCreated($entity);
            // }
        } else
            return view('pages', $data);
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
