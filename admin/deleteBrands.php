<?php

if(isset($_GET['deleteBrands'])){
    $delete_id = $_GET['deleteBrands'];

    $delete_brand = "DELETE FROM `brands` where brand_id=$delete_id";
    $result = mysqli_query($conn, $delete_brand);
    if($result){
        echo "<script>alert('Brand deleted successfully');</script>";
        echo "<script>window.open('index.php','_self');</script>";
    }
}
?>