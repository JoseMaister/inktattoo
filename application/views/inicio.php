 <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url("template/css/bootstrap.css")?>" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="<?= base_url("template/css/owl.carousel.min.css")?>" />

  <!-- font awesome style -->
  <link href="<?= base_url("template/css/font-awesome.min.css")?>" rel="stylesheet" />
  <!-- lightbox -->
  <link href="<?= base_url("template/css/ekko-lightbox.css")?>"rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?= base_url("template/css/style.css")?>" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?= base_url("template/css/responsive.css")?>" rel="stylesheet" />

    <!-- slider section -->

<!-- end slider section -->
<section class="slider_section ">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php 
      foreach($slides->result() as $item) {
        $active=null;
        if($item->id=='1'){
          $active='active';
        }
        ?>

      <div class="carousel-item <?= $active ?>">
        <div class="container">
              <?php
                if (isset($this->session->id))
                {
              ?>
              <a href=<?= base_url("admin/admin/".$item->id); ?>><button type="button"class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Admin </button></a>
              <a href=<?= base_url("admin/edit/".$item->id); ?>><button type="button"class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Editar </button></a>
              <?php 
                 }
              ?>
          <div class="row">
            <div class="col-md-7 col-lg-6 ">
              <div class="detail-box">
                <h1>
                  <?php 
                    echo $item->tittle
                  ?>
                </h1>
                <p>
                  <?php 
                    echo $item->content
                  ?>
                </p>
                <div class="btn-box">
                  <a href="" class="btn1">
                    Read More
                  </a>
                </div>
              </div>
            </div>
              <div class="col-md-5 col-lg-6">
                <div class="img-box col-lg-10 mx-auto px-0">
                  <img src="<?= 'data:image/bmp;base64,' . base64_encode($item->img); ?>" alt="">
                </div>
              </div>
          </div>
        </div>
      </div>
      <?php
    }?>
    </div>
    <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>    
  </div>
</section>

<!-- service section -->

  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <?php  
          $item=$data[3];
        ?>
        <h2>
          <?php 
            echo $item->intro_text
          ?>
        </h2>
      </div>
      <div class="row">
      <?php 
      foreach($content->result() as $item) {
      ?>
        <div class="col-md-4">
          <div class="box">
            <?php
              if (isset($this->session->id))
                 {
              ?>
              <a href=<?= base_url("admin/admin/".$item->id); ?>><button type="button"class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Admin </button></a>
              <a href=<?= base_url("admin/edit/".$item->id); ?>><button type="button"class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Editar </button></a>
              <?php 
                 }
              ?>
            <div class="img-box">
              <img src="<?= 'data:image/bmp;base64,' . base64_encode($item->img); ?>" alt="">
            </div>
            <div class="detail-box">
              <h5>
                <?php 
                    echo $item->tittle
                ?>
              </h5>
              <p>
                <?php 
                  echo $item->content
                ?>
              </p>
            </div>
          </div>
        </div>
         <?php  
      }?>
      </div>
    </div>
  </section>
  <!-- end service section -->

    <!-- jQery -->
  <script src="<?= base_url("template/js/jquery-3.4.1.min.js")?>"></script>
  <!-- popper js -->
  <script src="<?= base_url("template/js/popper.min.js")?>" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="<?= base_url("template/js/bootstrap.js")?>"></script>
  <!-- owl slider -->
  <script src="<?= base_url("template/js/owl.carousel.min.js")?>">
  </script>
  <!-- lightbox -->
  <script src="<?= base_url("template/js/ekko-lightbox.min.js")?>"></script>
  <!-- custom js -->
  <script src="<?= base_url("template/js/custom.js")?>"></script>
  <!-- Google Map -->
  <script src="<?= base_url("template/js/js.js")?>">
  </script>

