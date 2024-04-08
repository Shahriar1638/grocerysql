<?php
require_once('DBconnect.php');
if(isset($_POST['email']) && isset($_POST['password'])){
    $e = $_POST['email'];
    $p = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$e' AND password = '$p'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) !=0 ){
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];
        $username = $row['username']; 
        $email = $row['email'];
        setcookie('username', '', time() + (86400 * 30), "/");
        setcookie('username', $username, time() + (86400 * 30), "/");
        setcookie('email', '', time() + (86400 * 30), "/");
        setcookie('email', $email, time() + (86400 * 30), "/");
        // -----------
        if ($role == 'seller'){
            header("Location: sellerHome.php");
        }
        else if ($role == 'admin'){
            header("Location: adminHome.php");
        }
        else if ($role == 'customer'){
            header("Location: customerHome.php");
        }
    }
    else{
        header("Location: login.php");
    }
}
?>
