<?php

use App\Core\Request;
use App\Core\Router;

require_once "vendor/autoload.php";
require_once "core/bootstrap.php";

Router::loadRoutes()
    ->direct(Request::uri(), Request::method());
