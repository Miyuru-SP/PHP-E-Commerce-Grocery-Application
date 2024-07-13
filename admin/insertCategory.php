<?php
  include("..\includes\connect.php");

  if(isset($_POST['insert_cat'])){
    $category_title = $_POST['cat_title'];

    //select data from db
    $select_query ="Select * from `categories` where category_title='$category_title'";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
      echo "<script>alert ('This category already inserted')</script>";
    }else{
      $insert_query = "insert into `categories` (category_title) values ('$category_title')";
      $result = mysqli_query($conn, $insert_query);
  
      if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
      }
    }
  }

?>

<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">

  <div class="input-group mb-2 w-90">
      <span class="input-group-text" id="basic-addon1" style="margin-right:10px">
        <i class="fa-solid fa-receipt" ></i>
      </span>
      <input  style="margin-right:30px"  type="text" class="form-control" name="cat_title" placeholder="Insert Category">
      <div class="mb-2 w-90">
      <input type="submit" value="Insert Category" name="insert_cat" class="btn btn-primary ">
        <!-- <button class="btn btn-primary ">Insert Category</button> -->
      </div>
  </div>
    
  </div> 
</form>