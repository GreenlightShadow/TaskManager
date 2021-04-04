<?php

/**
 * Class CabinetController
 * Class for admin cabinet manage
 */
class CabinetController extends AdminBase {

    /**
     * Action for "Admin cabinet" main page
     */
    public function actionIndex() {

        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

    /**
     * Action for "Task data edit" page
     * @param int $order [optional] sort status
     * @param string $sort sort order
     * @param int $page [optional] current page number
     */
    public function actionEdit($order = 'id', $sort = 'ASC', $page = 1) {

        //get new tasks list
        $tasksList = Task::getTasksList($order, $sort, $page);

        // tasks amount (for page navigation)
        $total = Task::getTasksAmount();

        // new object Pagination (page navigation)
        $pagination = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }

    /**
     * Updates task data by id
     * @param integer $id task id
     */
    public function actionUpdate($id) {

        $task = Task::getTaskById($id);

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['text'] = $_POST['text'];
            $options['status'] = $_POST['status'];
            $options['category'] = $_POST['category'];

            // validate category
            if ($options['text'] != $task['text']) {
                $options['category'] = 'Отредактировано администратором';
            }else {
                $options['category'] = 'Задача не отредактирована';
            }

            $result = Task::updateTaskById($id, $options);
            
            header("Location: /cabinet/order-id/sort-desc/page-1");
        }
        require_once(ROOT . '/views/cabinet/update.php');
        return true;
    }
    
    /**
     * Creates new task by admin
     */
     public function actionCreate() {
         
          // form data
        $name = $email = $text = $result = false;

        if (isset($_POST['submit'])) {
            //get form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['text'];
        
            // errors flag
            $errors = false;

            // validation
            if (!Task::checkName($name)) {
                $errors[] = 'В имени разрешены только буквы, цифры и пробелы';
            }
            if (!Task::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!Task::checkText($text)) {
                $errors[] = 'Текст задачи не должен быть короче 3-х символов';
            }

            if ($errors == false) {
                // add new task
                $result = Task::createTask($name, $email, $text);
            }
        }
        require_once(ROOT . '/views/cabinet/create.php');
        return true;
    }
    

}
