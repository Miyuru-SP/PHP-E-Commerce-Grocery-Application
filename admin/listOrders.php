<h3 class="text-center">All Orders</h3>
<table class="table table-bordered mt-5 px-3 mb-5">
    <thead class="text-center"> 
        <tr>
            <th style="background-color:#000000; color:white;">SI No</th>
            <th style="background-color:#000000; color:white;">Due Amount</th>
            <th style="background-color:#000000; color:white;">Invoice Number</th>
            <th style="background-color:#000000; color:white;">Total Products</th>
            <th style="background-color:#000000; color:white;">Order Date</th>
            <th style="background-color:#000000; color:white;">Status</th>
        </tr>
    </thead>
    <tbody class="text-center">

    <?php
     
        $get_orders = "SELECT * FROM `orders`";
        $result = mysqli_query($conn, $get_orders);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $order_id = $row['order_id'];
            $due_amount = $row['amount_due'];
            $invoice_number = $row['invoice_number'];
            $total_products = $row['total_products'];
            $order_date = $row['order_date'];
            $status = $row['order_status'];
            $number++;
            $formatted_price = number_format($due_amount,2);
    ?>
        <tr>
            <td><?php echo $order_id; ?></td>
            <td>Rs. <?php echo $formatted_price; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $total_products; ?></td>
            <td><?php echo $order_date; ?></td>
            <td><?php echo $status; ?></td>
        </tr>
        <?php
}
        ?>
        </tbody>
    </table>
</body>
</html>