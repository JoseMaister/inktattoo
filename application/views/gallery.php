<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="<?= base_url("template/css/lightbox.css")?>" rel="stylesheet" />
<link href="<?= base_url("template/css/responsive.css")?>" rel="stylesheet" />


<body>
<div class="heading_container heading_center">
  <br>
  <h2>
    Our Tattoo Gallery
  </h2>
  <br>
</div>
<div class="row">
<!-- Start slider -->
<section class="auto-slider">
  <div id="slider">
    <figure>
      <?php 
      foreach($slides->result() as $item) {
      ?> 
       <img src="<?= 'data:image/bmp;base64,' . base64_encode($item->img); ?>" alt="Image">
       <?php
      if (isset($this->session->id))
        {
      ?>
        <a href=<?= base_url("admin/admin/".$item->id); ?>><button type="button"class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Admin </button></a>
        <a href=<?= base_url("admin/edit/".$item->id); ?>><button type="button"class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Editar </button></a>
      <?php 
       }
      ?>
      <?php
      }
      ?>
    </figure>
  </section>
<!--end slider --> 
</div>
<script src="<?= base_url("template/js/lightbox.js")?>"></script>
  <!-- jQery -->
<script src="<?= base_url("template/js/jquery-3.4.1.min.js")?>"></script>
  <!-- bootstrap js -->
<script src="<?= base_url("template/js/bootstrap.js")?>"></script>

</body>


































