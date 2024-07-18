<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
</head>
<body>
    <h3 class="text-center">All Categories</h3>
    <table class="table table-bordered mt-5 px-3 mb-5">
        <thead class="text-center"> 
            <tr>
                <th style="background-color:#000000; color:white;">Serial No</th>
                <th style="background-color:#000000; color:white;">Category Title</th>
                <th style="background-color:#000000; color:white;">Edit</th>
                <th style="background-color:#000000; color:white;">Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">

        <?php        
        $get_products = "SELECT * FROM `categories`";
        $result = mysqli_query($conn, $get_products);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
            ?>
    
        <tr>
            <td><?php echo $category_id; ?></td>
            <td><?php echo $category_title; ?></td>
            <td>
                <a href='index.php?editCategories=<?php echo $category_id?>'><i class='fa-solid fa-pen-to-square'></i></a>
            </td>
            <td>
            <a href='index.php?deleteCategories=<?php echo $category_id?>'><i class='fa-solid fa-trash'></i></a>
            </td>
        </tr>
        <?php
}
        ?>
                    
        </tbody>
    </table>
</body>
</html>