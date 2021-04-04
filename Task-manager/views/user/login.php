<?php include ROOT . '/views/layouts/header.php'; ?>

<section class="section-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li class="error"> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                    <h2>Введите данные администратора</h2>
                    <p class="error">* - обязательное поле</p>
                    <form action="#" method="post">
                        <p>*Имя:</p><input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"/>
                        <p>*Пароль:</p><input type="password" name="password" placeholder="Пароль" value=""/>
                        <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                    </form>
                </div><!--/sign up form-->
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

