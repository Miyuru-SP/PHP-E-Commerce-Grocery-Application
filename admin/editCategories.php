<?php

if(isset($_GET['editCategories'])){
    $edit_category = $_GET['editCategories'];
    $get_categories = "SELECT * from `categories` where category_id = $edit_category";
    $result = mysqli_query($conn, $get_categories);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
}

if(isset($_POST['edit_category'])){
    $category_title = $_POST['category_title'];

        // Update query
        $update_category = "UPDATE `categories` SET category_title='$category_title' WHERE category_id = $edit_category";
        $result_update = mysqli_query($conn, $update_category);
        if($result_update){
            echo "<script>alert('Category updated successfully')</script>";
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
                        <label for="category_title" class="col-sm-3 col-form-label">Category Title</label>
                        <div class="col-sm-6">
                            <input type="text" name="category_title" id="category_title" required="required" class="form-control" value="<?php echo $category_title?>" autocomplete="off" >                            
                        </div>
                    </div>

                    <div class="mt-5 pt-2 mb-4 text-center">
                        <input type="submit" value="Update" class='btn btn-primary' name="edit_category">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>