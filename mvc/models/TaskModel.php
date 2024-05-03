<?php
class TaskModel extends DB
{
    public function getTaskList()
    {
        $query = "SELECT T.*,C.name as category FROM TASK T
                    LEFT JOIN CATEGORY C 
                    ON T.category_id=C.id ";
        return mysqli_query($this->con, $query);
    }

    public function getTask($id)
    {
        $query = "SELECT T.*,C.name as category FROM TASK T
                    LEFT JOIN CATEGORY C 
                    ON T.category_id=C.id
                    WHERE T.id='$id'";
        return mysqli_query($this->con, $query);
    }

    public function searchTaskList($search)
    {
        $query = "SELECT * FROM TASK WHERE NAME LIKE '%$search%'";
        return mysqli_query($this->con, $query);
    }

    public function getPlannedTask()
    {
        $query = "SELECT * FROM TASK WHERE STATUS='PLAN'";
        return mysqli_query($this->con, $query);
    }

    public function getInProgressTask($search)
    {
        $query = "SELECT * FROM TASK WHERE STATUS='In Progress'";
        return mysqli_query($this->con, $query);
    }

    public function getDoneTask($search)
    {
        $query = "SELECT * FROM TASK WHERE STATUS='Done'";
        return mysqli_query($this->con, $query);
    }


    public function addTask(
        $task_name,
        $task_description,
        $category,
        $start_date,
        $end_date
    ) {
        $query = "INSERT INTO task SET 
            name = '$task_name',
            description = '$task_description',
            category_id = $category,
            start_date = '$start_date',
            due_date = '$end_date'
        ";

        //Execute Query
        $res = mysqli_query($this->con, $query);
        return $res;
    }

    public function deleteTasks($task_name)
    {

        $query = "DELETE FROM task WHERE 
            id in ($task_name) 
        ";

        //Execute Query
        $res = mysqli_query($this->con, $query);
        return $res;
    }
    public function searchTask($name){
        $query =
         "SELECT T.*,C.name as category FROM TASK T
         LEFT JOIN CATEGORY C 
                    ON T.category_id=C.id
         WHERE t.name LIKE '%$name%'"; 
         $res = mysqli_query($this->con, $query);
         return $res;
    }
    public function planTask(){
        $query =
         "SELECT T.*,C.name as category FROM TASK T
         LEFT JOIN CATEGORY C 
                    ON T.category_id=C.id
         WHERE t.name LIKE '%plan%'"; 
         $res = mysqli_query($this->con, $query);
         return $res;
    }
    public function progressTask(){
        $query =
         "SELECT T.*,C.name as category FROM TASK T
         LEFT JOIN CATEGORY C 
                    ON T.category_id=C.id
         WHERE t.name LIKE '%in-progress%'"; 
         $res = mysqli_query($this->con, $query);
         return $res;
    }
    public function doneTask(){
        $query =
         "SELECT T.*,C.name as category FROM TASK T
         LEFT JOIN CATEGORY C 
                    ON T.category_id=C.id
         WHERE c.name LIKE '%done%'"; 
         $res = mysqli_query($this->con, $query);
         return $res;
    }
}
