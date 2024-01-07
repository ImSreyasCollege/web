<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $mark = $_POST['mark'];
    $result = $conn->query("INSERT INTO students SET name='$name', roll_no=$roll_no, mark=$mark");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert data</title>
    <link rel="stylesheet" href="style.css">
    <style>
    </style>
</head>

<body>
    <div class="form-wrapper">
        <form action="" method="post">
            <input required placeholder="roll no." type="text" name="roll_no" />
            <input required placeholder="name" type="text" name="name" />
            <input required placeholder="mark" type="text" name="mark" />
            <button type="submit">insert</button>
        </form>
    </div>

</body>

</html>