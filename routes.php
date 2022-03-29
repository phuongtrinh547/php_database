<?php

use Src\config\Router;

$route = new Router();

// TODO: Add your router here
// $route->get('/', function ($req, $res) {
//    $data = $res->model('products')->getWithCateName();
//    $res->render('home', [
//       'page' => $req->query('page'),
//       'products' => $data
//    ]);
// });
// $route->get('/about', function ($req, $res) {
//    $res->render('home', ['page' => 'about']);
// });
// $route->get('/pro/del', function ($req, $res) {
//    $res->model('Products')->deleteAll();
// });
// $route->get('/pro/insert', function ($req, $res) {
//    $res->model('Products')->insert();
// });
// $route->get('/nav-links/create', function ($req, $res) {
//    $res->model('NavLinks')->create();
// });
// $route->get('/nav-links/insert', function ($req, $res) {
//    $res->model('NavLinks')->insert();
// });
$route->get('/nav-links/insert', function ($req, $res) {
   $name = $req->query('name');
   $link = $req->query('link');
   $res->model('NavLinks')->insertLink($name, $link);
});

$route->get('/', function ($req, $res) {
   $links = $res->model('NavLinks')->get();
   $res->render(
      'home',
      [
         'navLinks' => $links
      ]
   );
});
$route->get('/about', function ($req, $res) {
   $res->render('about');
});
$route->get('/category', function ($req, $res) {
   $cate = $res->model('Categories')->getName();
   $res->render(
      'category',
      ['categories' => $cate]
   );
});
$route->get('/product', function ($req, $res) {
   $pro = $res->model('Products')->getWithCateName();
   $res->render(
      'product',
      ['products' => $pro]
   );
});
$route->get('/customer', function ($req, $res) {
   $cus = $res->model('Customers')->getAll();
   $res->render(
      'customer',
      ['customers' => $cus]
   );
});

// !DO NOT CHANGE
$route->addNotFoundHandler(function ($req, $res) {
   $res->render('notFound');
});
$route->run();
