<?php
$section = "";
$star = "";
$end = "";
$container = "";
$x = 0;
$length = count($pages);
$show = '';
foreach ($pages as $page) {
    if ($page->display == "all") {
        if ($x % 2) {
            $container = '
            <div class="col-md-4" data-aos="fade-right">
                <img src="' . base_url("assets/img/" . $page->image) . '" class="img-fluid" alt="">
            </div>
            <div class="col-md-8 pt-4" data-aos="fade-up">
            ' . $page->decs . '
            </div>';
        } else {
            $container =
                '<div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                <img src="' . base_url("assets/img/" . $page->image) . '" class="img-fluid" alt="">
            </div>
            <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            ' . $page->decs . '
            </div>
        ';
        }
    } else if ($page->display == "img") {
        $container =
            '<div class="col-md-12" data-aos="fade-left">
            <img src="' . base_url("assets/img/" . $page->image) . '" class="img-fluid" alt="">
        </div>';
    } else {
        $container =
            ' <div class="col-md-12 " data-aos="fade-up">
            ' . $page->decs . '
        </div>';
    }

    $show .=
        '<section id="' . $page->section . '" class="details">
            <div class="container">
                <div class="row content">
                    ' . $container . '
                </div>
            </div>
        </section >';
    $x++;
}

echo $show;
