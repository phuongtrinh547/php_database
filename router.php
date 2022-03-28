<?php

use Src\config\Router;

$route = new Router();

// TODO: Add your router here

$route->get('/cate/create', function ($req, $res) {
   $res->model('Categories')->create();
});
$route->get('/cate/insert', function ($req, $res) {
   $res->model('Categories')->insert();
});
$route->get('/cate', function ($req, $res) {
   $data = $res->model('Categories')->getName();
   $res->render('home', [
      'data' => $data
   ]);
});
$route->get('/pro', function ($req, $res) {
   $data = $res->model('Products')->getAll();
   $res->render('home', [
      'data' => $data
   ]);
});
$route->get('/cus', function ($req, $res) {
   $data = $res->model('Customers')->getAll();
   $res->render('home', [
      'data' => $data
   ]);
});
$route->get('/cus/create', function ($req, $res) {
   $res->model('Customers')->create();
});
$route->get('/cus/insert', function ($req, $res) {
   $res->model('Customers')->insert();
});
$route->get('/pro/create', function ($req, $res) {
   $res->model('Products')->create();
});
$route->get('/pro/insert', function ($req, $res) {
   $res->model('Products')->insert();
});


// !DO NOT CHANGE
$route->addNotFoundHandler(function ($req, $res) {
   $res->render('notFound');
});
$route->run();
