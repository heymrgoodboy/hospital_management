<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch registration details from the user table
$sql = "SELECT * FROM prescription ORDER BY p_id DESC";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #f3f3f3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h2 class="text-center mt-2">Patient Medical History</h2>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Sl.no</th>
                                <th>Prescription ID</th>
                                <th>Patient name</th>
                                <th>Doctor name</th>
                                <td>Action</td>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    $count = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td>SMIT-HC-00<?php echo $row['p_id'];?></td>
                                            <td><?php echo $row['fullname'];?></td>
                                            <td><?php echo $row['doctor_name'];?></td>
                                            <td><a href="history-details.php?patient_id=<?php echo $row['p_id'] ?>">View</a></td>
                                        </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>