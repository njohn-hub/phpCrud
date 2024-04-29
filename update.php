<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql= "Select * from `crud` where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "update `crud` set id=$id, name='$name',
     email='$email', mobile='$mobile', password='$password' where id=$id";
     $result= mysqli_query($conn, $sql);
     if($result){
        // echo "updated";
        header('location:display.php');
     }else {
        die(mysqli_error($conn));
     }
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
                <input type="text" required value="<?php echo $name ?>"
                class="form-control" name="name" 
                placeholder="enter your name">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" value="<?php echo $email ?>" required 
                autocomplete="off" class="form-control" 
                name="email" placeholder="enter your email">
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="number" required autocomplete="off" 
                value="<?php echo $mobile ?>"
                 class="form-control" name="mobile"
                  placeholder="enter your mobile number">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" required autocomplete="off"
                 class="form-control" name="password" value="<?php echo $password ?>"
                  placeholder="enter your password">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

</body>

</html>