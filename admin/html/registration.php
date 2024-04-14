<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/solid.min.css" integrity="sha512-Hp+WwK4QdKZk9/W0ViDvLunYjFrGJmNDt6sCflZNkjgvNq9mY+0tMbd6tWMiAlcf1OQyqL4gn2rYp7UsfssZPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/solid.min.css" integrity="sha512-Hp+WwK4QdKZk9/W0ViDvLunYjFrGJmNDt6sCflZNkjgvNq9mY+0tMbd6tWMiAlcf1OQyqL4gn2rYp7UsfssZPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <img class="logo" src="../../images/logo-removebg-preview.png" alt="">
        </div>
        <ul>
           <a href="admin.html">
            <li><i class="fa-solid fa-bars"></i>&nbsp; <span >Dashboard</span> </li>
           </a>
            <a href="registration.html">
                <li><i class="fa-solid fa-file-pen"></i>&nbsp;<span>Registrations</span> </li>
            </a>
            <a href="addPatient.html">
                <li><i class="fa-solid fa-user-plus"></i>&nbsp;<span>Add Patient</span> </li>
            </a>
            <a href="history.html">
                <li><i class="fa-solid fa-notes-medical"></i>&nbsp;<span>History</span> </li>
            </a>
        </ul>
    </div>
    <div class="container">
    <?php
             $conn = new mysqli("localhost", "root", "", "hospital");
             $query = "SELECT * FROM users";
             $result = $conn->query($query);               
    ?>
        <div class="content">

            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>All Registrations</h2>

                    </div>
                    <table>
                        <thead>
                            <!-- <th>SN</th> -->
                            <th>Name</th>
                            <!-- <th>Registration Number</th> -->
                            <th>Email</th>
                            <!-- <th>Mobile</th>
                            <th>Time</th>
                            <th>Medical Issue</th>
                            <th>Doctor Name</th>
                            <th>Actions</th> -->
                        </thead>
                        <tbody>
                            <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "</tr>";
        }
    }
?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
          $('table').on('click', '.tick-btn', function() {
            $(this).closest('tr').css('background-color', '#EBDACB'); // Change the color as needed
          });
        });
        </script>
</body>

</html>