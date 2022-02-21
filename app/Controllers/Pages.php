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
            ],

        ]);

        $valid = [
            'menu'     => 'required|numeric',
            'display'  => 'required|alpha|min_length[3]',
            'section'  => 'required|alpha|min_length[3]',
            'active'   => 'required|numeric',
        ];

        $entity->fill($post);
        if (array_key_exists("active", $post)) {
            $entity->active =  1;
        } else {
            $entity->active =  0;
        }

        if ($post["display"] == "all") {
            $valid['decs'] = 'required|min_length[3]';
            $pageModel->setValidationRules($valid);

            if ($validated) {
                $entity->image = $file->getRandomName();
                $writePath = './upload/';
                $file->move($writePath, $entity->image);
                if (!$pageModel->save($entity)) {
                    $data["validation"] =   $pageModel->errors();
                    return view('pages', $data);
                } else {
                    $this->response->redirect(base_url("pages"));
                }
            } else {
                $data["validation"][] =   $this->validator->getError('image');
                return view('pages', $data);
            }
        } else if ($post["display"] == "img") {

            $pageModel->setValidationRules($valid);

            if ($validated) {
                $entity->image = $file->getRandomName();
                $writePath = './upload/';
                $file->move($writePath, $entity->image);
                if (!$pageModel->save($entity)) {
                    $data["validation"] =   $pageModel->errors();
                    return view('pages', $data);
                } else {
                    $this->response->redirect(base_url("pages"));
                }
            } else {
                $data["validation"][] =   $this->validator->getError('image');
                return view('pages', $data);
            }
        } else {
            $valid['decs'] = 'required|min_length[3]';
            $pageModel->setValidationRules($valid);

            $entity->image = "";
            if (!$pageModel->save($entity)) {
                $data["validation"] =   $pageModel->errors();
                return view('pages', $data);
            } else {
                $this->response->redirect(base_url("pages"));
            }
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
