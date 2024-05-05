<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['patient_id'])) {
    $pid = $_GET['patient_id'];
    // Query to fetch registration details from the user table
    $sql = "SELECT * FROM prescription WHERE p_id = $pid ORDER BY p_id DESC";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    // var_dump($row);
}

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
            <h2 class="text-center mt-2">Patient Details</h2>
            <div class="col">
                    <button class="btn btn-primary mb-2" onclick="print();">Print</button>
                <a href="pdf.php?patient_id=<?php echo $row['p_id'] ?>">
                    <button class="btn btn-success mb-2">Download</button>
                </a>
                <div class="card">
                    <div class="card-body">
                        <div class="row fw-bold">
                            <div class="col">Patient id</div>
                            <div class="col">Patient name</div>
                            <div class="col">Doctor name</div>
                            <div class="col">Issue</div>
                            <div class="col">Date</div>
                        </div>
                        <div class="row">
                            <div class="col"><?php echo $row['p_id']; ?></div>
                            <div class="col"><?php echo $row['fullname'] ?></div>
                            <div class="col"><?php echo $row['doctor_name'] ?></div>
                            <div class="col"><?php echo $row['issue'] ?></div>
                            <div class="col"><?php echo $row['date'] ?></div>
                        </div>
                        <div class="row fw-bold mt-2">
                            <div class="col">Registration number</div>
                            <!-- <div class="col">Drug id</div>  -->
                            <div class="col">Medicine</div>
                            <div class="col">Strength</div>
                            <div class="col">Size</div>
                        </div>
                        <div class="row">
                            <div class="col"><?php echo $row['registration_no'] ?></div>
                            <!-- <div class="col"><?php echo $row['drug_id'] ?></div> -->
                            <div class="col"><?php echo $row['medicine'] ?></div>
                            <div class="col"><?php echo $row['strength'] ?></div>
                            <div class="col"><?php echo $row['size'] ?></div>
                        </div>
                        <div class="row fw-bold mt-2">
                            <div class="col-2">Quantity</div>
                            <div class="col">Prescription</div>
                        </div>
                        <div class="row">
                            <div class="col-2"><?php echo $row['quantity'] ?></div>
                            <div class="col"><?php echo $row['instruction'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>