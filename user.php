<?php 
    include 'connect.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name']; 
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password']; 

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $sql = "INSERT INTO `crud` (name, email, mobile, password) VALUES (?, ?, ?, ?)";
        
        // Create a prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $mobile, $hashed_password);

        // Execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // echo "Data inserted successfully";
            header('location:display.php');
        } else {
            die(mysqli_error($conn)); // Print error message if insertion fails
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>

    <!-- bootstrap link  -->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- bootstrap link  -->

</head>

<body>
    <div class="container my-5">
        <form method="post">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" required class="form-control" name="name" placeholder="enter your name">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" required autocomplete="off" class="form-control" name="email" placeholder="enter your email">
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="number" required autocomplete="off" class="form-control" name="mobile" placeholder="enter your mobile number">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" required autocomplete="off" class="form-control" name="password" placeholder="enter your password">
            </div>

            <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
        </form>
    </div>

</body>

</html>