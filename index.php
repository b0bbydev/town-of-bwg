
<?php
/* Name: Bobby Jonkman
 * Purpose: Project for BWG co-op interview.
 */

// including all required php scripts.
include_once('includes/connect.php');
include_once('includes/add.php');
include_once('includes/delete.php');
include_once('includes/submit.php');
?>

<html lang="en">
<head>
    <title>Town of BWG | Form</title>
    <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Link to AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Bootstrap 3 - had issues with TableEdit plugin with Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <!-- TableEdit Plugin -->
    <script src="jquery.tabledit.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="main.css">
    <!-- JS -->
    <script src="main.js"></script>
    <!-- Dismissables were not working without this -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<!-- NAV-BAR -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="index.php">Mock Site</a>
    </div>
</nav>

<div>
    <!-- Option to select different forms - also see js file for the changeOptions function -->
    <form>
        <p class="h5 mb-4">Select the desired form</p>
        <select class="form-control" onchange="changeOptions(this)">
            <option disabled selected value> -- select a form to edit -- </option>
            <option value="form_1">Form 1</option>
            <option value="form_2">Form 2</option>
            <option value="form_3">View/Edit Database</option>
        </select>
    </form>
</div>

<!-- FORM 1 -->
<!-- Each fields value is captured using the POST global var. -->
<form class="text-center" method="POST" name="form_1" id="form_1" style="display:none">
    <p class="h5 mb-4">Employee ID</p>
    <!-- PHP code for input fields is to keep values in field in case submission is wrong -->
    <div>
        <input type="number" name="emp_id" class="form-control mb-3" placeholder="Employee ID" value="<?= isset($_POST['emp_id']) ? $_POST['emp_id'] : ''; ?>">
    </div>

    <div>
        <p class="h5 mb-4">Name</p>
        <div class="form-row">
            <div class="col">
                <input type="text" name="first_name" class="form-control mb-4" placeholder="First name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>">
            </div>
            <div class="col">
                <input type="text" name="last_name" class="form-control mb-4" placeholder="Last name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>">
            </div>
        </div>
    </div>

    <p class="h5 mb-4">Job Title</p>
    <div class="form-row">
        <div class="col">
            <!-- Creating the dropdown menu -->
            <select name="dropdown" id="list" class="form-control mb-4">
                <?php
                // creating a SQL query to show records from database.
                $sql = mysqli_query($conn, "SELECT job_title FROM job_listings");

                // this loop will use the SQL query to actually echo out the records.
                while ($row = mysqli_fetch_assoc($sql))
                {?>
                    <option value="<?php echo $row['job_title']; ?>"><?php echo $row['job_title']; ?></option>
                <?php }?>
            </select>
        </div>

        <!-- Field for adding/deleting dropdown menu items -->
        <div class="col-xs-4">
            <input type="text" name="job_title" class="form-control" placeholder="Edit drop down (optional)">
        </div>
    </div>

    <div class="mb-4">
        <!-- Add button -->
        <input type="submit" name="add1" value="Add to drop down" id="add">
        <!-- Delete button -->
        <input type="submit" name="delete1" value="Delete from drop down" id="delete">
    </div>
    <div class="mb-4">
        <!-- Submit button -->
        <input type="submit" name="save1" value="Submit Entry" id="submit">
    </div>
</form>
<!-- END OF FORM 1 -->

<!-- FORM 2 -->
<form class="text-center" method="POST" name="form_2" id="form_2" style="display:none">
    <p class="h5 mb-4">Active Projects</p>
    <div class="form-row">
        <div class="col">
            <!-- Creating the dropdown menu -->
            <select name="dropdown2" id="list" class="form-control mb-4">
                <?php
                // creating a SQL query to show records from database.
                $sql = mysqli_query($conn, "SELECT active_project FROM active_projects");

                // this loop will use the SQL query to actually echo out the records.
                while ($row = mysqli_fetch_assoc($sql))
                {?>
                    <option value="<?php echo $row['active_project']; ?>"><?php echo $row['active_project']; ?></option>
                <?php }?>
            </select>
        </div>

        <!-- Field for adding/deleting dropdown menu items -->
        <div class="col-xs-4">
            <input type="text" name="active_project" class="form-control" placeholder="Edit drop down (optional)">
        </div>
    </div>

    <div class="mb-4">
        <!-- Add button -->
        <input type="submit" name="add2" value="Add to drop down" id="add2">
        <!-- Delete button -->
        <input type="submit" name="delete2" value="Delete from drop down" id="delete2">
    </div>
</form>
<!-- END OF FORM 2 -->


<!-- Displaying info from db as option in form selection drop down -->
<form class="text-center" method="POST" name="form_3" id="form_3" style="display:none">
    <div class="table-responsive">
        <table id="editable_table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job Title</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $query = "SELECT * FROM employees ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result))
            {
                echo '
                     <tr>
                     <td>' . $row["id"] . '</td>
                     <td>' . $row["first_name"] . '</td>
                     <td>' . $row["last_name"] . '</td>
                     <td>' . $row["job_title"] . '</td>
                     </tr>
                     ';
            }// end of while
            ?>
            </tbody>
        </table>
    </div>
</form>
<!-- END OF SHOW DATABASE. -->
</body>
</html>

