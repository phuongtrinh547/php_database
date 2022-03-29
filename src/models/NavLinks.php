<?php

namespace Src\models;

use PDO;
use Src\Config\Database;

class NavLinks extends Database
{
   public function create()
   {
      $query = <<<QUE
      CREATE TABLE IF NOT EXISTS nav_links(
         `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
         `name` varchar(127) DEFAULT NULL,
         `link` varchar(127) DEFAULT NULL
      )
   QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
   public function insert()
   {
      $query = <<<QUE
      INSERT INTO nav_links(name, link) VALUES
         ('home', '/'),
         ('about', '/about'),
         ('contact', '/contact')
   QUE;

      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
   public function get()
   {
      $query = <<<QUE
         SELECT name, link from nav_links
      QUE;

      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   public function insertLink($name, $link)
   {
      $query = <<<QUE
         INSERT INTO nav_links(name, link) VALUES ('$name', '$link')
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
}
