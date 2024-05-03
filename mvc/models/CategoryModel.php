<?php
class CategoryModel extends DB{
    public function getCategoryList(){
        $query="SELECT * FROM CATEGORY";
        return mysqli_query($this->con, $query);
    }

    public function searchCategoryList($search){
        $query="SELECT * FROM TASK WHERE NAME LIKE '%$search%'";
        return mysqli_query($this->con, $query);
    }

    public function getPlannedTask(){
        $query="SELECT * FROM TASK WHERE STATUS='PLAN'";
        return mysqli_query($this->con, $query);
    }

    public function getInProgressTask($search){
        $query="SELECT * FROM TASK WHERE STATUS='In Progress'";
        return mysqli_query($this->con, $query);
    }

    public function getDoneTask($search){
        $query="SELECT * FROM TASK WHERE STATUS='Done'";
        return mysqli_query($this->con, $query);
    }
    

    public function SinhVien(){
        $qr = "SELECT * FROM sinhvien";
        return mysqli_query($this->con, $qr);
    }

}
?>