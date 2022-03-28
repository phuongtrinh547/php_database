<?php

namespace Src\models;

use Src\Config\Database;
use PDO;

class Products extends Database
{
   public function create(): void
   {
      $query = <<<QUE
      CREATE TABLE `products` (
         `id_prd` int(10) NOT NULL,
         `name` varchar(127) DEFAULT NULL,
         `quantity` int(20) DEFAULT NULL,
         `price` int(20) DEFAULT NULL,
         `cat_id` int(8) DEFAULT NULL,
         `description` varchar(127) DEFAULT NULL
      )
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
   public function insert(): void
   {
      $query = <<<QUE
      INSERT INTO products VALUES
         (1, 'Orange juice', 10, 11025, 3, 'soft drink'),
         (2, 'Soda', 5, 11025, 3, 'soft drink'),
         (3, 'lemon juice', 7, 16538, 3, 'soft drink'),
         (4, 'Orion', 20, 33075, 2, 'soft cake'),
         (5, 'Baby doll', 20, 66150, 4, 'plastic'),
         (6, 'Ship toy', 10, 110250, 4, 'plastic'),
         (7, 'Mashmallow', 40, 22050, 1, 'sweets'),
         (8, 'Chupa Chups', 50, 22050, 1, 'sweets'),
         (9, 'Choco Pie', 20, 55125, 2, 'soft cake'),
         (10, 'Haribo Cola', 80, 22050, 1, 'sweets'),
         (11, 'Dress', 30, 330750, 5, 'cotton'),
         (12, 'T-shirt', 70, 165375, 5, 'cotton'),
         (14, 'Jean', 40, 275625, 5, 'cotton'),
         (15, 'Pancake', 70, 33075, 2, 'soft cake'),
         (16, 'Donus', 50, 66150, 2, 'soft cake'),
         (17, 'skirt', 90, 99225, 5, 'cotton'),
         (18, 'Kitchen toy', 70, 330750, 4, 'plastic'),
         (19, 'Lego Naruto', 50, 110250, 4, 'plastic'),
         (20, 'Milk candy UHA', 60, 33075, 1, 'sweets');
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
   public function getAll()
   {
      $query = <<<QUE
      SELECT id_prd, name, price FROM products
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $data = [];
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         array_push($data, $row);
      }
      return $data;
   }
}
