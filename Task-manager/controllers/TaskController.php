<?php

/**
 * Class TaskController
 * site main pages
 */
class TaskController {

    /**
     * Action for "index" site page 
     * @param int $order [optional] sort status
     * @param string $sort sort order
     * @param int $page [optional] current page number
     */
    public function actionIndex($order = 'id', $sort = 'ASC', $page = 1) {
      
        //get new tasks list
        $tasksList = Task::getTasksList($order, $sort, $page);
        
        // tasks amount (for page navigation)
        $total = Task::getTasksAmount();
        
        // new object Pagination (page navigation)
        $pagination = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');
        
        require_once(ROOT . '/views/task/index.php');
        return true;
    }
    
    /**
     * Creates new task 
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
        require_once(ROOT . '/views/task/create.php');
        return true;
    }
    

}
