<?php
$section = "";
$star = "";
$end = "";
$x = 0;
$length = count($pages);
$show = '';
foreach ($pages as $key => $page) {
    $container = "";
    foreach ($page as $section) {
        if ($section->display == "all") {
            if ($x % 2) {
                $container .= 
                '<div class="row content" >
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="' . base_url("assets/img/" . $section->image) . '" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                    ' .  $section->decs . '
                    </div> 
                </div>';
            } else {
                $container .=
                '<div class="row content" ><div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                        <img src="' . base_url("assets/img/" . $section->image) . '" class="img-fluid" alt="">
                </div>
                    <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                    ' .  $section->decs . '
                    </div> 
                </div>
        ';
            }
        } else if ($section->display == "img") {
            $container .=
            '<div class="row content" >
                <div class="col-md-12" data-aos="fade-left">
                    <img src="' . base_url("assets/img/" . $section->image) . '" class="img-fluid" alt="">
                </div> 
            </div>';
        } else {
            $container =
                '<div class="row content" > 
                    <div class="col-md-12 " data-aos="fade-up">
                    ' .  $section->decs . '
                    </div>
                </div>';
        }
        $x++;
    }
    $show .=
        '<section id="' . $key . '" class="details">
            <div class="container">

                    ' . $container . '
                            </div>
        </section >';
}

echo $show;
