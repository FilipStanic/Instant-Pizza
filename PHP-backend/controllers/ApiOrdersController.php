<?php

namespace App\Controllers;
use App\Core\App;

class ApiOrdersController
{

    public function store()
    {
        $orderData = json_decode(file_get_contents('php://input'), ARRAY_FILTER_USE_KEY);
        $orderData['orderInfo']['name'] = filter_var($orderData['orderInfo']['name'], FILTER_SANITIZE_STRING);

        $orderData['orderInfo']['address'] = filter_var($orderData['orderInfo']['address'], FILTER_SANITIZE_STRING);

        $email = filter_var($orderData['orderInfo']['email'], FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $orderData['orderInfo']['email'] = $email;
        } else {
            $orderData['orderInfo']['email'] = '';
        }


        $phone = filter_var($orderData['orderInfo']['phone'], FILTER_SANITIZE_NUMBER_INT);
        if(filter_var($phone, FILTER_VALIDATE_INT)){
            $orderData['orderInfo']['phone'] = $phone;
        } else {
            $orderData['orderInfo']['phone'] = '';
        }

        $orderData['orderInfo']['total'] = filter_var($orderData['orderInfo']['total'], FILTER_SANITIZE_STRING);

        $orderData['orderInfo']['date'] = filter_var($orderData['orderInfo']['date'], FILTER_SANITIZE_STRING);

        $orderData['orderInfo']['time'] = filter_var($orderData['orderInfo']['time'], FILTER_SANITIZE_STRING);


        App::get('database')->insert('orders', $orderData['orderInfo']);

        $recentId = App::get('database')->getLastInsertedId();

        $cart = $orderData['cartInfo']['cart'];

        foreach ($cart as $item){

            $item['order_id'] = $recentId;

            App::get('database')->insert('item_order',$item);
        }


        return [
            'status' => 'ok'
        ];
    }
}