<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=base_url?>/assets/css/styles.css">
  <title>Tienda de camisetas</title>
</head>
<body>
  <!-- CABECERA -->
  <header id="header">
    <div id="logo">
      <img src="<?=base_url?>/assets/img/camiseta.png" alt="Camiseta Logo">
      <a href="<?=base_url?>index.php">
        Tienda de camisetas
      </a>
    </div>
  </header>
  <!-- MENU -->
  <?php $categorias = Utils::showCategories();?>
  <nav id="menu">
    <ul>
      <li><a href="<?=base_url?>">Inicio</a></li>
      <?php while ($categoria = $categorias->fetch_object()): ?>
        <li>
          <a href="<?=base_url . "categoria/show&id=" . $categoria->id?>"><?=$categoria->nombre?></a>
        </li>
      <?php endwhile;?>
    </ul>
  </nav>