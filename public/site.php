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
	
	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
    $category = new Category();
    $category->get((int) $idcategory);
    $pagination = $category->getProductsPage($page);
    $pages = [];
    for ($i = 1; $i <= $pagination['pages']; $i++) {
        array_push($pages, [
            'link' => '/categories/' . $category->getidcategory() . '?page=' . $i,
            'page' => $i
        ]);
    }
    $page = new Page();
    $page->setTpl("category", [
        'category' => $category->getValues(),
        'products' => $pagination["data"],
        'pages' => $pages
    ]);
});