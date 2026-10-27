<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $date = $_POST['attendance_date'];
    $student_ids = $_POST['student_id'];
    $statuses = $_POST['status'];

    // Loop through all students
    for ($i = 0; $i < count($student_ids); $i++) {

        $student_id = $student_ids[$i];
        $status = $statuses[$i];

        // Check if attendance already exists for same student and date
        $check = "SELECT * FROM attendance 
                  WHERE student_id='$student_id' 
                  AND attendance_date='$date'";

        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) == 0) {

            // Insert attendance
            $sql = "INSERT INTO attendance (student_id, attendance_date, status)
                    VALUES ('$student_id', '$date', '$status')";

            mysqli_query($conn, $sql);
        } else {

            // Update if already exists
            $sql = "UPDATE attendance 
                    SET status='$status'
                    WHERE student_id='$student_id' 
                    AND attendance_date='$date'";

            mysqli_query($conn, $sql);
        }
    }

    echo "<script>
        alert('Attendance Saved Successfully!');
        window.location.href='attendance.php';
    </script>";
}
?>