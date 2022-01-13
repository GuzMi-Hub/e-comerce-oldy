<?php

class Utils
{

  public static function deleteSession($name)
  {
    if (isset($_SESSION[$name])) {
      $_SESSION[$name] = null;
      unset($_SESSION[$name]);
    }
    return $name;
  }

  public static function isAdmin()
  {
    if (!isset($_SESSION['admin'])) {
      header("Location:" . base_url);
    } else {
      return true;
    }
  }

  public static function showCategories()
  {
    require_once './models/Category.php';
    $categoria = new Category();
    $categorias = $categoria->getAll();

    return $categorias;
  }

  public static function statsCart()
  {
    $stats = array(
      'count' => 0,
      'total' => 0,
    );

    if (isset($_SESSION['cart'])) {
      $stats['count'] = count($_SESSION['cart']);

      foreach ($_SESSION['cart'] as $key => $value) {
        $stats['total'] += $value['price'] * $value['amount'];
      }
    }
    return $stats;
  }

}
