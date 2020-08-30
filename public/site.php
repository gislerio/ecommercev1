<?php

use App\Config\Page;

$app->get('/', function () {

	$page = new Page();
	$page->setTpl("index");
});