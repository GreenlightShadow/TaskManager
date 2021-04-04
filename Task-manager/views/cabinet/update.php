<?php include ROOT . '/views/layouts/header.php'; ?>

<section class="section-inner">
    <div class="container">
        <div class="row">
            <h4>Редактировать задачу #<?php echo $id; ?></h4>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Имя пользователя</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $task['name']; ?>">
                        <p>Email</p>
                        <input type="text" name="email" placeholder="" value="<?php echo $task['email']; ?>">
                        <p>Текст задачи</p>
                        <input type="text" name="text" placeholder="" value="<?php echo $task['text']; ?>">
                        <p>Статус</p>
                        <select name="status">
                            <option value="Выполнено" <?php if ($task['status'] == "Выполнено") echo ' selected="selected"'; ?>>Выполнено</option>
                            <option value="В процессе" <?php if ($task['status'] == "В процессе") echo ' selected="selected"'; ?>>В процессе</option>
                        </select>
                        <br/><br/><br/>
                        <p>Категория</p>
                        <select name="category">
                            <option value="Не проверено" selected >Не проверено</option>
                        </select>
                        <br/><br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        <br/><br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>