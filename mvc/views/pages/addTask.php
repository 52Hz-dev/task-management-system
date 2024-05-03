<form class="add-task" method="POST" action="../Home/add">
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <label for="description">Description:</label>
    <input type="text" name="description" required>
    <label for="category">Category:</label>
    <select name="category">
        <?php
        while ($row = mysqli_fetch_assoc($data["categorylist"])) {
            $category = $row['id'];
            $list_name = $row['name'];
        ?>
            <option value="<?php echo $category ?>"><?php echo $list_name; ?></option>
        <?php
        }
        ?>

    </select>

    <label for="start-date">Start Date: </label>
    <input type="date" name="start_date" required="required" />



    <td class="required-label">Due Date:
    <td><input type="date" name="end_date" required="required" />


        <input class="btn-primary btn-lg" type="submit" name="submit" value="SAVE" />
</form>




<?php

?>