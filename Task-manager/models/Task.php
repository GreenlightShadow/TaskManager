<?php

/**
 * Model Task for tasks manages
 */
class Task {
    
     // task amount displayed on current page by default
    const SHOW_BY_DEFAULT = 3;
    
   
    /**
     * Returns task list (depending on page number)
     * @param string $order [optional] table column for ordering
     * @param int $page [optional] current page number
     * @return array array with tasks
     */
    public static function getTasksList($order, $sort, $page) {
 
        //tasks on page
        $limit = Task::SHOW_BY_DEFAULT;
        
        // offset (for DB query), depending on page number
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
        $db = Db::getConnection();

        $sql = 'SELECT id, name, email, text, category, status FROM task '
                . 'ORDER BY '.$order.' '.$sort.' LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        
        $i = 0;
        $tasks = array();
        while ($row = $result->fetch()) {
            $tasks[$i]['id'] = $row['id'];
            $tasks[$i]['name'] = $row['name'];
            $tasks[$i]['email'] = $row['email'];
            $tasks[$i]['text'] = $row['text'];
            $tasks[$i]['category'] = $row['category'];
            $tasks[$i]['status'] = $row['status'];
            $i++;
        }
        return $tasks;
    }
    /**
     * Returns amount of tasks from DB
     * @return integer amount of tasks in DB
     */

    public static function getTasksAmount() {
        
        $db = Db::getConnection();
        
        $sql = 'SELECT count(id) AS count FROM task';
        
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        
        return $row['count'];
    }
    
     /**
     * Returns task info by id
     * @param integer $id task id
     * @return array array with task info
     */
    public static function getTaskById($id) {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM task WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

     /**
     * Update task by id
     * @param integer $id task id
     * @param array $options task info array
     * @return boolean 
     */
    public static function updateTaskById($id, $options) {
        $db = Db::getConnection();

        $sql = "UPDATE task
            SET 
                name = :name, 
                email = :email, 
                text = :text, 
                status = :status,
                category = :category 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':text', $options['text'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_STR);
        $result->bindParam(':category', $options['category'], PDO::PARAM_STR);
        
        return $result->execute();
    }

    
    /**
     * Adds new task
     * @param array $name user name
     * @param array $email user email
     * @param array $text task info 
     * @return boolean 
     */
    public static function createTask($name, $email, $text) {
        
        $db = Db::getConnection();

        $sql = 'INSERT INTO task '
                . '(name, email, text)'
                . 'VALUES '
                . '(:name, :email, :text)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);

        return $result->execute();
    }
    
    /**
     * Checks name (only letters, numbers and spaces, min 1 simbol)
     * @param string $name user name
     * @return boolean result
     */
    public static function checkName($name) {
        if (preg_match("/^[a-zA-Za-яA-Я0-9 ]+$/",$name)) {
            return true;
        }
        return false;
    }
    
      /**
     * Checks email
     * @param string $email user email
     * @return boolean result
     */
    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    /**
     * Checks text (not less than 3 symbols)
     * @param string $text task text
     * @return boolean result
     */
    public static function checkText($text) {
        if (mb_strlen($text) >= 3) {
            return true;
        }
        return false;
    }

  
}
