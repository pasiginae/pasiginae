<?php
include('admin/config/dbcon.php');

// Establish database connection
$con = new mysqli('localhost', 'u493132415_binary101', 'Pasiginae101', 'u493132415_pasiginaenae');

// Check for connection error
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Capture form data and sanitize inputs
$bname = mysqli_real_escape_string($con, $_POST['bname']);
$bage = mysqli_real_escape_string($con, $_POST['bage']);
$bdatedeath = mysqli_real_escape_string($con, $_POST['bdatedeath']);
$bdatetime = mysqli_real_escape_string($con, $_POST['bdatetime']);
$bparish = mysqli_real_escape_string($con, $_POST['bparish']);
$blfuneral = mysqli_real_escape_string($con, $_POST['blfuneral']);
$breserve = mysqli_real_escape_string($con, $_POST['breserve']);
$bemail = mysqli_real_escape_string($con, $_POST['bemail']);
$bcontact = mysqli_real_escape_string($con, $_POST['bcontact']);
$bdeathcert = mysqli_real_escape_string($con, $_POST['bdeathcert']);

// Insert data into the burial table
$query = "INSERT INTO BURIAL (full_name, age, date_of_death, funeral_date, parish, funeral_location, reserver_name, email, contact_no, death_certificate) 
VALUES ('$bname', '$bage', '$bdatedeath', '$bdatetime', '$bparish', '$blfuneral', '$breserve', '$bemail', '$bcontact', '$bdeathcert')";

// Execute the query and check for errors
if (mysqli_query($con, $query)) {
    echo "Record added successfully.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

// Close connection
mysqli_close($con);
?>