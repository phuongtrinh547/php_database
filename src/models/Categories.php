<?php

namespace Src\models;

use Src\Config\Database;
use PDO;

class Categories extends Database
{
   public function create(): void
   {
      $query = <<<QUE
         CREATE TABLE IF NOT EXISTS categories(
            `id` int(10) NOT NULL,
            `name` varchar(127) DEFAULT NULL,
            `description` varchar(127) DEFAULT NULL
         )
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
   public function insert()
   {
      $query = <<<QUE
         INSERT INTO categories VALUES
            (1, 'candy', 'sweets'),
            (2, 'cake', 'soft cake'),
            (3, 'drinks', 'soft drink'),
            (4, 'toy', 'plastic'),
            (5, 'clothes', 'cotton')
      QUE;

      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
   public function getName()
   {
      $query = <<<QUE
         SELECT name from categories
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
