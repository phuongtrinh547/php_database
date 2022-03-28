# The MVC pattern for the PHP language

## 1. Set up
**Required**: In your local environment, you need install and you should have knoewledge of the following tools:

1. [XAMPP](https://www.apachefriends.org/download.html)

2. [Composer](https://getcomposer.org/download/) (a tool for dependency management in PHP)
3. [Git](https://git-scm.com/downloads)

Next, open terminal in any folder, run the following commands: 
```
git clone https://github.com/devet-git/php-mvc.git
```
```
cd php-mvc
```
```
composer install
```
```
php -S localhost:8080
```

## 2. How to

### Connect to MySQL
In root directory, create *db.info.php* file:
```php
define("MYSQL_HOST", "?"); // Ex: 127.0.0.1
define("MYSQL_DB_NAME", "?");
define("MYSQL_USER_NAME", "?"); // Ex: root
define("MYSQL_PASSWORD", "?");
```
---
### Create a view
In *src/views*, create files (ex: *home.php*)

---

### Create a model
In *src/models*, create a class extends Database class in *src/config/Database.php*.
**Note:** You should learn about [PDO in PHP](https://www.php.net/manual/en/book.pdo.php)

Example:

```php
// src/models/User.php

namespace Src\Models;

use Src\Config\Database;

class User extends Database
{
   public function create(): void
   {
      $query = <<<QUE
         CREATE TABLE IF NOT EXISTS user(
            `id` INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` VARCHAR(30) NOT NULL
         )
      QUE;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
   }
}
```
---
### Use router
*See the following example:*
```php
use Src\Config\Router;

$route =  new Router();

$route->get('/', function ($req, $res) {

   //TODO: Get query string with name is 'user' in http:localhost:8080?user=1234
   $req->query('user'); //return: 1234

   //TODO: Call a model with name 'User'(User.php) in src/models dir and execute 'create' method
   $res->model('User')->create();

   //TODO: Render a view with name 'home'(home.php) in src/views dir
   $res->render('home');
});

$route->addNotFoundHandler(function ($req, $res) {
   $res->render('notFound');
});

$route->run();
```

If you want to pass data to the view, for example:
```php
$res->render('home',[
   'username' => 'devet',
   'userage' => 20,
]);
```
After that, to get passed data, in *home.php*:
```php
passedData['username']; // return: devet
passedData['userage']; // return: 20
```
