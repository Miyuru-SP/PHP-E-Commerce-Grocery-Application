<?php
include('./includes/connect.php');

function getProducts() {
    global $conn;

    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        $select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0, 12";
        $result_query = mysqli_query($conn, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_brands = $row['brand_id'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            $image_path = "./admin/productImages/$product_image";

            // Debugging output
            if (!file_exists($image_path)) {
                echo "Image file not found: $image_path<br>";
            }

            echo "
            <div class='col-md-3 mb-4'>
                <div class='card'>
                    <img src='$image_path' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?category_id=$product_category' class='btn btn-dark'>View more</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}

function getAllProducts() {
    global $conn;

    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        $select_query = "SELECT * FROM `products` ORDER BY RAND()";
        $result_query = mysqli_query($conn, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_brands = $row['brand_id'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            $image_path = "./admin/productImages/$product_image";

            // Debugging output
            if (!file_exists($image_path)) {
                echo "Image file not found: $image_path<br>";
            }

            echo "
            <div class='col-md-3 mb-4'>
                <div class='card'>
                    <img src='$image_path' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?category_id=$product_category' class='btn btn-dark'>View more</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}

function getUniqueCategories() {
    global $conn;

    if (isset($_GET['category'])) {
        $category_id = intval($_GET['category']); // Ensure it's an integer
        $select_query = "SELECT * FROM `products` WHERE category_id = $category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
            echo "<h2 class= 'text-center text-danger'>Sorry! No stock for this category</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_brands = $row['brand_id'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            $image_path = "./admin/productImages/$product_image";

            // Debugging output
            if (!file_exists($image_path)) {
                echo "Image file not found: $image_path<br>";
            }

            echo "
            <div class='col-md-3 mb-4'>
                <div class='card'>
                    <img src='$image_path' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?category_id=$product_category' class='btn btn-dark'>View more</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}

function getUniqueBrands() {
    global $conn;

    if (isset($_GET['brand'])) {
        $brand_id = ($_GET['brand']);
        $select_query = "SELECT * FROM `products` WHERE brand_id = $brand_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
            echo "<h2 class= 'text-center text-danger'>Sorry! This brand is not available </h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_brands = $row['brand_id'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            $image_path = "./admin/productImages/$product_image";

            // Debugging output
            if (!file_exists($image_path)) {
                echo "Image file not found: $image_path<br>";
            }

            echo "
            <div class='col-md-3 mb-4'>
                <div class='card'>
                    <img src='$image_path' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?category_id=$product_category' class='btn btn-dark'>View more</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}


function getBrands() {    
    global $conn;
    $select_brands = "SELECT * FROM `brands`";
    $result_brands = mysqli_query($conn, $select_brands);

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "
        <li class='nav-item'>
            <a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a>
        </li>";
    }
}

function getCategories() {
    global $conn;
    $select_categories = "SELECT * FROM `categories`";
    $result_categories = mysqli_query($conn, $select_categories);

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "
        <li class='nav-item'>
            <a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
        </li>";
    }
}

function searchProducts() {
    global $conn;

    if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM `products` where product_keyword like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);

        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0){
            echo "<h2 class= 'text-center text-danger'>No results matched! </h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_brands = $row['brand_id'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            $image_path = "./admin/productImages/$product_image";

            // Debugging output
            if (!file_exists($image_path)) {
                echo "Image file not found: $image_path<br>";
            }

            echo "
            <div class='col-md-3 mb-4'>
                <div class='card'>
                    <img src='$image_path' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?category_id=$product_category' class='btn btn-dark'>View more</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}

function viewMoreProducts() {
    global $conn;

    if (isset($_GET['category_id']) && !isset($_GET['category']) && !isset($_GET['brand'])) {
        $category_id = $_GET['category_id'];
        $select_query = "SELECT * FROM `products` where category_id = $category_id";
        $result_query = mysqli_query($conn, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_brands = $row['brand_id'];
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            $image_path = "./admin/productImages/$product_image";

            // Debugging output
            if (!file_exists($image_path)) {
                echo "Image file not found: $image_path<br>";
            }

            echo "
            <div class='col-md-3 mb-4'>
                <div class='card'>
                    <img src='$image_path' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?category_id=$category_id' class='btn btn-dark'>View more</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}
?>
