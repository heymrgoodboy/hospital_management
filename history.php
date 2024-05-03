<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../project/css/admin.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/solid.min.css" integrity="sha512-Hp+WwK4QdKZk9/W0ViDvLunYjFrGJmNDt6sCflZNkjgvNq9mY+0tMbd6tWMiAlcf1OQyqL4gn2rYp7UsfssZPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/solid.min.css" integrity="sha512-Hp+WwK4QdKZk9/W0ViDvLunYjFrGJmNDt6sCflZNkjgvNq9mY+0tMbd6tWMiAlcf1OQyqL4gn2rYp7UsfssZPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
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
            <a href="history.php">
                <li><i class="fa-solid fa-notes-medical"></i>&nbsp;<span>History</span> </li>
            </a>
            <a href="user.php">
                <li><i class="fa-solid fa-notes-medical"></i>&nbsp;<span>Users</span> </li>
            </a>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit" class="add-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="user">
                    <a href="#">
                        <button class="add-new-btn">Add New</button>
                    </a>

                </div>
            </div>
        </div>
        <div class="content">

            <div class="content-2" style="margin-top: 100px;">
                <div class="recent-payments">
                    <div class="title">
                        <h2>All Registrations</h2>

                    </div>
                    <table>
                        <tr>
                            <th>Prescription ID</th>
                            <th>Name</th>
                            <th>Registration Number</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Time</th>
                            <th>Medical Issue</th>
                            <th>Doctor Name</th>
                        </tr>
                        <?php
        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "hospital");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch prescription details
        $sql = "SELECT * FROM prescription";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["p_id"] . "</td>";
                echo "<td>" . $row["fullname"] . "</td>";
                echo "<td>" . $row["registration_no"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone_number"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                echo "<td>" . $row["issue"] . "</td>";
                echo "<td>" . $row["doctor_name"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>0 results</td></tr>";
        }

        $conn->close();
        ?>
                        
                    </table>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>