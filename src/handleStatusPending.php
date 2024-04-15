<?php
require_once('DBconnect.php');
if(isset($_POST['productid']) && isset($_POST['productstatus']) && isset($_POST['action'])){
    $productid = $_POST['productid'];
    $productstatus = $_POST['productstatus'];
    $action = $_POST['action'];
    if($action == 'approve'){
        $query = "UPDATE products SET status = 'published' WHERE productId = '$productid'";
        $result = mysqli_query($conn, $query);
        if($result){
            $query = "select selleremail from products where productId = '$productid'";
            $result = mysqli_query($conn, $query);
            if($result && mysqli_num_rows($result) > 0){
                $selleremail = mysqli_fetch_assoc($result)['selleremail'];
                echo $selleremail;
                $query = "UPDATE sellers set numOfApproved = numOfApproved + 1 where email = '$selleremail'";
                $result = mysqli_query($conn, $query);
                if($result){
                    header("Location: pendingItems.php");
                }else{
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            }else{
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }else{
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }else if($action == 'reject'){
        $query = "select selleremail from products where productId = '$productid'";
        $result = mysqli_query($conn, $query);
        if($result){
            $selleremail = mysqli_fetch_assoc($result)['selleremail'];
            echo $selleremail;
            $query = "DELETE FROM products WHERE productId = '$productid'";
            $result = mysqli_query($conn, $query);
            if($result){
                $query = "UPDATE sellers set numOfReject = numOfReject + 1 where email = '$selleremail'";
                $result = mysqli_query($conn, $query);
                if($result){
                    header("Location: pendingItems.php");
                }else{
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            }else{
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
    }}
}
?>