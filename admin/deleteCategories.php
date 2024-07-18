<?php

if(isset($_GET['deleteCategories'])){
    $delete_id = $_GET['deleteCategories'];

    $delete_category = "DELETE FROM `categories` where category_id=$delete_id";
    $result = mysqli_query($conn, $delete_category);
    if($result){
        echo "<script>alert('Category deleted successfully');</script>";
        echo "<script>window.open('index.php','_self');</script>";
    }
}
?>