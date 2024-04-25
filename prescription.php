<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "hospital");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $full_name = $_POST['full_name'];
    $reg_number = $_POST['reg_number'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $post = $_POST['post'];
    $age = $_POST['age'];
    $doctor = $_POST['doctor'];
    $issue = $_POST['issue'];
    $drug_id = $_POST['drug_id'];
    $Medicine = $_POST['Medicine'];
    $size = $_POST['size'];
    $Quantity = $_POST['Quantity'];
    $Strength = $_POST['Strength'];
    $Instructions = $_POST['Instructions'];

    // Construct the SQL query
    $sql = "INSERT INTO prescription (fullname, registration_no, time, date, email, phone_number, post, age, doctor_name, issue, drug_id, medicine, strength, size, quantity, instruction) 
            VALUES ('$full_name', '$reg_number', '$time', '$date', '$email', '$phone_number', '$post', '$age', '$doctor', '$issue', '$drug_id', '$Medicine', '$Strength', '$size', '$Quantity', '$Instructions')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
