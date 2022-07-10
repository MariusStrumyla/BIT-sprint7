<?php
require_once "dbcon.php";
require "functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, itial-scale=1.0">
    <title>Employees table</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <nav>
            <a class="main_part" href="./index.php">Employees</a>
            <a class="main_part" href="./projects.php">Projects</a>
        </nav>
    </header>


    <?php
        
    if (!empty($_GET['err_adding_empl'])) {
    ?>
        <p class="error_txt">You can't duplicate employees!</p>
    <?php
    }
    if (!empty($_GET['err_noname_empl'])) {
    ?>
        <p class="error_txt">You can't enter blank space!</p>
    <?php
    }
    ?>

    <table class="myTable">
        <tr class="topTable">
            <th>Id</th>
            <th>Name</th>
            <th>Project Name</th>
            <th>&#10006</th>
            <th>&#9998</th>
        </tr>


        <?php

        $sql = "SELECT employees.id, employees.name, employees.project_id, projects.Project_Name 
                    FROM employees
                    LEFT JOIN projects ON Projects.id = employees.Project_id
                    ORDER BY employees.id";

        $sql2 = "SELECT Projects.id, Project_Name
                    FROM projects
                    GROUP BY Project_Name
                    ORDER BY Project_Name";

        $result2 = mysqli_query($conn, $sql2);
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            foreach ($result as $row) {
        ?>
                <tr>
                    <td><?= $row["id"]; ?></td>
                    <td><?= $row["name"]; ?></td>
                    <td><?= $row["Project_Name"]; ?></td>
                    <td><a class="a_delete" href="delete_empl.php?id=<?= $row["id"] ?>">Delete</a></td>
                </tr>

        <?php

            }
        } else {
            echo "0 results";
        }
        ?>
        <br>
    </table>

    <?php

    mysqli_close($conn);
    ?>

</body>

</html>