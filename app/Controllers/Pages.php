<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        return view('pages');
    }

    public function uploadImages()
    {
        header("Location: http://example.com");
        die();
        // $validated = $this->validate([
        //     'upload' => [
        //         'uploaded[upload]',
        //         'mime_in[upload,image/jpg,image/jpeg,image/png]',
        //         'max_size[upload,1024]',
        //     ],
        // ]);

        // $file = $this->request->getFile('upload');
        // if ($validated) {
        //     $fileName = $file->getRandomName();
        //     $writePath = './upload/';
        //     $file->move($writePath, $fileName);
        //     $data = [
        //         "uploaded" => true,
        //         "url" => base_url($writePath . $fileName),
        //     ];
        // } else {
        //     $data = [
        //         "uploaded" => false,
        //         "error" => [
        //             "messsages" => $file
        //         ],
        //     ];
        // }
        // return $this->response->setJSON($data);
        
    }
}
