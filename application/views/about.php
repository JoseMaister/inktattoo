 <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url("template/css/bootstrap.css")?>" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="<?= base_url("template/css/owl.carousel.min.css")?>" />

  <!-- font awesome style -->
  <link href="<?= base_url("template/css/font-awesome.min.css")?>" rel="stylesheet" />
  <!-- lightbox -->
  <link href="<?= base_url("template/css/ekko-lightbox.css")?>" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?= base_url("template/css/style.css")?>" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?= base_url("template/css/responsive.css")?>" rel="stylesheet" />
</div>
 <section class="about_section layout_padding">
  <?php
    $item=$data[6];
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="<?= 'data:image/bmp;base64,' . base64_encode($item->img); ?>" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <?php
            if (isset($this->session->id))
             {
          ?>
          <a href=<?= base_url("admin/admin/".$item->id); ?>><button type="button"class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Admin </button></a>
          <a href=<?= base_url("admin/edit/".$item->id); ?>><button type="button"class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Editar </button></a>
          <?php 
             }
          ?>
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                <?php 
                  echo $item->tittle
                ?>
              </h2>
            </div>
            <p>
              <?php 
                echo $item->content
              ?>
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>


    <!-- jQery -->
  <script src=<?= base_url("template/js/jquery-3.4.1.min.js")?>></script>
  <!-- popper js -->
  <script src=<?= base_url("template/js/popper.min.js")?> integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src=<?= base_url("template/js/bootstrap.js")?>></script>
  <!-- owl slider -->
  <script src=<?= base_url("template/js/owl.carousel.min.js")?>>
  </script>
  <!-- lightbox -->
  <script src=<?= base_url("template/js/ekko-lightbox.min.js")?>></script>
  <!-- custom js -->
  <script src=<?= base_url("template/js/custom.js")?>></script>
  <!-- Google Map -->
  <script src=<?= base_url("template/js/js.js")?>>
  </script>

