<?php
include('admin/config/dbcon.php'); // Ensure this file includes database connection credentials

// Create database connection
$con = new mysqli('localhost', 'u493132415_binary101', 'Pasiginae101', 'u493132415_pasiginaenae'); // Replace with your DB name

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Retrieve form data
$bapfname = mysqli_real_escape_string($con, $_POST['bapfname']);
$bapmname = mysqli_real_escape_string($con, $_POST['bapmname']);
$baplname = mysqli_real_escape_string($con, $_POST['baplname']);
$bapdbirth = mysqli_real_escape_string($con, $_POST['bapdbirth']);
$bappbirth = mysqli_real_escape_string($con, $_POST['bappbirth']);
$bapnationality = mysqli_real_escape_string($con,  $_POST['bapnationality']);
$ffname = mysqli_real_escape_string($con, $_POST['ffname']);
$fmname = mysqli_real_escape_string($con, $_POST['fmname']);
$flname = mysqli_real_escape_string($con, $_POST['flname']);
$bapfpbirth = mysqli_real_escape_string($con, $_POST['bapfpbirth']);
$fresidence = mysqli_real_escape_string($con, $_POST['fresidence']);
$bapfstatus = mysqli_real_escape_string($con, $_POST['bapfstatus']);
$mfname = mysqli_real_escape_string($con, $_POST['mfname']);
$mmname = mysqli_real_escape_string($con, $_POST['mmname']);
$mlname = mysqli_real_escape_string($con, $_POST['mlname']);
$bapmpbirth = mysqli_real_escape_string($con, $_POST['bapmpbirth']);
$mresidence = mysqli_real_escape_string($con, $_POST['mresidence']);
$bapmstatus = mysqli_real_escape_string($con, $_POST['bapmstatus']);
$mpsponsors = mysqli_real_escape_string($con, $_POST['mpsponsors']);
$fpsponsors = mysqli_real_escape_string($con, $_POST['fpsponsors']);
$sponsors3 = mysqli_real_escape_string($con, $_POST['sponsors3']);
$sponsors4 = mysqli_real_escape_string($con, $_POST['sponsors4']);
$sponsors5 = mysqli_real_escape_string($con, $_POST['sponsors5']);
$sponsors6 = mysqli_real_escape_string($con, $_POST['sponsors6']);
$sponsors7 = mysqli_real_escape_string($con, $_POST['sponsors7']);
$sponsors8 = mysqli_real_escape_string($con, $_POST['sponsors8']);
$bapdatetime = mysqli_real_escape_string($con, $_POST['bapdatetime']);
$baploc = mysqli_real_escape_string($con, $_POST['baploc']);
$bapriest = mysqli_real_escape_string($con, $_POST['bapriest']);
$bapemail = mysqli_real_escape_string($con, $_POST['bapemail']);
$bapcontact = mysqli_real_escape_string($con, $_POST['bapcontact']);
$baptype = mysqli_real_escape_string($con, $_POST['baptype']);
$reserveby = mysqli_real_escape_string($con, $_POST['reserveby']);
$bcert = mysqli_real_escape_string($con, $_POST['bcert']);


// Insert data into database
$query = "INSERT INTO BAPTISM (`catechumen_fname`, `catechumen_mname`, `catechumen_lname`, `date_of_birth`, `place_of_birth`, `nationality`, `father_fname`, `father_mname`, `father_lname`, `father_placeofbirth`, `father_address`, `father_civilstatus`, `mother_fname`, `mother_mname`, `mother_lname`, `mother_placeofbirth`, `mother_address`, `mother_civilstatus`, `p_sponsor(male)`, `p_sponsor(female)`, `sponsor_three`, `sponsor_four`, `sponsor_five`, `sponsor_six`, `sponsor_seven`, `sponsor_eight`, `date_time`, `place_of_baptism`, `priest`, `email`, `contact_no`, `sched_type`, `reserver_name`, `birth_cert`) 
VALUES ('$bapfname', '$bapmname', '$baplname', '$bapdbirth', '$bappbirth', '$bapnationality', '$ffname', '$fmname', '$flname', '$bapfpbirth', '$fresidence', '$bapfstatus', '$mfname', '$mmname', '$mlname', '$bapmpbirth', '$mresidence', '$bapmstatus', '$mpsponsors', '$fpsponsors', '$sponsors3', '$sponsors4', '$sponsors5', '$sponsors6', '$sponsors7', '$sponsors8', '$bapdatetime', '$baploc', '$bapriest', '$bapemail', '$bapcontact', '$baptype', '$reserveby', '$bcert')";


// Execute the query and check for errors
if (mysqli_query($con, $query)) {
    echo "Record added successfully.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

// Close connection
mysqli_close($con);
?>