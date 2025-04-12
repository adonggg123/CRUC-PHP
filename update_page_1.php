<?php
include('dbcon.php');

if (isset($_POST['update_students'])) {
    $id = $_POST['id'];
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if ($fname == "" || empty($fname)) {
        header('Location: index.php?message=You need to fill in the first name!');
        exit();
    } else {
        $query = "UPDATE students SET first_name = '$fname', last_name = '$lname', age = '$age' WHERE id = '$id'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Update Failed: " . mysqli_error($connection));
        } else {
            header('Location: index.php?insert_msg=Student updated successfully!');
            exit();
        }
    }
}
?>
