<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "hospital");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $user_id = $_POST['user_id'];
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
   
    $Medicine = $_POST['Medicine'];
    $size = $_POST['size'];
    $Quantity = $_POST['Quantity'];
    $Strength = $_POST['Strength'];
    $Instructions = $_POST['Instructions'];

    // Construct the SQL query
    $sql = "INSERT INTO prescription (user_id, fullname, registration_no, time, date, email, phone_number, post, age, doctor_name, issue, medicine, strength, size, quantity, instruction) 
            VALUES ('$user_id', '$full_name', '$reg_number', '$time', '$date', '$email', '$phone_number', '$post', '$age', '$doctor', '$issue', '$Medicine', '$Strength', '$size', '$Quantity', '$Instructions')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
