<h3 class="text-center">All Payments</h3>
<table class="table table-bordered mt-5 px-3 mb-5">
    <thead class="text-center"> 
        <tr>
            <th style="background-color:#000000; color:white;">SI No</th>
            <th style="background-color:#000000; color:white;">Order ID</th>
            <th style="background-color:#000000; color:white;">Invoice Number</th>
            <th style="background-color:#000000; color:white;">Amount</th>
            <th style="background-color:#000000; color:white;">Payment Mode</th>
            <th style="background-color:#000000; color:white;">Date</th>
        </tr>
    </thead>
    <tbody class="text-center">

    <?php
     
        $get_payments = "SELECT * FROM `payments`";
        $result = mysqli_query($conn, $get_payments);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $payment_id = $row['payment_id'];
            $order_id = $row['order_id'];
            $invoice_number = $row['invoice_number'];
            $amount = $row['amount'];
            $payment_mode = $row['payment_mode'];
            $date = $row['date'];
            $number++;
            $formatted_price = number_format($amount,2);
    ?>
        <tr>
            <td><?php echo $payment_id; ?></td>
            <td><?php echo $order_id; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td>Rs. <?php echo $formatted_price; ?></td>
            <td><?php echo $payment_mode; ?></td>
            <td><?php echo $date; ?></td>
        </tr>
        <?php
}
        ?>
        </tbody>
    </table>
</body>
</html>