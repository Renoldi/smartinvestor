<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Models\Faq;
use App\Models\Menu;
use CodeIgniter\Files\File;
use PhpParser\Node\Stmt\Echo_;

class Home extends BaseController
{

    public function index()
    {

        $request = \Config\Services::request();
        $controllerName = $request->uri->getSegment(1);
        $getMenu = new Menu();

        $idMenu = $getMenu->like('url', $controllerName, 'both')->findAll();

        $faqs = new Faq();
        $contact = new Contact();
        $menu = new Menu();
        $paginate =  $faqs->where('menu', $idMenu[0]->id)->paginate(10, 'fags');
        $pager =  $faqs->where('menu', $idMenu[0]->id)->pager;
        $quote = ucwords("build your financial freedom with");
        $data = [
            'title' => ucfirst("smartinvestor"),
            'domain' => ucfirst($_SERVER['SERVER_NAME']),
            'pager' => $pager,
            'paginate' => $paginate,
            'menu' => $menu->getMenu(),
            'quote'=>$quote,
            'contact' => $contact->find(1),
            'page' => $this->request->getVar('page') ? $this->request->getVar('page') : 1,
            'main' => [
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
            ]
        ];
        return view('template', $data);
    }
    public function uploadimga()
    {
        return view('upload_form');
    }

    public function uploadCkeditor()
    {
        return view('ckeditor');
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

    public function uploadImages()
    {
        $validated = $this->validate([
            'upload' => [
                'uploaded[upload]',
                'mime_in[upload,image/jpg,image/jpeg,image/png]',
                // '|is_image[upload]',
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

    public function AutoTrade()
    {
        echo "AutoTrade";
    }
}
