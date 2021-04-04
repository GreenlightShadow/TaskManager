<?php include ROOT . '/views/layouts/header.php'; ?>

<section class="section-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="features_items">
                    <h4>Задачи</h4>
                    <br/>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <th><a href="/cabinet/order-id/sort-asc/page-<?php echo $page;?>"><i class="fa fa-angle-double-up"></i></a> ID 
                                <a href="/cabinet/order-id/sort-desc/page-<?php echo $page;?>"><i class="fa fa-angle-double-down"></i></a></th>
                            <th><a href="/cabinet/order-name/sort-asc/page-<?php echo $page;?>"><i class="fa fa-angle-double-up"></i></a> Имя 
                                <a href="/cabinet/order-name/sort-desc/page-<?php echo $page;?>"><i class="fa fa-angle-double-down"></i></a></th>
                            <th><a href="/cabinet/order-email/sort-asc/page-<?php echo $page;?>"><i class="fa fa-angle-double-up"></i></a> Email 
                                <a href="/cabinet/order-email/sort-desc/page-<?php echo $page;?>"><i class="fa fa-angle-double-down"></i></a></th>
                            <th>Описание</th>
                            <th><a href="/cabinet/order-status/sort-asc/page-<?php echo $page;?>"><i class="fa fa-angle-double-up"></i></a> Статус 
                                <a href="/cabinet/order-status/sort-desc/page-<?php echo $page;?>"><i class="fa fa-angle-double-down"></i></a></th>
                            <th>Категория</th>
                            <th>Редактировать</th>
                        </tr>
                        <?php foreach ($tasksList as $task): ?>
                            <tr>
                                <td><?php echo $task['id']; ?></td>
                                <td><?php echo htmlentities($task['name']); ?></td>
                                <td><?php echo htmlentities($task['email']); ?></td>
                                <td><?php echo htmlentities($task['text']); ?></td>  
                                <td><?php echo $task['status']; ?></td> 
                                <td><?php echo $task['category']; ?></td>  
                                <td><a href="/cabinet/update/<?php echo $task['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>  
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
				<div class="features_items">
					<!-- Page navigation -->
					<?php echo $pagination->get(); ?>
				</div>
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li class="error"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="signup-form"><!--sign up form-->
                        <h2>Новая задача</h2>
                        <br/>
                        <form action="/cabinet/create" method="post">
                            <p>Имя:</p><input type="text" name="name" placeholder="Name" required/>
                            <p>Email:</p><input type="email" name="email" placeholder="E-mail" required/>
                            <p>Описание задачи (не менее 3 символов):</p><textarea  name="text" required></textarea>
                            <br/><br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Отправить" />
                        </form>
                    </div><!--/sign up form-->
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</section>
