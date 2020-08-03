<?php

include_once('includes/connect.php');

/* The purpose of this file is to handle insertion into drop down menu (database) */


// if add(button) $_POST is not empty. (something on form is submitted)
if (isset($_POST['add1']))
{
    // storing what is submitted in the jobTitle field in var.
    $job_title = $_POST['job_title'];

    // a sql query to add job titles from drop down menu.
    $addQuery = mysqli_query($conn, "INSERT INTO job_listings (job_title) VALUES ('$job_title')");

    // if query was successful show msg - error msg if not.
    if ($addQuery)
    {
        echo '<div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Item added to dropdown menu!</strong>
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

// if add(button) $_POST is not empty. (something on form is submitted)
if (isset($_POST['add2']))
{
    // storing what is submitted in the jobTitle field in var.
    $active_projects = $_POST['active_project'];

    // a sql query to add job titles from drop down menu.
    $addQuery = mysqli_query($conn, "INSERT INTO active_projects (active_project) VALUES ('$active_projects')");

    // if query was successful show msg - error msg if not.
    if ($addQuery)
    {
        echo '<div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Item added to dropdown menu!</strong>
              </div>
              ';
    } else {
        //echo mysqli_error($conn);
        echo '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error! Ensure that option doesn\'t exist in drop down.</strong>
              </div>
              ';
    } // end of if-else.
} // end of if.
