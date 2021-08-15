<?php
namespace App\Controllers;
use App\Core\App;

class ApiItemsController {

    public function index()
    {
        $items = App::get('database')->getAll('items');
        echo json_encode($items);
    }

}