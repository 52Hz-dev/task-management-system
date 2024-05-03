<?php

// http://localhost/live/Home/Show/1/2

class Category extends Controller{

    // Must have SayHi()
    function SayHi(){
        $taskmodel = $this->model("CategoryModel");
        $category_list=$taskmodel->getCategoryList();
        $this->view("Home",[
            "page"=>"getCategory.php",
            "categorylist"=>$category_list
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
    function editTask(){
        $taskmodel = $this->model("TaskModel");
        $task_list=$taskmodel->getTaskList();
        $this->view("Home",[
            "page"=>"editTask.php",
            "tasklist"=>$task_list
        ]);

    }
    function Show($a, $b){        
        // Call Models
        $teo = $this->model("SinhVienModel");
        $tong = $teo->Tong($a, $b); // 3

        // Call Views
        $this->view("aodep", [
            "Page"=>"news",
            "Number"=>$tong,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
            "SV" => $teo->SinhVien()
        ]);
    }
}
?>