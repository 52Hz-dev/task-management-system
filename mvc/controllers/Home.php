<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{

    // Must have SayHi()
    function SayHi(){
        $taskmodel = $this->model("TaskModel");
        $task_list=$taskmodel->getTaskList();
        $this->view("Home",[
            "page"=>"getTask.php",
            "tasklist"=>$task_list
        ]);

    }

    function addTask(){
        $taskmodel = $this->model("TaskModel");
        $categorymodel=$this->model("CategoryModel");
        $task_list=$taskmodel->getTaskList();
        $category_list=$categorymodel->getCategoryList();
        $this->view("Home",[
            "page"=>"addTask.php",
            "categorylist"=>$category_list,
            "tasklist"=>$task_list
        ]);
        
    }
    function add(){
         //Check whether the SAVE button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the Values from Form
        $task_name = $_POST['name'];
        $task_description = $_POST['description'];
        $category = $_POST['category'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        
    }
    $taskmodel = $this->model("TaskModel");
    $res=$taskmodel->addTask(
        $task_name,$task_description,$category
        ,$start_date,$end_date
    );
    if($res==true)
    {
        //Query Executed and Task Inserted Successfully
        $_SESSION['add'] = "Task Added Successfully.";
        //Redirect to Homepage
        header('location:'."http://localhost/task-management/Home");
        
    }
    else
    {
        //FAiled to Add TAsk
        $_SESSION['add_fail'] = "Failed to Add Task";
        //Redirect to Add TAsk Page
        header('location:'."http://localhost/task-management/Home/addTask");
    }
    return $res;
    }


    function editTask(){
        $taskmodel = $this->model("TaskModel");
        $task_list=$taskmodel->getTaskList();
        $this->view("Home",[
            "page"=>"editTask.php",
            "tasklist"=>$task_list
        ]);

    }

    function getCategory(){
        $categorymodel=$this->model("CategoryModel");
        $category_list=$categorymodel->getCategoryList();
        $this->view("Home",[
            "page"=>"getCategory",
            "tasklist"=>$category_list
        ]);
    }

    function deleteTasks(){
        
        if(isset($_POST['deleteBtn'])){
            $taskmodel=$this->model("TaskModel");
            $all_id=$_POST['records'];
            $extract_id="'" . implode("','", $all_id) . "'";
            $taskmodel->deleteTasks($extract_id);
            header('location:'."http://localhost/task-management/Home");
        }
    }
    function searchTask(){
        if(isset($_POST['btnSearch'])){
        $taskmodel=$this->model("TaskModel");
        $name = $_POST['getName'];
        
        
        $task_list=$taskmodel->searchTask($name);
        $this->view("Home",[
            "page"=>"getTask.php",
            "tasklist"=>$task_list
        ]);
    }

    }
    function planTask(){
        $taskmodel=$this->model("TaskModel");
        $task_list=$taskmodel->planTask();
        $this->view("Home",[
            "page"=>"getTask.php",
            "tasklist"=>$task_list
        ]);
    }
    function progressTask(){
        $taskmodel=$this->model("TaskModel");
        $task_list=$taskmodel->progressTask();
        $this->view("Home",[
            "page"=>"getTask.php",
            "tasklist"=>$task_list
        ]);
    }

    function doneTask(){
        $taskmodel=$this->model("TaskModel");
        $task_list=$taskmodel->doneTask();
        $this->view("Home",[
            "page"=>"getTask.php",
            "tasklist"=>$task_list
        ]);

    }
    function taskDetail($id){
        $taskmodel=$this->model("TaskModel");
        $task_list=$taskmodel->getTask($id);
        $this->view("Home",[
            "page"=>"taskDetail.php",
            "tasklist"=>$task_list
        ]);
    }
    function updateTask($id){
        $taskmodel=$this->model("TaskModel");
        $task_list=$taskmodel->getTask($id);
        $this->view("Home",[
            "page"=>"taskDetail.php",
            "tasklist"=>$task_list
        ]);
    }

}
?>