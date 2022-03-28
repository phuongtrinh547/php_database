<?php

declare(strict_types=1);

namespace Src\Models;

use Src\Config\Database;

class User extends Database
{
   public function create(): void
   {
      $query = <<<QUE
         create table if not exists user(
            `id` int(10) primary key auto_increment,
            `name` varchar(30) not null
         )
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $this->conn = null;
   }
}
