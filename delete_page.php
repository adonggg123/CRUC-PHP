<?php
include('dbcon.php');

if (isset($_POST['delete_student'])) {
    $student_id = $_POST['student_id'];

    if ($student_id == "" || empty($student_id)) {
        header('Location: index.php?message=Student ID is required to delete!');
        exit();
    } else {
        $query = "DELETE FROM `students` WHERE `id` = '$student_id'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Delete Failed: " . mysqli_error($connection));
        } else {
            header('Location: index.php?delete_msg=Student deleted successfully!');
            exit();
        }
    }
}
?>
