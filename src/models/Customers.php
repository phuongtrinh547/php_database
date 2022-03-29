<?php

namespace Src\models;

use Src\Config\Database;
use PDO;

class Customers extends Database
{
   public function create(): void
   {
      $query = <<<QUE
      CREATE TABLE `customers` (
         `id` int(10) NOT NULL,
         `first_name` varchar(30) DEFAULT NULL,
         `last_name` varchar(30) DEFAULT NULL,
         `phone` varchar(15) DEFAULT NULL,
         `address` tinytext DEFAULT NULL,
         `id_card` int(10) DEFAULT NULL,
         `des` text DEFAULT NULL
       )
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
   public function insert(): void
   {
      $query = <<<QUE
      INSERT INTO customers VALUES
         (1,'Truong','Trinh','012345678','Quang Trung Street',2,'no thing'),
         (2,'Tran','Quyen','012345678','Mai Xuan Thuong Street',3,'no thing'),
         (3,'Nguyen','Phuong','012345678','Tran Hung Dao Street',1,'no thing'),
         (4,'Pham','Mai','012345678','Le Duan Street',4,'no thing'),
         (5,'Do','Dao','012345678','Le Thi Buoi Street',5,'no thing')
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
   public function getAll()
   {
      $query = <<<QUE
      SELECT * FROM customers
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}
