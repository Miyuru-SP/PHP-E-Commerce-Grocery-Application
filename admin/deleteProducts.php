<?php

if(isset($_GET['deleteProducts'])){
    $delete_id = $_GET['deleteProducts'];

    $delete_product = "DELETE FROM `products` where product_id=$delete_id";
    $result = mysqli_query($conn, $delete_product);
    if($result){
        echo "<script>alert('Product deleted successfully');</script>";
        echo "<script>window.open('index.php','_self');</script>";
    }
}
?>