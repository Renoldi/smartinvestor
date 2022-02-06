 <!-- ======= Footer ======= -->
 <footer id="footer">
   <div class="footer-top">
     <div class="container">
       <div class="row">

         <div class="col-lg-4 col-md-6">
           <div class="footer-info">
             <h3><?= $domain ?></h3>
             <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
             <p>
               <?= $contact->addres ?> <br>
               NY 535022, USA<br><br>
               <strong>Phone:</strong> <?= $contact->phone ?><br>
               <strong>Email:</strong> <?= $contact->email ?><br>
             </p>
             <div class="social-links mt-3">
               <a href="# <?= $contact->facebook ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
               <!-- <a href="# <?= $contact->instagram ?>" class="instagram"><i class="bx bxl-instagram"></i></a> -->
               <a href="# <?= $contact->telegram ?>" class="telegram"><i class="bx bxl-telegram"></i></a>
               <a href="https://api.whatsapp.com/send/?phone=<?= $contact->whatsapp ?>&text&app_absent=0 " class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
             </div>
           </div>
         </div>

         <div class="col-lg-2 col-md-6 footer-links">
           <h4>Useful Links</h4>
           <ul>
             <?php
              foreach ($menu as $menus => $key) {
                $parents = $key['parent'];
                // $active = $parents->url == $something ? 'active' : '';
                $childs = $key['child'];
                if (count($childs) > 0) {
                  // echo '<li class="dropdown"><a href="#" class="' . $active . '"><span>' . ucfirst($parents->menu) . '</span> <i class="bi bi-chevron-down"></i></a> <ul>';
                  foreach ($childs as $child) {
                    // echo '<li><a href="' . site_url($child->url) . '">' . ucfirst($child->menu) . '</a></li>';
                    echo '<li><i class="bx bx-chevron-right"></i> <a href="' . site_url($child->url) . '">'.ucfirst($parents->menu).'/'.$child->menu.'</a></li>';
                  }
                  // echo ' </ul></li>';
                } else {
                  echo '<li><i class="bx bx-chevron-right"></i> <a href="' . site_url($parents->url) . '">'.ucfirst($parents->menu).'</a></li>';
                }
              }
              ?>
           </ul>
           <!-- <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul> -->
         </div>

         <!-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->

         <div class="col-lg-4 col-md-6 footer-newsletter">
           <h4>Our Newsletter</h4>
           <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
           <form action="" method="post">
             <input type="email" name="email"><input type="submit" value="Subscribe">
           </form>

         </div>

       </div>
     </div>
   </div>

   <div class="container">
     <div class="copyright">
       &copy; Copyright <strong><span><?= $domain ?></span></strong>. All Rights Reserved
     </div>
     <!-- <div class="credits"> -->
     <!-- All the links in the footer should remain intact. -->
     <!-- You can delete the links only if you purchased the pro version. -->
     <!-- Licensing information: https://bootstrapmade.com/license/ -->
     <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
     <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
   </div>
 </footer><!-- End Footer -->

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 <div id="preloader"></div>

 <!-- vendor JS Files -->
 <script src="<?= base_url('/assets/vendor/purecounter/purecounter.js') ?>"></script>
 <script src="<?= base_url('/assets/vendor/aos/aos.js') ?>"></script>
 <script src="<?= base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
 <script src="<?= base_url('/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
 <script src="<?= base_url('/assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
 <script src="<?= base_url('/assets/vendor/php-email-form/validate.js') ?>"></script>

 <!-- Template Main JS File -->
 <script src="<?= base_url('/assets/js/main.js') ?>"></script>

 </body>

 </html>