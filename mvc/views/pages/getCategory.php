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
        <th>Create Date</th>
    </tr>
    </thread>
    <tbody id="showdata">
    <?php
    $stt = 1;
    if ($data["categorylist"] == true) {
        while ($rows = mysqli_fetch_assoc($data["categorylist"])) {
    ?>
            <tr>
                <td><?php echo $stt++; ?></td>
                <td><?php echo $rows['name'] ?></td>
                <td><?php echo $rows['date_created'] ?></td>
            </tr>
    <?php
        }
    }
    ?>
    </tbody>
</table>
<script>
$(document).ready(function() {
    var datatablephp = $('#table').DataTable({
        "paging": true // Enable pagination
    });
});
</script>
