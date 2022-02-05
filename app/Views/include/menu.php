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
          $idMenu = '';
          foreach ($menu as $menus => $key) {
            $active = $menus == 0 ? 'active' : '';
            $parent = $key['parent'];
            if (count($key['child']) > 0) {
              echo '<li class="dropdown"><a href="#"><span>AutoTrade</span> <i class="bi bi-chevron-down"></i></a> <ul>';
              foreach ($key['child'] as $child) {
                echo '<li><a href="' . site_url($child->url) . '">' . ucfirst($child->menu) . '</a></li>';
              }
              echo ' </ul></li>';
            } else {
              echo '<li><a class="nav-link scrollto ' . $active . '" href="' . site_url($parent->url) . '">' . ucfirst($parent->menu) . '</a></li>';
            }
          }
          ?>
       </ul>
       <i class="bi bi-list mobile-nav-toggle"></i>
     </nav><!-- .navbar -->

   </div>
 </header><!-- End Header -->