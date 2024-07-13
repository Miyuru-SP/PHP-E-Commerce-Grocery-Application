<?php
  include("..\includes\connect.php");

  if(isset($_POST['insert_brand'])){
    $brand_title = $_POST['brand_title'];

    //select data from db
    $select_query ="Select * from `brands` where brand_title='$brand_title'";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
      echo "<script>alert ('This brand already inserted')</script>";
    }else{
      $insert_query = "insert into `brands` (brand_title) values ('$brand_title')";
      $result = mysqli_query($conn, $insert_query);
  
      if($result){
        echo "<script>alert('Brand has been inserted successfully')</script>";
      }
    }
  }

?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">

  <div class="input-group mb-2 w-90">
      <span class="input-group-text" id="basic-addon1" style="margin-right:10px">
        <i class="fa-solid fa-receipt" ></i>
      </span>
      <input  style="margin-right:30px"  type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands">
      <div class="mb-2 w-90">
        <input type="submit" value="Insert Brand" name="insert_brand" class="btn btn-primary ">
        <!-- <button class="btn btn-primary ">Insert Brand</button> -->
      </div>
  </div>
    
  </div> 
</form>