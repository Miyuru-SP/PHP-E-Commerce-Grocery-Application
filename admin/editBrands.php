<?php

if(isset($_GET['editBrands'])){
    $edit_brand = $_GET['editBrands'];
    $get_brands = "SELECT * from `brands` where brand_id = $edit_brand";
    $result = mysqli_query($conn, $get_brands);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
}

if(isset($_POST['edit_brand'])){
    $brand_title = $_POST['brand_title'];

        // Update query
        $update_brand = "UPDATE `brands` SET brand_title='$brand_title' WHERE brand_id = $edit_brand";
        $result_update = mysqli_query($conn, $update_brand);
        if($result_update){
            echo "<script>alert('Brand updated successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }


?>

<div class="container-fluid">
    <div class="my-3 col-lg-12 col-xl-5 card mx-auto">
        <h2 class="text-center mt-3 mb-5">Edit Category</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-15">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-4 justify-content-center">
                        <label for="brand_title" class="col-sm-3 col-form-label">Category Title</label>
                        <div class="col-sm-6">
                            <input type="text" name="brand_title" id="brand_title" required="required" class="form-control" value="<?php echo $brand_title?>" autocomplete="off" >                            
                        </div>
                    </div>

                    <div class="mt-5 pt-2 mb-4 text-center">
                        <input type="submit" value="Update" class='btn btn-primary' name="edit_brand">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>