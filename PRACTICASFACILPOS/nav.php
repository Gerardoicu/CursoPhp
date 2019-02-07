<?php

if(isset($_SESSION["usuario"])){
echo '<nav class=" navbar navbar-expand-lg navbar-light bg-primary ">

  <div class=" collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="ejercicio2.php">Registro De Productos</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catálogo
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Ropa</a>
		   <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Zapatos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Perfumes</a>
        </div>
      </li>
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Búsqueda" aria-label="Búsqueda">
      <button class="btn btn-outline-success my-2 my-sm-0 bg-light border-light text-primary" type="submit">Búsqueda</button>
    </form>
  </div>
</nav>';
}

?>
