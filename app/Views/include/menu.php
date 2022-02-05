 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top d-flex align-items-center header-transparent">
   <div class="container d-flex align-items-center justify-content-between">

     <div class="logo">
       <h1><a href="<?= base_url() ?>"><span><?= $domain ?></span></a></h1>
       <!-- Uncomment below if you prefer to use an image logo -->
       <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
     </div>

     <nav id="navbar" class="navbar">
       <ul>
         <?php
          $request = service('request');
          $uri = $request->uri;
          $something = $uri->getSegment(1);
          $idMenu = '';
          foreach ($menu as $menus => $key) {
            $parents = $key['parent'];
            $active = $parents->url == $something ? 'active' : '';
            $childs = $key['child'];
            if (count($key['child']) > 0) {
              echo '<li class="dropdown"><a href="#" class="' . $active . '"><span>' . ucfirst($parents->menu) . '</span> <i class="bi bi-chevron-down"></i></a> <ul>';
              foreach ($childs as $child) {
                echo '<li><a href="' . site_url($child->url) . '">' . ucfirst($child->menu) . '</a></li>';
              }
              echo ' </ul></li>';
            } else {
              echo '<li><a class="nav-link scrollto ' . $active . '" href="' . site_url($parents->url) . '">' . ucfirst($parents->menu) . '</a></li>';
            }
          }
          ?>
       </ul>
       <i class="bi bi-list mobile-nav-toggle"></i>
     </nav><!-- .navbar -->

   </div>
 </header><!-- End Header -->