<?php

namespace App\Config;

class PageAdmin extends Page
{
    public function __construct($opts = array(), $tpl_dir = "/../App/Views/admin/")
    {
        parent::__construct($opts, $tpl_dir);
    }
}
