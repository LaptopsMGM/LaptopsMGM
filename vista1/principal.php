<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Samsung</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" >
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"SAMSUNG></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach ($menu as $key => $valor) { ?>
                <li><a class="dropdown-item" href="<?='?ctrl='.$key?>"><?=$valor?></a></li>
            <?php } ?>

         </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>



        <div class="row">
            <h1>VENTA DE SMARTPHONES</h1>
            <h2>CELULARES Samsung</h2>
        </div>
        <div class="row">
            <div class="col-sm-9">
           <img src="https://smartphonesperu.pe/wp-content/uploads/2021/09/iphone-13-azul-smartphones-peru-venta-de-celulares-y-servicio-tecnico.jpg" alt="">
            </div>
            <div class="col-sm-3">
            <p></p>
            <ul>
                <?php foreach ($menu as $key => $valor) { ?>
                    <li><a href="<?='?ctrl='.$key?>"><?=$valor?></a></li>
                <?php } ?>

            </ul>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
