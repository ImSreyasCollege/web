<?php
@include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="details-wrapper">
        <table>
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