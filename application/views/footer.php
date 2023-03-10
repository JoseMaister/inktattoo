 <!-- font awesome style -->
  <link href="<?= base_url("template/css/font-awesome.min.css")?>" rel="stylesheet" />

  <footer class="footer_section" >
    <div class="container">
      <div class="row footer_form_social_row">
        <div class="col-md-4 col-lg-3">
          <div class="social_box">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-youtube-play" aria-hidden="true"></i>
            </a>
          </div>
        </div> 
      </div>
      <div class="row footer_main_row">
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p class="mb-0">
              when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_insta">
            <h4>
              Instagram
            </h4>
            <div class="insta_box">
              <div class="img-box">
                <img src="<?= base_url("template/images/g3.jpg")?>" alt="">
              </div>
              <p>
                long established fact that a reader
              </p>
            </div>
            <div class="insta_box">
              <div class="img-box">
                <img src="<?= base_url("template/images/g4.jpg")?>" alt="">
              </div>
              <p>
                long established fact that a reader
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <h4>
            Contact Us
          </h4>
          <div class="footer_contact">
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Location
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call +01 1234567890
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope"></i>
              <span>
                demo@gmail.com
              </span>
            </a>
            <?php
              if (isset($this->session->id))
                {
            ?>
            <a href="<?= base_url('login/cerrar_sesion/')?>"">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
              <span>
                Logout
              </span>
            </a>
            <?php
          }else{
          ?>
          <a href="<?= base_url('login/')?>"">
              <i class="fa fa-lock" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
          <?php
        }
          ?>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer section -->
