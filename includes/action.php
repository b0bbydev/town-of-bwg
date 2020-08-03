<?php
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'employeedb');

$input = filter_input_array(INPUT_POST);

$first_name = mysqli_real_escape_string($connect, $input["first_name"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);
$job_title = mysqli_real_escape_string($connect, $input["job_title"]);

if($input["action"] === 'edit')
{
    $query = "UPDATE employees SET first_name = '".$first_name."', last_name = '".$last_name."', job_title = '".$job_title."' WHERE id = '".$input["id"]."'";
    mysqli_query($connect, $query);
}// end of if.

if($input["action"] === 'delete')
{
    $query = "DELETE FROM employees WHERE id = '".$input["id"]."'";
    mysqli_query($connect, $query);
}// end of if.

echo json_encode($input);