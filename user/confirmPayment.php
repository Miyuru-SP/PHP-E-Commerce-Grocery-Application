<?php

include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    // echo $order_id;
    $select_data = "Select * from `orders` where order_id = $order_id";
    $result = mysqli_query($conn, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_no = $row_fetch['invoice_number'];
    $amount_due  = $row_fetch['amount_due'];
}

// if(isset($_POST['confirm_payment'])){
//     $invoice_no = $_POST['invoice_number'];
//     $amount = $_POST['amount'];
//     $payment_mode = $_POST['payment_mode'];
//     $insert_query = "INSERT INTO `payments` (order_id, invoice_number, amount, payment_mode) values = ($order_id,$invoice_no, $amount, '$payment_mode')";
//     $result = mysqli_query($conn, $insert_query);

//     if($result){
//         echo "<script>alert('Payment completed successfully!')</script>";
//         echo "<script>alert('../index.php?my_orders','_self')</script>";
//     }
//     $update_orders = "UPDATE `orders` SET order_status = 'Complete' where order_id = $order_id";
//     $result_order = mysqli_query($conn, $update_orders);

// }

if (isset($_POST['confirm_payment'])) {
    $invoice_no = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT INTO `payments` (order_id, invoice_number, amount, payment_mode) VALUES ($order_id, '$invoice_no', $amount, '$payment_mode')";
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo "<script>alert('Payment completed successfully!')</script>";
        echo "<script>window.open('../index.php?my_orders', '_self')</script>";
    }
    $update_orders = "UPDATE `orders` SET order_status = 'Complete' WHERE order_id = $order_id";
    $result_order = mysqli_query($conn, $update_orders);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }
        
        .navbar .dropdown-menu {
            left: auto;
            right: 0;
        }
        .profile_img{
            width: 100%;
            height:100%;
        }
        
        .footer {
            background-color: #f8f9fa; /* Example background color */
            padding: 10px;
            text-align: center;
            width: 100%;
        }
    </style>
    </head>
<body>
<div class="container-fluid" style="padding-top:50px;">
    <div class="my-3 col-lg-12 col-xl-5 card mx-auto">
        <h2 class="text-center mt-3 mb-5">Confirm Payment</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <form action="" method="post">
                    <div class="form-group row mb-4 justify-content-center">
                        <label for="invoice_no" class="col-sm-3 col-form-label">Invoice Number</label>
                        <div class="col-sm-5">
                            <input type="text" name="invoice_no" id="invoice_no" class="form-control" value="<?php echo $invoice_no ?>" autocomplete="off">                            
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="amount" class="col-sm-3 col-form-label">Amount (Rs.) </label>
                        <div class="col-sm-5">
                            <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $amount_due ?>" autocomplete="off"> 
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="payment_mode" class="col-sm-3 col-form-label">Payment Mode</label>
                        <div class="col-sm-5">
                            <select name="payment_mode" id="payment_mode" class="form-control">
                                <option disabled selected>Select Payment Mode</option>
                                <option>UPI</option>
                                <option>Netbanking</option>
                                <option>Paypal</option>
                                <option>Cash on Delivery</option>
                                <option>Payoffline</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-5 pt-2 mb-4 text-center">
                        <input type="submit" value="Confirm" class='btn btn-primary' name="confirm_payment">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>