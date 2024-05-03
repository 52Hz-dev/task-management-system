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

</div>
</form>

<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        const input = document.getElementById("myInput");
        const filter = input.value.toUpperCase();
        const div = document.getElementById("myDropdown");
        const a = div.getElementsByTagName("a");
        for (let i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>
<table id='table'>
    <thread>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Start Date</th>
        <th>Due Date</th>
        <th>Category</th>
        <th>Status</th>
    </tr>
    </thread>
    <tbody id="showdata">
    <?php
    $stt = 1;
    if ($data["tasklist"] == true) {
        while ($rows = mysqli_fetch_assoc($data["tasklist"])) {
    ?>
            <tr name="<?php echo $rows['id'];?>">
                <td><?php echo $stt++; ?></td>
                <td><?php echo $rows['name'] ?></td>
                <td><?php echo $rows['start_date'] ?></td>
                <td><?php echo $rows['due_date'] ?></td>
                <td><?php echo $rows['category'] ?></td>
                <td>
                    <p class="status <?php echo strtolower($rows['status']); ?>">
                        <?php echo $rows['status'] ?>
                    </p>
                </td>
            </tr>
    <?php
        }
    }
    ?>
    </tbody>
</table>
<script>
$(document).ready(function() {
    $("tr").click(function(){
        var idValue = $(this).attr('name');
        window.location.replace("http://localhost/task-management/Home/taskDetail/"+idValue);
    })
    
});
</script>
