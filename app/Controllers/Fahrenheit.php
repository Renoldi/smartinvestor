<?php

namespace App\Controllers;

use App\Models\Faq;
use App\Models\Menu;
use App\Models\Contact;
use App\Controllers\BaseController;

class Fahrenheit extends BaseController
{
    public function index()
    {
        $faqs = new Faq();
        $contact = new Contact();
        $menu = new Menu();
        $paginate =  $faqs->where('menu',4)->paginate(10, 'fags');
        $pager =  $faqs->where('menu',4)->pager;
        $quote = ucwords("build your financial freedom with");
        $data = [
            'title' => ucfirst("smartinvestor"),
            'domain' => ucfirst($_SERVER['SERVER_NAME']),
            'pager' => $pager,
            'quote' => $quote,

            'paginate' => $paginate,
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
