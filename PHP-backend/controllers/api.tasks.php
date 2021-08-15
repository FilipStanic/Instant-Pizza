<?php

$tasks = App::get('database')->getAll('tasks');
var_dump($tasks);
