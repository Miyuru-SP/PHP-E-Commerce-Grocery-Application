<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
    .product_image {
        width: 80px; /* Set a fixed width */
        height: 80px; /* Set a fixed height */
        object-fit: contain;
    }
</style>

</head>
<body>
    <h3 class="text-center">All Products</h3>
    <table class="table table-bordered mt-5 px-3 mb-5">
        <thead class="text-center"> 
            <tr>
                <th style="background-color:#000000; color:white;">Product ID</th>
                <th style="background-color:#000000; color:white;">Product Title</th>
                <th style="background-color:#000000; color:white;">Product Image</th>
                <th style="background-color:#000000; color:white;">Product Price</th>
                <th style="background-color:#000000; color:white;">Total sold</th>
                <th style="background-color:#000000; color:white;">Status</th>
                <th style="background-color:#000000; color:white;">Edit</th>
                <th style="background-color:#000000; color:white;">Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">

        <?php


        
$get_products = "SELECT * FROM `products`";
$result = mysqli_query($conn, $get_products);
$number = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_image = $row['product_image'];
    $product_price = $row['product_price'];
    $status = $row['status'];
    $number++;
    $formatted_price = number_format($product_price,2);
    ?>

    
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='./productImages/<?php echo $product_image; ?>' class='product_image' /></td>
            <td>Rs. <?php echo $formatted_price; ?></td>
            <td>
                <?php
                    $get_count = "Select * from `orders_pending` where product_id = $product_id";
                    $result_count = mysqli_query($conn, $get_count);
                    $rows_count = mysqli_num_rows($result_count);
                    echo $rows_count;
                ?>
            </td>
            <td><?php echo $status; ?></td>
            <td>
                <a href='index.php?editProducts=<?php echo $product_id?>'><i class='fa-solid fa-pen-to-square'></i></a>
            </td>
            <td>
            <a href='index.php?deleteProducts=<?php echo $product_id?>'><i class='fa-solid fa-trash'></i></a>
            </td>
        </tr>
        <?php
}
        ?>


            
        </tbody>
    </table>
</body>
</html>