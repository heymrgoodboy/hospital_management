<?php
// Establish connection to the database
$conn = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a patient_id parameter passed via GET
$patient_id = $_GET['patient_id'];

// Retrieve patient information from the database
$sql = "SELECT * FROM appointment WHERE id = '$patient_id'";
$result = $conn->query($sql);

// Check if patient exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Store retrieved data into variables
    $full_name = $row['name'];
    $reg_number = $row['reg_no'];
    $time = $row['time'];
    $date = $row['date'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
   // $post = $row['post'];
    $age = $row['age'];
    //$doctor = $row['doctor'];
    $issue = $row['issue'];
    $user_id = $row['user_id'];
    // Assuming you have other fields in the patients table
    
    // Close the database connection
    $conn->close();
} else {
    echo "Patient not found";
    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Patient</title>
    <link rel="stylesheet" href="../project/css/admin.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="side-menu">
        <div class="side-menu">
            <div class="brand-name">
                <img class="logo" src="../project/images/logo-removebg-preview.png" alt="">
            </div>
            <ul>
               <a href="admin.html">
                <li><i class="fa-solid fa-bars"></i>&nbsp; <span >Dashboard</span> </li>
               </a>
                <a href="registration.php">
                    <li><i class="fa-solid fa-file-pen"></i>&nbsp;<span>Appointments</span> </li>
                </a>
                <a href="addPatient.html">
                    <li><i class="fa-solid fa-user-plus"></i>&nbsp;<span>Add Patient</span> </li>
                </a>
                <a href="history.html">
                    <li><i class="fa-solid fa-notes-medical"></i>&nbsp;<span>History</span> </li>
                </a>
                <a href="user.php">
                    <li><i class="fa-solid fa-notes-medical"></i>&nbsp;<span>Users</span> </li>
                </a>
                
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="content">
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Add New Patient</h2>
                    </div>
                    <div class="form-div">
                        <form action="prescription.php" method="POST">
                            <div class="d-flex">
                                <input class="input-form" type="text" name="user_id" value="<?php echo $user_id; ?>" hidden>
                                <input class="input-form" placeholder="Full Name" type="text" name="full_name" value="<?php echo $full_name; ?>">
                                <input placeholder="Registration Number" class="input-form" type="text" name="reg_number" value="<?php echo $reg_number; ?>">
                                <input placeholder="Time eg. 3:00 PM" class="input-form" type="text" name="time" value="<?php echo $time; ?>">
                            </div>
                            <div class="d-flex">
                                <input class="input-form" placeholder="Full Name" type="date" name="date" value="<?php echo $date; ?>">
                                <input placeholder="Email" class="input-form" type="text" name="email" value="<?php echo $email; ?>">
                                <input placeholder="Mobile Number" class="input-form" type="text" name="phone_number" value="<?php echo $phone_number; ?>">
                            </div>
                            <div class="d-flex">
                                <select id="post" class="input-form" name="post">
                                    <option value="Student" >Student</option>
                                    <option value="Faculty Staff" >Faculty Staff</option>
                                    <option value="Non-teaching Staff" >Non-teaching Staff</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <input class="input-form" placeholder="Age" type="text" name="age" value="<?php echo $age; ?>">
                                <select id="doctor" class="input-form" name="doctor">
                                    <option value="Dr. Ashish Sharma" >Dr. Ashish Sharma</option>
                                    <option value="Dr. Seedorf Rai" >Dr. Seedorf Rai</option>
                                    <option value="Dr. Ritesh Rapal" >Dr. Ritesh Rapal</option>
                                </select>
                            </div>
                            <div class="div-text">
                                <label for="issue">Issue:</label>
                                <textarea id="issue" placeholder="Write the Issues Here" name="issue" rows="10" cols="100"><?php echo $issue; ?></textarea>
                            </div>
                            <table>
                                <tr>
                                   
                                    <th>Name of the Medicine</th>
                                    <th>Strength</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Instructions</th>
                                </tr>
                                <tr>
                                    
                                    <td><input type="text" name="Medicine"></td>
                                    <td><input type="text" name="size"></td>
                                    <td><input type="text" name="Quantity"></td>
                                    <td><input type="text" name="Strength"></td>
                                    <td><input type="text" name="Instructions"></td>
                                </tr>
                            </table>
                            <div class="btn-div">
                                <button class="add-rows">Add More Rows</button>
                                <button type="submit" class="save-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-rows').click(function(e) {
                var newRow = `
                <tr>
                    <!-- Your table row content -->
                </tr>`;
                e.preventDefault();
                $('table').append(newRow);
            });
        });
    </script>
</body>
</html>

