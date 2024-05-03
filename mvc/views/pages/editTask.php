<div class="control">

        <form method="POST" action="../Home/deleteTasks" >
        <button class="button" formaction="http://localhost/task-management/Home/addTask">Insert</button>
        <button class="button" formaction="http://localhost/task-management/Home/editTask">Edit</button>
        <button class="button" name="deleteBtn" type="submit">Delete</button> 
        <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Filter</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="#about">Plan</a>
                            <a href="#base">In Progress</a>
                            <a href="#blog">Done</a>
                        </div>
                    </div>

        </div>
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
        <table>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>Due Date</th>
                <th>Category</th>
                <th>Status</th>
                <th>Select</th>
            </tr>
            <?php
            $stt=1;
            if ($data["tasklist"] == true) {
                while ($rows = mysqli_fetch_assoc($data["tasklist"])) {
            ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['start_date'] ?></td>
                        <td><?php echo $rows['due_date'] ?></td>
                        <td><?php echo $rows['category'] ?></td>
                        <td>
                            <p class="status <?php echo strtolower($rows['status'])?>">Plan</p>
                        </td>
                        <td><input type="checkbox" name="records[]" value="<?php echo $rows['id']; ?>"></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        </form>

        
