<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task Manager</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="/template/css/main.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="/template/images/favicon.png" type="image/x-icon">
    </head><!--/head-->
    <body>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
						<div class="col-sm-7">
                            <div class="center-block">
                                <h1>Задачник</h1>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php if (User::isGuest()): ?>                                        
                                        <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход для администратора</a></li>
                                    <?php else: ?>
                                        <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header><!--/header-->


