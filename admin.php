<?php
$conn = new mysqli("localhost", "root", "", "hospital");

// Query to fetch data from the prescription table
$sql = "SELECT * FROM prescription ORDER BY p_id ASC";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search']) && !empty($_GET['query'])) {
    // Get the search query
    $searchQuery = $_GET['query'];

    // echo $searchQuery;
    // die();

    // Query to search for matching records in the prescription table
    $sql = "SELECT * FROM prescription WHERE fullname LIKE '%$searchQuery%' OR issue LIKE '%$searchQuery%' OR doctor_name LIKE '%$searchQuery%' ORDER BY p_id ASC";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../project/css/admin.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/solid.min.css"
        integrity="sha512-Hp+WwK4QdKZk9/W0ViDvLunYjFrGJmNDt6sCflZNkjgvNq9mY+0tMbd6tWMiAlcf1OQyqL4gn2rYp7UsfssZPA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/solid.min.css"
        integrity="sha512-Hp+WwK4QdKZk9/W0ViDvLunYjFrGJmNDt6sCflZNkjgvNq9mY+0tMbd6tWMiAlcf1OQyqL4gn2rYp7UsfssZPA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <img class="logo" src="../project/images/logo-removebg-preview.png" alt="">
        </div>
        <ul>
            <a href="admin.php">
                <li><i class="fa-solid fa-bars"></i>&nbsp; <span>Dashboard</span> </li>
            </a>
            <a href="registration.php">
                <li><i class="fa-solid fa-file-pen"></i>&nbsp;<span>Appointments</span> </li>
            </a>
            <a href="addPatient.html">
                <li><i class="fa-solid fa-user-plus"></i>&nbsp;<span>Add Patient</span> </li>
            </a>
            <a href="history.php">
                <li><i class="fa-solid fa-clock"></i>&nbsp;<span>History</span> </li>
            </a>
            <a href="user.php">
                <li><i class="fa-solid fa-users"></i>&nbsp;<span>Users</span> </li>
            </a><a href="billing.html">
                <li><i class="fa-solid fa-money-bill"></i>&nbsp;<span>Billing</span> </li>
            </a>

        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <form id="searchForm" method="GET" action="">
                        <input type="text" name="query" placeholder="Search.." id="searchInput">
                        <button type="submit" class="add-btn" id="searchButton"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="hidden" name="search" value="true">
                    </form>
                </div>


                <div class="user">
                    <a href="#">
                        <button class="add-new-btn">Add New</button>
                    </a>
                    <a href="logout.php ">
                        <button class="add-btn">Logout</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <!-- Your cards here -->
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>All Patient History</h2>
                        <a href="#">
                            <button class="add-btn">View All</button>
                        </a>
                    </div>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Registration Number</th>
                            <th>Medical Issue</th>
                            <th>Doctor Name</th>
                            <th>More Details</th>
                        </tr>
                        <?php

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["p_id"] . "</td>";
                                echo "<td>" . $row["fullname"] . "</td>";
                                echo "<td>" . $row["registration_no"] . "</td>";
                                echo "<td>" . $row["issue"] . "</td>";
                                echo "<td>" . $row["doctor_name"] . "</td>";
                                echo '<td>
                                <button class="detail-btn" onclick="fetchDetails(' . $row['p_id'] . ')">View</button>
                              </td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No data available</td></tr>";
                        }
                        // Close the database connection
                        $conn->close();
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function fetchDetails(p_id) {
            // Send an AJAX request to fetch data from the prescription table
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'view.php?p_id=' + p_id, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Update the content with the fetched data
                        document.getElementById('prescriptionDetails').innerHTML = xhr.responseText;
                    } else {
                        console.error('Error fetching data');
                    }
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>