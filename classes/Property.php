<?php
namespace App;

class Property {
  protected static $database;
  protected static $columnsDB = ['id', 'title', 'price', 'image', 'description', 'bedrooms', 'wc', 'parkings', 'seller_id'];
  protected static $errors = [];

  public $id;
  public $title;
  public $price;
  public $image;
  public $description;
  public $bedrooms;
  public $wc;
  public $parkings;
  public $createdAt;
  public $seller_id;

  public function __construct($args = [])
  { 
    $this->id = $args['id'] ?? '';
    $this->title = $args['title'] ?? '';
    $this->price = $args['price'] ?? '';
    $this->image = $args['image'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->bedrooms = $args['bedrooms'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->parkings = $args['parkings'] ?? '';
    $this->seller_id = $args['seller_id'] ?? '';
  }

  public function save() {
    $attributesSanitized = $this->sanitizeDB();

    $queryInsertProperty = "INSERT INTO properties (";
    $queryInsertProperty .= join(', ', array_keys($attributesSanitized));
    $queryInsertProperty .= ") VALUES ('";
    $queryInsertProperty .= join("', '", array_values($attributesSanitized));
    $queryInsertProperty .= "')";

    $resultInserProperty = self::$database->query($queryInsertProperty);

    return $resultInserProperty;
  }

  public function sanitizeDB() {
    $attributes = $this->attributes();
    $attributesSanitized = [];

    foreach($attributes as $key => $value) {
      $attributesSanitized[$key] = self::$database->escape_string($value);
    }

    return $attributesSanitized;
  }

  
  public function attributes () {
    $attributes = [];
    foreach(self::$columnsDB as $column) {
      if ($column === 'id') continue;
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  public function setImage($image) {
    $this->image = $image;
  }

  public static function getErrors () {
    return self::$errors;
  }

  public function validate() {
    if (!$this->title || !$this->price || !$this->image || !$this->description || !$this->bedrooms || !$this->wc || !$this->parkings || !$this->seller_id) {
      self::$errors[] = "Todos los campos son obligatorios";
    }
    return self::$errors;
  }
  
  public static function setDB($database) {
    self::$database = $database;
  }
}