<?php
session_start();

// Establish a connection to the database
$conn = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the form
$patientname = $_POST['patientname'];
$medicinename = $_POST['medicinename'];
$medicinesize = $_POST['medicinesize'];
$amount = $_POST['amount'];
$method = $_POST['method'];
$user_id = $_SESSION['user_id'];
// var_dump($_SESSION['user_id']);

// Prepare SQL statement to insert data into the database
$sql = "INSERT INTO billing (user_id, patientname, medicinename, medicinesize, amount, method) 
        VALUES ($user_id, '$patientname', '$medicinename', '$medicinesize', '$amount', '$method')";

if ($conn->query($sql) === TRUE) {
    // Display success message using JavaScript alert
    echo '<script>alert("Billing successful!");</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    die();
}

$conn->close();
?>

<!-- Redirect to verified.html after displaying the message -->
<script>window.location.href = 'verified.html';</script>
