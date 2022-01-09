<?php

class Usuario
{
  private $id;
  private $nombre;
  private $apellidos;
  private $email;
  private $password;
  private $rol;
  private $image;
  private $db;

  public function __construct()
  {
    $this->db = Database::connect();
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $this->db->escape_string($id);

    return $this;
  }

  /**
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   *
   * @return  self
   */
  public function setNombre($nombre)
  {
    $this->nombre = $this->db->escape_string($nombre);

    return $this;
  }

  /**
   * Get the value of apellidos
   */
  public function getApellidos()
  {
    return $this->apellidos;
  }

  /**
   * Set the value of apellidos
   *
   * @return  self
   */
  public function setApellidos($apellidos)
  {
    $this->apellidos = $this->db->escape_string($apellidos);

    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  public function setEmail($email)
  {
    $this->email = $this->db->escape_string($email);

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return password_hash($this->db->escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of rol
   */
  public function getRol()
  {
    return $this->rol;
  }

  /**
   * Set the value of rol
   *
   * @return  self
   */
  public function setRol($rol)
  {
    $this->rol = $rol;

    return $this;
  }
  /**
   * Get the value of image
   */
  public function getImage()
  {
    return $this->image;
  }

  /**
   * Set the value of image
   *
   * @return  self
   */
  public function setImage($image)
  {
    $this->image = $image;

    return $this;
  }

  public function save()
  {
    $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', {$this->getImage()})";
    $save = $this->db->query($sql);

    if ($save) {
      return true;
    } else {
      return false;
    }

  }

  public function login()
  {
    $email = $this->email;
    $password = $this->password;

    $sql = "SELECT * FROM usuarios WHERE email ='{$email}'";
    $login = $this->db->query($sql);
    if ($login->num_rows == 1) {
      $usuario = $login->fetch_object();
      $verify = password_verify($password, $usuario->password);
      if ($verify) {
        return $usuario;
      } else {
        return false;
      }
    } else {
      return false;
    }

  }

}
