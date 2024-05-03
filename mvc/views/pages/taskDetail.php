<div class="control">

    <form action="">
        <button class="button" formaction="http://localhost/task-management/Home/addTask">Insert</button>
        <button class="button" formaction="http://localhost/task-management/Home/editTask">Edit</button>
        <button class="button disabled">Delete</button>
        <div class="dropdown">
            <button type="button" onclick="myFunction()" class="dropbtn">Filter</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="http://localhost/task-management/Home/planTask">Plan</a>
                <a href="http://localhost/task-management/Home/progressTask">In Progress</a>
                <a href="http://localhost/task-management/Home/doneTask">Done</a>
            </div>
        </div>

    </form>

</div>

<div class="card-container" id="showdata">
    <?php
    if ($data["tasklist"] == true) {
        while ($rows = mysqli_fetch_assoc($data["tasklist"])) {
    ?>
            <div class="card" name="<?php echo $rows['id']; ?>">
                <div class="card-header">
                <a href="http://localhost/task-management/Home/updateTask"><p><i class="fa fa-edit"></i></i></p></a>
                    <h2><?php echo $rows['name'] ?></h2>
                    <p class="status <?php echo strtolower($rows['status']); ?>"><?php echo $rows['status'] ?></p>
                </div>
                <div class="card-body">
                    <p><strong>Start Date:</strong> <?php echo $rows['start_date'] ?></p>
                    <p><strong>Due Date:</strong> <?php echo $rows['due_date'] ?></p>
                    <p><strong>Category:</strong> <?php echo $rows['category'] ?></p>
                    <p><strong>Description:</strong><?php echo $rows['description'] ?></p>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>

<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
</script>
<style>
    /* Card Container */
    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        justify-content: center;
        padding: 20px;
    }

    /* Card */
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Card Header */
    .card-header {
        margin-bottom: 15px;
    }

    .card-header h2 {
        margin: 0;
        font-size: 22px;
        color: #333;
    }

    .status {
        padding: 8px 15px;
        border-radius: 20px;
        color: #fff;
        font-weight: bold;
    }

    .status.todo {
        background-color: #ffc107; /* yellow */
    }

    .status.inprogress {
        background-color: #007bff; /* blue */
    }

    .status.done {
        background-color: #28a745; /* green */
    }

    /* Card Body */
    .card-body p {
        margin: 0;
        margin-bottom: 10px;
        color: #666;
    }

    .card-body p strong {
        font-weight: bold;
    }
</style>
