<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Menu;

class AutoTrade extends BaseController
{
    public function index()
    {
        $faqs = new Faq();
        $contact = new Contact();
        $menu = new Menu();
        $paginate =  $faqs->paginate(10, 'fags');
        $quote = ucwords("build your financial freedom with");
        $pager =  $faqs->pager;
        $data = [
            'title' => ucfirst("smartinvestor"),
            'domain' => ucfirst($_SERVER['SERVER_NAME']),
            'pager' => $pager,
            'paginate' => $paginate,
            'quote'=>$quote,

            'menu' => $menu->getMenu(),
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
}
