<?php

use App\Config\Page;
use App\Models\Product;

$app->get('/', function () {

	$product = Product::listAll();
    $page = new Page();
    $page->setTpl("index", [
        'products' => Product::checkList($product)
    ]);
});