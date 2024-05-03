<?php
if(isset($_POST['submit'])){
    $conn = new mysqli("localhost", "root", "", "hospital");
    if($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
    }
    else{
        $query = ("SELECT * FROM user WHERE email = '{$_POST['email']}' AND password = '{$_POST['password']}'");

        $result = $conn->query($query);
        if($result->num_rows > 0)
        {
            if($row=mysqli_fetch_assoc($result))
            {
                session_start();
                $_SESSION['user_id'] = $row['id'];
                // var_dump($_SESSION['user_id'] = $row['id']);
                // die();
                if($row["role"] == 1)
                {
                    echo "<script>alert('admin');</script>";
                    header("Location: admin.html");
                }
                else if($row["role"] == 0)
                {
                    echo "<script>alert('user');</script>";
                    header("Location: verified.html");
                }
            }
            echo "login success";
        }else{
            echo "user not found";
        }
    }
}
?>