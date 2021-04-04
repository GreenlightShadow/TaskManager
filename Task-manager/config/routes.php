<?php

return array(

    'user/login' => 'user/login', //actionLogin in UserController
    'user/logout' => 'user/logout', 
    'cabinet/order-([\w]+)/sort-([\w]+)/page-([1-9][0-9]?)' => 'cabinet/edit/$1/$2/$3', //actionEdit in CabinetController
    'cabinet/update/([0-9]+)' => 'cabinet/update/$1', 
    'cabinet/create' => 'cabinet/create', 
    'cabinet' => 'cabinet/index', 
    'create' => 'task/create', //actionCreate in TaskController
    'index/order-([\w]+)/sort-([\w]+)/page-([1-9][0-9]?)' => 'task/index/$1/$2/$3', //actionIndex in TaskController
    'index' => 'task/index', 
    '.+' => 'task/index', 
    '' => 'task/index', 
);
