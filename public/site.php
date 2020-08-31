<?php

use App\Config\Page;
use App\Models\Category;
use App\Models\Product;

$app->get('/', function () {

	$product = Product::listAll();
    $page = new Page();
    $page->setTpl("index", [
        'products' => Product::checkList($product)
    ]);
});

$app->get('/categories/:idcategory', function ($idcategory) {
	
	$category = new Category();
	$category->get((int)$idcategory);
	$page = new Page();
	$page->setTpl("category", [
		'category' => $category->getValues(),
		'products' => Product::checkList($category->getProducts())
	]);
});