<?php

namespace App\Controllers;

use App\Models\Faq;
use App\Models\Menu;
use App\Models\Contact;
use App\Controllers\BaseController;
use App\Models\Page;

class Fahrenheit extends BaseController
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
        $menu = new Menu();
        $page = new Page();
        $pages = $page->getPage('section', 4);

        $paginate =  $faqs->where('menu', $idMenu[0]->id)->paginate(10, 'fags');
        $pager =  $faqs->where('menu', $idMenu[0]->id)->pager;
        $quote = ucwords("build your financial freedom with");
        $smartInvestor = ucwords("Smart Investor");

        $data = [
            'smartInvestor' => $smartInvestor,
            'title' => ucfirst("smartinvestor"),
            'domain' => ucfirst($_SERVER['SERVER_NAME']),
            'pager' => $pager,
            'quote' => $quote,
            'pages'=> $pages,
            'paginate' => $paginate,
            'menu' => $menu->getMenu(),
            'contact' => $contact->find(1),
            'page' => $this->request->getVar('page') ? $this->request->getVar('page') : 1,
            'main' => [
                "page" => "main/page",
                // "about" => "main/about",
                // "features" => "main/features",
                // "counts" => "main/counts",
                // "details" => "main/details",
                // "gallery" => "main/gallery",
                // "testimonials" => "main/testimonials",
                // "team" => "main/team",
                // "pricing" => "main/pricing",
                // "faq" => "main/faq",
                // "contact" => "main/contact",
            ]
        ];
        return view('template', $data);
    }
}
