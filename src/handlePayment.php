<!-- Rivan  -->
<?php
require_once('DBconnect.php');
if (isset($_POST['totalcost']) && isset($_POST['customeremail'])){
    $totalcost = $_POST['totalcost'];
    $conversionRate = 10; // 1 point per 10$ shopping
    $points = floor($totalcost / $conversionRate);
    $customeremail = $_POST['customeremail'];
    $query = "SELECT * FROM carts WHERE customeremail = '$customeremail'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $productId = $row['productId'];
            $selleremail = $row['selleremail'];
            $productamount = $row['productamount'];
            $price = $row['price'];
            $sellerRevenue = $productamount * $price;
            $updateSellerRevenue = "UPDATE sellers SET revenue = revenue + $sellerRevenue WHERE email = '$selleremail'";
            $sellerRevenueResult = mysqli_query($conn, $updateSellerRevenue);
            if (!$sellerRevenueResult) {
                echo "Error updating seller revenue for seller with email: $selleremail. Error: " . mysqli_error($conn);
            }
            // $productId = $row['productId'];
            // $updateCartCount = "UPDATE products SET cartcount = cartcount + 1 WHERE productId = '$productId'";
            // $cartCountResult = mysqli_query($conn, $updatecartcount);
            // if (!$cartCountResult) {
            //     echo "Error updating sell count for product with ID: $productId. Error: " . mysqli_error($conn);
            // }
        }
    } else {
        echo "Error fetching product IDs from cart. Error: " . mysqli_error($conn);
    }
    $query = "DELETE FROM carts WHERE customeremail = '$customeremail'";
    $result = mysqli_query($conn, $query);
    if ($result){
        $query = "UPDATE customers SET points = points + $points WHERE email = '$customeremail'";
        $result = mysqli_query($conn, $query);
        if ($result){
            header("Location: customerHome.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>