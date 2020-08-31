<?php

// rota de categoria

use App\Config\Page;
use App\Config\PageAdmin;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;

$app->get('/admin/categories', function () {

	User::verifyLogin();

	$categories = Category::listAll();

	$page = new PageAdmin();
	$page->setTpl("categories", [
		'categories' => $categories
	]);
});

$app->get('/admin/categories/create', function () {

	User::verifyLogin();

	$page = new PageAdmin();
	$page->setTpl("categories-create");

});

$app->post('/admin/categories/create', function () {

	User::verifyLogin();
	$category = new Category();
	$category->setData($_POST);
	$category->save();

	header('Location: /admin/categories');
	exit;
});

$app->get('/admin/categories/:idcategory/delete', function ($idcategory) {

	User::verifyLogin();

	$category = new Category();
	$category->get((int)$idcategory);
	$category->delete();

	header('Location: /admin/categories');
	exit;
});

$app->get('/admin/categories/:idcategory', function ($idcategory) {

	User::verifyLogin();

	$category = new Category();
	$category -> get((int)$idcategory);
	$page = new PageAdmin();
	$page->setTpl("categories-update", [
		'category' =>$category->getValues()
	]);
});

$app->post('/admin/categories/:idcategory', function ($idcategory) {

	User::verifyLogin();

	$category = new Category();
	$category -> get((int)$idcategory);
	$category->setData($_POST);
	$category->save();

	header('Location: /admin/categories');
	exit;
});

$app->get("/admin/categories/:idcategory/products", function ($idcategory) {
    User::verifyLogin();
    $category = new Category();
    $category->get((int) $idcategory);
    /* echo '<pre>';
    print_r($category->getProducts(false));
    echo '</pre>';
    
    exit; */
    $page = new PageAdmin();
    $page->setTpl("categories-products", [
        'category' => $category->getValues(),
        'productsRelated' => $category->getProducts(),
        'productsNotRelated' => $category->getProducts(false)
    ]);
});

$app->get("/admin/categories/:idcategory/products/:idproduct/add", function ($idcategory, $idproduct) {
    User::verifyLogin();
    $category = new Category();
    $category->get((int) $idcategory);
    $product = new Product();
    $product->get((int) $idproduct);
    $category->addProduct($product);

    header("Location: /admin/categories/" . $idcategory . "/products");
    exit;
});

$app->get("/admin/categories/:idcategory/products/:idproduct/remove", function ($idcategory, $idproduct) {
    User::verifyLogin();
    $category = new Category();
    $category->get((int) $idcategory);
	$product = new Product();
    $product->get((int) $idproduct);
    $category->removeProduct($product);

    header("Location: /admin/categories/" . $idcategory . "/products");
    exit;
});
