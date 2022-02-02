<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class Home extends BaseController
{

    public function index()
    {
        $data['title'] = ucfirst("smartinvestor");
        $data['domain'] = ucfirst($_SERVER['SERVER_NAME']);
        $data['main'] = [
            "about" => "main/about",
            "features" => "main/features",
            "counts" => "main/counts",
            "details" => "main/details",
            "gallery" => "main/gallery",
            "testimonials" => "main/testimonials",
            "team" => "main/team",
            "pricing" => "main/pricing",
            "faq" => "main/faq",
            "contact" => "main/contact",
        ];
        return view('template', $data);
    }
    public function uploadimga()
    {
        return view('upload_form');
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,100]'
                    . '|max_dims[userfile,1024,768]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move('assets/uploads/', $newName);

            $data = ['uploaded_flleinfo' => new File($img)];

            return view('upload_success', $data);
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            return view('upload_form', $data);
        }
    }

    public function AutoTrade()
    {
        echo "AutoTrade";
    }
}
