
<?php

include_once('includes/connect.php');

/* The purpose of this file is to handle submission of employee info. */

// if save(button) $_POST is not empty. (something on form is submitted)
if (isset($_POST['save1']))
{
    // creating vars using POST from HTML form.
    $empID = $_POST['emp_id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $job_title = $_POST['dropdown'];

    // making a SQL query to send info to database.
    $sendQuery = mysqli_query($conn, "INSERT INTO employees (id, first_name, last_name, job_title) VALUES ('$empID', '$fname', '$lname', '$job_title')");

    // if query was successful show msg - error msg if not.
    if ($sendQuery)
    {
        echo '<div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Employee info successfully submitted!</strong>
              </div>
              ';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error! Ensure that Employee ID is not blank or a duplicate.</strong>
              </div>
              ';
    } // end of if-else.
}// end of if.



// if save(button) $_POST is not empty. (something on form is submitted)
if (isset($_POST['save2']))
{
    // creating vars using POST from HTML form.
    $active_project = $_POST['dropdown2'];

    // making a SQL query to send info to database.
    $sendQuery = mysqli_query($conn, "INSERT INTO active_projects (active_project) VALUES ('$active_project')");

    // if query was successful show msg - error msg if not.
    if ($sendQuery)
    {
        echo '<div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Employee info successfully submitted!</strong>
              </div>
              ';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error! Ensure that option doesn\'t exist in drop down.</strong>
              </div>
              ';
    } // end of if-else.
} // end of if.
