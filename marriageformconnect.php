<?php
include('admin/config/dbcon.php'); // Ensure this file includes database connection credentials

// Create database connection
$con = new mysqli('localhost', 'u493132415_binary101', 'Pasiginae101!', 'u493132415_pasiginaenae'); // Replace with your DB name

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Retrieve form data
$mhname = mysqli_real_escape_string($con, $_POST['mhname']);
$mwname = mysqli_real_escape_string($con, $_POST['mwname']);
$mhbirth = mysqli_real_escape_string($con, $_POST['mhbirth']);
$mwbirth = mysqli_real_escape_string($con, $_POST['mwbirth']);
$mhpbirth = mysqli_real_escape_string($con, $_POST['mhpbirth']);
$mwpbirth = mysqli_real_escape_string($con, $_POST['mwpbirth']);
$mhciti = mysqli_real_escape_string($con, $_POST['mhciti']);
$mwciti = mysqli_real_escape_string($con, $_POST['mwciti']);
$mhsex = mysqli_real_escape_string($con, $_POST['mhsex']);
$mwsex = mysqli_real_escape_string($con, $_POST['mwsex']);
$mhresidence = mysqli_real_escape_string($con, $_POST['mhresidence']);
$mwresidence = mysqli_real_escape_string($con, $_POST['mwresidence']);
$mhreligion = mysqli_real_escape_string($con, $_POST['mhreligion']);
$mwreligion = mysqli_real_escape_string($con, $_POST['mwreligion']);
$mhstatus = mysqli_real_escape_string($con, $_POST['mhstatus']);
$mwstatus = mysqli_real_escape_string($con, $_POST['mwstatus']);
$mhnamefather = mysqli_real_escape_string($con, $_POST['mhnamefather']);
$mwnamefather = mysqli_real_escape_string($con, $_POST['mwnamefather']);
$mhcitizenshipfather = mysqli_real_escape_string($con, $_POST['mhcitizenshipfather']);
$mwcitizenshipfather = mysqli_real_escape_string($con, $_POST['mwcitizenshipfather']);
$mhnamemother = mysqli_real_escape_string($con, $_POST['mhnamemother']);
$mwnamemother = mysqli_real_escape_string($con, $_POST['mwnamemother']);
$mhcitizenshipmother = mysqli_real_escape_string($con, $_POST['mhcitizenshipmother']);
$mwcitizenshipmother = mysqli_real_escape_string($con, $_POST['mwcitizenshipmother']);
$mwitness = mysqli_real_escape_string($con, $_POST['mwitness']);
$fwitness = mysqli_real_escape_string($con, $_POST['fwitness']);
$mhwrelation = mysqli_real_escape_string($con, $_POST['mhwrelation']);
$fhwrelation = mysqli_real_escape_string($con, $_POST['fhwrelation']);
$mresidence = mysqli_real_escape_string($con, $_POST['mresidence']);
$fresidence = mysqli_real_escape_string($con, $_POST['fresidence']);
$gbaptismal = mysqli_real_escape_string($con, $_POST['gbaptismal']);
$bbaptismal = mysqli_real_escape_string($con, $_POST['bbaptismal']);
$ChCertificate = mysqli_real_escape_string($con, $_POST['ChCertificate']);
$CwCertificate = mysqli_real_escape_string($con, $_POST['CwCertificate']);
$hbirthcert = mysqli_real_escape_string($con, $_POST['hbirthcert']);
$wbirthcert = mysqli_real_escape_string($con, $_POST['wbirthcert']);
$hcenomar = mysqli_real_escape_string($con, $_POST['hcenomar']);
$wcenomar = mysqli_real_escape_string($con, $_POST['wcenomar']);
$reserveby = mysqli_real_escape_string($con, $_POST['reserveby']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$mnumber = mysqli_real_escape_string($con, $_POST['mnumber']);
$mnoguest = mysqli_real_escape_string($con, $_POST['mnoguest']);
$parish = mysqli_real_escape_string($con, $_POST['parish']);
$priest = mysqli_real_escape_string($con, $_POST['priest']);
$mdatetime = mysqli_real_escape_string($con, $_POST['mdatetime']);
$marriagetype = mysqli_real_escape_string($con, $_POST['marriagetype']);

// Insert data into database
$query = "INSERT INTO MATRIMONY (`groom_name`, `bride_name`, `dob_groom`, `dob_bride`, `pob_groom`, `pob_bride``, `citizenship_groom`, `citizenship_bride`, `gender_groom`, `gender_bride`, `address_groom`, `address_bride`, `religion_groom`, `religion_bride`, `status_groom`, `status_bride`, `fathername_groom``, `fathername_bride`, `fathercitizenship_groom`, `fathercitizenship_bride`, `mothername_groom`, `mothername_bride`, `mothercitizenship_groom`, `mothercitizenship_bride`, `witness_male`, `witness_female`, `relation_male`, `relation_female`, `address_male`, `address_female`, `baptismal_groom`, `baptismal_bride`, `confirmation_groom`, `confirmation_bride`, `birthcert_groom`, `birthcert_bride`, `cenomar_groom`, `cenomar_bride`, `reserver_name`, `email`, `phone_number`, `no_of_guest`, `parish`, `priest`, `date_time`, `event_type`) 
VALUES ('$mhname', '$mwname', '$mhbirth', '$mwbirth', '$mhpbirth', '$mwpbirth', '$mhciti', '$mwciti', '$mhsex', '$mwsex', '$mhresidence', '$mwresidence', '$mhreligion', '$mwreligion', '$mhstatus', '$mwstatus', '$mhnamefather', '$mwnamefather', '$mhcitizenshipfather', '$mwcitizenshipfather', '$mhnamemother', '$mwnamemother', '$mhcitizenshipmother', '$mwcitizenshipmother', '$mwitness', '$fwitness', '$mhwrelation', '$fhwrelation', '$mresidence', '$fresidence', '$gbaptismal', '$bbaptismal', '$ChCertificate', '$CwCertificate', '$hbirthcert', '$wbirthcert', '$hcenomar', '$wcenomar', '$reserveby', '$email', '$mnumber', '$mnoguest', '$parish', '$priest', '$mdatetime', '$marriagetype')";

// Execute the query and check for errors
if (mysqli_query($con, $query)) {
    echo "Record added successfully.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

// Close connection
mysqli_close($con);
?>