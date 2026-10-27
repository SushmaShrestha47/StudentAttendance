<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Add Student</h1>

    <form action="save_student.php" method="POST" class="form-box">

        <input type="text" name="roll_no" placeholder="Roll Number" required><br><br>

        <input type="text" name="name" placeholder="Student Name" required><br><br>

        <input type="text" name="class" placeholder="Class" required><br><br>

        <button type="submit" class="btn">Save Student</button>

    </form>

    <br>
    <a href="index.php" class="btn">Back to Home</a>

</div>

</body>
</html>