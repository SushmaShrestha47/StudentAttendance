<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
include "db.php";

// Fetch all students
$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Mark Attendance</h1>

    <form action="save_attendance.php" method="POST">

        <label>Select Date:</label><br>
        <input type="date" name="attendance_date" required><br><br>

        <table class="table-box" border="1">
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Class</th>
                <th>Status</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['roll_no']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['class']; ?></td>

                <td>
                    <input type="hidden" name="student_id[]" value="<?php echo $row['id']; ?>">

                    <select name="status[]">
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                    </select>
                </td>
            </tr>
            <?php } ?>

        </table>

        <br>
        <button type="submit" class="btn">Save Attendance</button>

    </form>

    <br>
    <a href="index.php" class="btn">Back to Home</a>

</div>

</body>
</html>