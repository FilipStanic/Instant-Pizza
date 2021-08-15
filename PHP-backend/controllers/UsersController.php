<?php
namespace App\Controllers;
use App\Core\App;

class   UsersController {

    public function index()
    {
        check_auth();
        $users = App::get('database')->getAll('users');

        return view('users-index', compact('users'));
    }

    public function create()
    {
        check_auth();
        return view('users-create');
    }

    public function store()
    {
        check_auth();


        $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        unset($_POST['password']);
        if($pass == '' OR $pass == null){
            return redirect('/users');
        }


        $_POST['name'] = trim(filter_var($_POST['name'],FILTER_SANITIZE_STRING),' ');
        if($_POST['name'] == '' OR $_POST['name'] == null){
            return redirect('/users');
        }


        $_POST['email'] = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),' ');
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            return redirect('/users');
        }



        $user = App::get('database')->getOneByField('users',$_POST);


        if($user OR $pass == '' or $_POST['name'] == '' OR $_POST['email'] == ''){
            return redirect('/users');
        }


        $salt = substr(md5(time()),0,22);
        $_POST['password'] = crypt($pass,'$2a$10$'.$salt);

        App::get('database')->insert('users', $_POST);

        return redirect('/users');
    }

    public function show()
    {
        check_auth();
        $user = App::get('database')->getOne('users', $_GET['id']);

        return view('users-show', compact('user'));
    }

    public function edit()
    {
        check_auth();
        $user = App::get('database')->getOne('users', $_GET['id']);

        return view('users-edit-name-email', compact('user'));
    }

    public function editPassword()
    {
        check_auth();
        $user = App::get('database')->getOne('users', $_GET['id']);

        return view('users-edit-password', compact('user'));
    }

    public function update()
    {
        check_auth();


        $_POST['id'] = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

            if(!filter_var($_POST['id'],FILTER_VALIDATE_INT)){

                return redirect('/users');

            }


            $_POST['name'] = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING),' ');

            if($_POST['name'] == '' OR $_POST['name'] == null ) {

                return redirect('/users');

            }


        $_POST['email'] = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),' ');

            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){

                return redirect('/users');

            }


            $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            if($_POST['password'] == '' OR $_POST['password'] == null){

                return redirect('/users');

            }


        $user = App::get('database')->getOneAssoc('users', $_POST['id']);
        $full_salt = substr($user['password'],0,29);

        $inputPass = crypt($_POST['password'],$full_salt);


        if($user['password'] == $inputPass){

            unset($_POST['password']);

            App::get('database')->update('users', $_POST);

        }

        return redirect('/users');
    }

    public function updatePassword()
    {
        check_auth();


        $_POST['id'] = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        if(!filter_var($_POST['id'],FILTER_VALIDATE_INT)){

            return redirect('/users');

        }

        $_POST['currentPassword'] = filter_var($_POST['currentPassword'], FILTER_SANITIZE_STRING);
        $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        if($_POST['password'] == '' OR $_POST['password'] == ''){

            return redirect('/users');

        }


        $user = App::get('database')->getOneAssoc('users', $_POST['id']);
        $full_salt = substr($user['password'],0,29);

        $inputPass = crypt($_POST['currentPassword'],$full_salt);


        if($inputPass == $user['password']){

            unset($_POST['currentPassword']);

            $_POST['password'] = crypt($_POST['password'],$full_salt);

            App::get('database')->update('users', $_POST);

        }

        return redirect('/users');
    }

    public function destroy()
    {
        check_auth();
        $item = App::get('database')->getOneAssoc('users', $_GET['id']);
        App::get('database')->delete('users', $item);

        return redirect('/users');

    }

}