<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $mark = $_POST['mark'];
    $id = $_POST['id'];
    $result = $conn->query("UPDATE students SET name='$name', roll_no=$roll_no, mark=$mark where id=$id");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST['id'];
    $result = $conn->query("DELETE FROM students where id=$id");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update and delete data</title>
    <link rel="stylesheet" href="style.css">
    <style>
    </style>
</head>

<body>
    <div class="form">
        <form action="" method="post" class="update-form">
            <input required placeholder="id" type="text" name="id" />
            <input required placeholder="roll no." type="text" name="roll_no" />
            <input required placeholder="name" type="text" name="name" />
            <input required placeholder="mark" type="text" name="mark" />
            <button type="submit" name="update">update</button>
        </form>
        <form action="" method="post" class="delete-form">
            <input required placeholder="id" type="text" name="id" />
            <button type="submit" name="delete">delete</button>
        </form>
        <table class="update-table">
            <tr>
                <th>id</th>
                <th>roll no</th>
                <th>name</th>
                <th>mark</th>
            </tr>
            <?php
            $data = mysqli_query($conn, "select * from students");
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
                    echo "<tr>
                        <form method='post' action=''>
                        ";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['roll_no'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['mark'] . "</td>";
                    echo "</form>
                        </tr>";
                }
            }
            ?>
        </table>
    </div>

</body>

</html>