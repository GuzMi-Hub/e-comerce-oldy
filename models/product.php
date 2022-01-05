<?php

class Product
{
  private $id;
  private $category_id;
  private $name;
  private $description;
  private $price;
  private $stock;
  private $offer;
  private $date;
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
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of category_id
   */
  public function getCategory_id()
  {
    return $this->category_id;
  }

  /**
   * Set the value of category_id
   *
   * @return  self
   */
  public function setCategory_id($category_id)
  {
    $this->category_id = $category_id;

    return $this;
  }

  /**
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of description
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */
  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }

  /**
   * Get the value of price
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set the value of price
   *
   * @return  self
   */
  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }

  /**
   * Get the value of stock
   */
  public function getStock()
  {
    return $this->stock;
  }

  /**
   * Set the value of stock
   *
   * @return  self
   */
  public function setStock($stock)
  {
    $this->stock = $stock;

    return $this;
  }

  /**
   * Get the value of offer
   */
  public function getOffer()
  {
    return $this->offer;
  }

  /**
   * Set the value of offer
   *
   * @return  self
   */
  public function setOffer($offer)
  {
    $this->offer = $offer;

    return $this;
  }

  /**
   * Get the value of date
   */
  public function getDate()
  {
    return $this->date;
  }

  /**
   * Set the value of date
   *
   * @return  self
   */
  public function setDate($date)
  {
    $this->date = $date;

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

  public function getAll()
  {
    $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
    return $productos;
  }

}
