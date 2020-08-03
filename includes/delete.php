<?php

include_once('includes/connect.php');

/* The purpose of this file is to delete records from drop down menu (database) */

// if delete(button) $_POST is not empty. (something on form is submitted)
if (isset($_POST['delete1']))
{
    // storing what is submitted in the jobTitle field in var.
    $job_title = $_POST['job_title'];

    // a sql query to delete job titles from drop down menu.
    $deleteQuery = mysqli_query($conn, "DELETE FROM job_listings WHERE job_title = '$job_title'");

    // if query was successful show msg - error msg if not.
    if ($deleteQuery)
    {
        echo '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Item has been removed from dropdown!</strong>
              </div>
              ';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong>
              </div>
              ';
    } // end of if-else.
} // end of if.

// This is for the second form (add button's 'name' is delete2)
if (isset($_POST['delete2']))
{
    // storing what is submitted in the jobTitle field in var.
    $active_projects = $_POST['active_project'];

    // a sql query to delete job titles from drop down menu.
    $deleteQuery = mysqli_query($conn, "DELETE FROM active_projects WHERE active_project = '$active_projects'");

    // if query was successful show msg - error msg if not.
    if ($deleteQuery)
    {
        echo '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Item has been removed from dropdown!</strong>
              </div>
              ';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong>
              </div>
              ';
    } // end of if-else.
} // end of if.

