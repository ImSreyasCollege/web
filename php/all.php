<?php 
    $con = new mysqli("localhost", "root", "root", "23mca053") or die("Connection failed.");
    // Checking if the submit button of insert form is clicked
    // The code will only execute when the submit button in the insert form is clicked, else it won't execute the code inside the if block below
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])){
        $sql = "insert into students set name='$_POST[name]', department='$_POST[department]', roll_no=$_POST[rollNo], mark=$_POST[mark]";
        $res = $con->query($sql);
    }
    // Checking if the submit button of update form is clicked
    // The code will only execute when the submit button in the update form is clicked, else it won't execute the code inside the if block below
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])){
        $sql = "update students set name='$_POST[name]', department='$_POST[department]', roll_no=$_POST[rollNo], mark=$_POST[mark] where id=$_POST[id]";
        $res = $con->query($sql);
    }
    // Checking if the submit button of delete form is clicked
    // The code will only execute when the submit button in the delete form is clicked, else it won't execute the code inside the if block below
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])){
        $sql = "delete from students where id=$_POST[id]";
        $res = $con->query($sql);
    }
?>

<html>
    <head>
        <style>
            *{
                box-sizing: border-box;
                margin: 0;
                padding: 0;
                font-family: "Open Sans";
            }
            body{
                width: 100%;
                min-height: 100dvh;
                max-height: fit-content;
                padding: 1rem 5rem;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
            table{
                width: 100%;
                text-align: center;
                border-collapse: collapse;
            }
            table td, table th{
                border: 1px solid black;
                padding: .2rem .8rem;
            }
            h2{
                margin-block: 1rem;
            }
            input, button{
                display: block;
                width: 100%;
                padding: .5rem 1rem;
                margin-block-start: .5rem;
                border-radius: .2rem;
                border: 1px solid gray;
            }
        </style>
        <script>
            const insertValidation = () => {
                const name = document.insertForm.name.value
                const department = document.insertForm.department.value
                const rollNo = document.insertForm.rollNo.value
                const mark = document.insertForm.mark.value
                if(name === "" || department === "" || rollNo === "" || mark === "") { // Checking any of the field is empty, 
                    alert("input field cannot be empty!")
                    return false
                } else return true
            }
            const updateValidation = () => {
                const id = document.updateForm.id.value
                const name = document.updateForm.name.value
                const department = document.updateForm.department.value
                const rollNo = document.updateForm.rollNo.value
                const mark = document.updateForm.mark.value
                if(id === "" || name === "" || department === "" || rollNo === "" || mark === "") { // Checking any of the field is empty, 
                    alert("input field cannot be empty!")
                    return false
                } else return true
            }
            const deleteValidation = () => {
                const id = document.deleteForm.id.value
                if(id === "") { // Checking id is empty or not.
                    alert("ID cannot be empty!")
                    return false
                } else return true
            }
        </script>
    </head>
    <body>
        <div class="first">
            <h2>Insert</h2>
            <form action="" method="post" name="insertForm" onsubmit="return insertValidation();">
                <input type="text" name="name" placeholder="Enter your name" />
                <input type="text" name="department" placeholder="Department" />
                <input type="number" name="rollNo" placeholder="Roll no." />
                <input type="number" name="mark" placeholder="Enter your mark" />
                <button type="submit" name="insert">insert</button>
            </form>
            <h2>Update</h2>
            <form action="" method="post" name="updateForm" onsubmit="return updateValidation();">
                <input type="number" name="id" placeholder="ID" />
                <input type="text" name="name" placeholder="Enter your name" />
                <input type="text" name="department" placeholder="Department" />
                <input type="number" name="rollNo" placeholder="Roll no." />
                <input type="number" name="mark" placeholder="Enter your mark" />
                <button type="submit" name="update">update</button>
            </form>
        </div>
        <div class="second">
            <h2>Delete</h2>
            <form action="" method="post" name="deleteForm" onsubmit="return deleteValidation();">
                <input type="number" name="id" placeholder="Enter the id to delete" />
                <button type="submit" name="delete">delete</button>
            </form>

            <h2>Display</h2>
            <div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Roll no</th>
                        <th>Mark</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM students"; // SQL Query for selecting all student details from the database.
                        $result = $con->query($sql); // Executing the Query (using the query method)

                        // Checking if the no.of rows in the student table is greater than 0, 
                        // Greater than 0 means, there is student record present in the database 
                        // Else means there is no data in the student table (0 number of rows in the database)
                        // The if block will only execute when there is student data in the database.
                        if($result->num_rows > 0){ 
                            while($row = $result->fetch_assoc()){ // Selecting student data one row at a time, in each of the loop - it will be the data about a single student.
                                echo "<tr>";
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['department']."</td>";
                                echo "<td>".$row['roll_no']."</td>";
                                echo "<td>".$row['mark']."</td>";
                                echo "</tr>";
                            }
                        } else echo "no result found"; // Displaying no result if the no.of rows in the database is 0.
                    ?>
                </table>
            </div>
        </div>
        
    </body>
</html>