<?php
namespace App\Controllers;
use App\Core\App;

class itemsController {

    public function index()
    {
        check_auth();
        $items = App::get('database')->getAll('items'); //ovaj treba da ne bude descenging. Orders treba

        return view('items', compact('items'));
    }

    public function create()
    {
        check_auth();
        return view('items-create');
    }

    public function store()
    {
        check_auth();

            $_POST['title'] = filter_var($_POST['title'], FILTER_SANITIZE_STRING);


            $_POST['price'] = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            if(!filter_var($_POST['price'], FILTER_VALIDATE_FLOAT)){
                return redirect('/items');
            }


            $_POST['extras'] = trim(filter_var($_POST['extras'], FILTER_SANITIZE_STRING),', ');


            if(isset($_FILES['img'])){
                if($_FILES['img']['tmp_name'] != '' OR $_FILES['img']['name'] != ''){


                    if($_FILES['img']['type'] == 'image/jpeg'
                        OR $_FILES['img']['type'] == 'image/png'
                        OR $_FILES['img']['type'] == 'image/jpg'){

                        $uploadDir = getcwd()."\\public\\item-images";

                        $imageName = "pizza-item-".time().$_FILES['img']['name'];


                        move_uploaded_file($_FILES['img']['tmp_name'],$uploadDir."\\".$imageName);

                        $_POST['img'] = $imageName;
                    }
                } else {
                    return redirect('/items');
                }
            }

        App::get('database')->insert('items', $_POST);

        return redirect('/items');
    }

    public function show()
    {

        check_auth();
        $item = App::get('database')->getOne('items', $_GET['id']);

        return view('items-show', compact('item'));
    }

    public function edit()
    {
        check_auth();
        $item = App::get('database')->getOne('items', $_GET['id']);

        return view('items-edit', compact('item'));
    }

    public function update()
    {
        check_auth();


            $_POST['id'] = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            if(!filter_var($_POST['id'],FILTER_VALIDATE_INT))
            {
                redirect('/items');
            }


            $_POST['title'] = filter_var($_POST['title'], FILTER_SANITIZE_STRING);


            $_POST['oldImageName'] = filter_var($_POST['oldImageName'], FILTER_SANITIZE_STRING);


            $_POST['price'] = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            if(!filter_var($_POST['price'], FILTER_VALIDATE_FLOAT)){
                return redirect('/items');
            }


            $_POST['extras'] = trim(filter_var($_POST['extras'], FILTER_SANITIZE_STRING),', ');


        if($_FILES['img']['tmp_name'] != '' OR $_FILES['img']['name'] != ''){


            if($_FILES['img']['type'] == 'image/jpeg'
                OR $_FILES['img']['type'] == 'image/png'
                OR $_FILES['img']['type'] == 'image/jpg') {

                $uploadDir = getcwd() . "\\public\\item-images";

                $newImageName = "pizza-item-" . time() . $_FILES['img']['name'];


                move_uploaded_file($_FILES['img']['tmp_name'], $uploadDir . "\\" . $newImageName);

                $_POST['img'] = $newImageName;


                if(is_file($uploadDir."\\".$_POST['oldImageName'])){

                    unlink($uploadDir."\\".$_POST['oldImageName']);

                }

            }
        }

        unset($_POST['oldImageName']);

        App::get('database')->update('items', $_POST);

        return redirect('/items');
    }

    public function destroy()
    {
        check_auth();

        $item = App::get('database')->getOneAssoc('items', $_GET['id']);
        App::get('database')->delete('items', $item);

        return redirect('/items');

    }
    
}