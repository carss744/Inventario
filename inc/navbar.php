<?php
if ($_SESSION['rol'] == "Administrador") {
  echo '<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://www.xolit.com/" target="blank">
      <img src="img/Logo-Oscuro.png" width="112" height="30">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-item" href="index.php?vista=home">Inicio</a>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-item" href="index.php?vista=user_list">Usuarios</a>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-item" href="index.php?vista=category_list">Categorias</a>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">Productos</a>

            <div class="navbar-dropdown">
                <a class="navbar-item" href="index.php?vista=product_list">Lista</a>
                <a class="navbar-item" href="index.php?vista=product_category">Por Categorias</a>
            </div>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">                
            <a class="navbar-item" href="index.php?vista=product_bill">Facturas</a>
        </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-link is-rounded" href="index.php?vista=user_update&user_id_up='.$_SESSION['id'].'">
          <i class="fa-solid fa-address-card count"></i>Mi Cuenta
          </a>
          <a class="button exit is-danger is-rounded" href="index.php?vista=logout">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  </nav>';
}else{
  echo '<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://www.xolit.com/" target="blank">
      <img src="img/Logo-Oscuro.png" width="112" height="30">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-item" href="index.php?vista=homecol">Inicio</a>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-item" href="index.php?vista=category_list">Categorias</a>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">Productos</a>

            <div class="navbar-dropdown">
                <a class="navbar-item" href="index.php?vista=product_list">Lista</a>
                <a class="navbar-item" href="index.php?vista=product_category">Por Categorias</a>
            </div>
        </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-link is-rounded" href="index.php?vista=user_update&user_id_up='.$_SESSION['id'].'">
          <i class="fa-solid fa-address-card count"></i>Mi Cuenta
          </a>
          <a class="button is-danger is-rounded" href="index.php?vista=logout">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  </nav>';
}
?>


