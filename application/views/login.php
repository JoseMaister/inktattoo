<?php
$venc = date("y-m-d", strtotime($this->session->vencimiento_password));
$today = date("y-m-d", strtotime("today"));
//echo var_dump($this->session->url_actual);die();
/*if (!isset($this->session->activo))
{
    redirect(base_url('login'));
    exit();
}
else
{*/
   if($this->session->password == sha1($this->session->no_empleado))
    {
        redirect(base_url('inicio/primera_sesion'));
        exit();
    }
    if($today >= $venc)
    {
        redirect(base_url('seguridad/vencimiento_password'));
        exit();       
    }
    if(isset($url_actual))
    {
        $this->session->url_actual = $url_actual;
        
  //  }
  
}

?>
<link rel="stylesheet" type="text/css" href="<?= base_url("template/css/estilos.css")?>" />
<div class="login">
    <header class="login__header">
      <h2><svg class="icon">
          <use xlink:href="#icon-lock" />
        </svg>Inicio de Sesión</h2>
    </header>

    <form method="POST" action=<?= base_url('login/autenticar') ?> class="login__form">
      <div>
        <label for="email">Usuario</label>
        
        <input type="hidden" name="url_actual" value="<?= $url_actual ?>"/>
        <input type="text" name="user" class="form-control" placeholder="Usuario" required="" />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="password">
      </div>
      <div>
        <input class="button" type="submit" value="Sign In">
      </div>
    </form>
</div>

