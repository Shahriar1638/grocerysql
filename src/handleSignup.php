<?php 
require_once('DBconnect.php');
if (isset($_POST['role']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    $role = $_POST['role'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $points = 0;
    $sql = "INSERT INTO users (role, username, email, password, points) VALUES ('$role', '$username', '$email', '$password', '$points')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn)) {
        echo "New record created successfully";
        // header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>