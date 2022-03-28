<?php

declare(strict_types=1);

namespace Src\Config;

require_once './db.info.php';

use PDO;

class Database
{
   protected $conn;
   public function __construct()
   {
      $this->conn = new PDO(
         "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB_NAME,
         MYSQL_USER_NAME,
         MYSQL_PASSWORD
      );
   }
}
