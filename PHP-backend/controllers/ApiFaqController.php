<?php
namespace App\Controllers;
use App\Core\App;

class ApiFaqController
{
    public function index()
    {
        $faq = App::get('database')->getAll('faq');
        echo json_encode($faq);
    }

}