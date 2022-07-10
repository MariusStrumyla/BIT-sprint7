<?php
require_once "dbcon.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects table</title>
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

    $sql2 = "SELECT projects.id, Project_Name, group_concat(employees.Name SEPARATOR ', ') as Group_employees 
    FROM projects
    LEFT JOIN employees ON Projects.id = employees.Project_id
    GROUP BY Project_Name
    ORDER BY projects.id";

    $result2 = mysqli_query($conn, $sql2);

    // Checking catched exceptions ----
    if (!empty($_GET['err'])) {
    ?>
        <p class="error_txt">You can't duplicate projects!</p>
    <?php
    } else if (!empty($_GET['err2'])) {
    ?>
        <p class="error_txt">You can't enter blank space!</p>
    <?php
    }  
?>

    <table class="myTable">
        <tr class="topTable">
            <th>Id</th>
            <th>Project name</th>
            <th>Employees</th>
            <th>&#10006</th>
            <th>&#9998</th>
        </tr>

        <?php

        if (mysqli_num_rows($result2) > 0) {

            foreach ($result2 as $row) {
        ?>
                <tr>
                    <td><?= $row["id"]; ?></td>
                    <td><?= $row["Project_Name"]; ?></td>
                    <td><?= $row["Group_employees"]; ?></td>
                    <td><a class="a_delete" href="delete_proj.php?id=<?= $row["id"] ?>">Delete</a></td>
                </tr>
        <?php

            }
        } else {
            echo "0 results";
        }
        ?>
    </table>

    <?php
    mysqli_close($conn);
    ?>

</body>

</html>