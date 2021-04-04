<?php include ROOT . '/views/layouts/header.php'; ?>

<section class="section-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result): ?>
                    <p class="success">Задача добавлена администратором!</p>
                    <p class="success">Вы будете перенаправлены на страницу задач через 5 сек.</p>
                    <meta http-equiv="refresh" content="4, url='/cabinet/order-id/sort-desc/page-1'">
                    <p class="success">Если этого не произошло, кликните сюда:</p>
                    <?php if ($result): ?>
                        <a href="/cabinet/order-id/sort-desc/page-1" class="btn btn-default"><i class="fa fa-user"></i> Домой</a>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li class="error">Ошибка:</li>
                                <li class="error"> - <?php echo $error; ?> </li>
                                <li><br></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="signup-form"><!--sign up form-->
                        <h2>Новая задача (панель администратора)</h2>
                        <br/>
                        <form action="#" method="post">
                            <p>Имя (только буквы, цифры и пробелы):</p><input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"/>
                            <p>Email:</p><input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            <p>Описание задачи (не менее 3 символов):</p><textarea name="text"> <?php echo $text; ?></textarea>
                            <br/><br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Отправить" />
                        </form>
                    </div><!--/sign up form-->
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>


