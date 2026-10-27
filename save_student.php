<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $class = $_POST['class'];

    $sql = "INSERT INTO students (roll_no, name, class)
            VALUES ('$roll_no', '$name', '$class')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Student Added Successfully'); window.location.href='add_student.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>