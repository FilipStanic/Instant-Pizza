<?php
namespace App\Controllers;


use App\Core\App;

class PagesController {
    public function home()
    {
        check_auth();
        redirect("/orders");
    }

    public function orders()
    {
        check_auth();
        $orders = App::get('database')->getAllDesc('orders');

        $item_orders = App::get('database')->getAll('item_order');

        return view('orders', compact('orders','item_orders'));
    }

    public function error404()
    {
        check_auth();

        return view('404');
    }

}