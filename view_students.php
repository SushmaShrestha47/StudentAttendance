<?php
include "db.php";

// Fetch all students
$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Student List</h1>

    <table border="1" cellpadding="10" cellspacing="0" class="table-box">
        <tr>
            <th>ID</th>
            <th>Roll No</th>
            <th>Name</th>
            <th>Class</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['roll_no']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['class']; ?></td>
        </tr>
        <?php } ?>

    </table>

    <br>
    <a href="index.php" class="btn">Back to Home</a>

</div>

</body>
</html>