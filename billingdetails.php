<?php
session_start();
// Establish a connection to the database
$conn = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch billing details from the database
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM billing WHERE user_id = $userId";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Details</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2; /* Light gray background for table header */
        }
        .logo {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>

<h2>Billing Details</h2>

<table>
    <tr>
    <th>Billing ID</th>
        <th>Patient Name</th>
        <th>Medicine Name</th>
        <th>Medicine Size</th>
        <th>Amount</th>
        <th>Method</th>
    </tr>
    <?php
    // Check if there are any rows returned from the database
    if ($result) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["billno"] . "</td>";
            echo "<td>" . $row["patientname"] . "</td>";
            echo "<td>" . $row["medicinename"] . "</td>";
            echo "<td>" . $row["medicinesize"] . "</td>";
            echo "<td>" . $row["amount"] . "</td>";
            echo "<td>" . $row["method"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No billing details found</td></tr>";
    }
    ?>
</table>

</body>
</html>
