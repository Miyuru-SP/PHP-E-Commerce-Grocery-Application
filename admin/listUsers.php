<h3 class="text-center">All Users</h3>
<table class="table table-bordered mt-5 px-3 mb-5">
    <thead class="text-center"> 
        <tr>
            <th style="background-color:#000000; color:white;">SI No</th>
            <th style="background-color:#000000; color:white;">User Name</th>
            <th style="background-color:#000000; color:white;">User Email</th>
            <th style="background-color:#000000; color:white;">User Image</th>
            <th style="background-color:#000000; color:white;">User Address</th>
            <th style="background-color:#000000; color:white;">Mobile Number</th>
        </tr>
    </thead>
    <tbody class="text-center">

    <?php
     
        $get_users = "SELECT * FROM `users`";
        $result = mysqli_query($conn, $get_users);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_address = $row['user_address'];
            $user_mobile = $row['user_mobile'];
            $number++;
    ?>
        <tr>
            <td><?php echo $user_id; ?></td>
            <td><?php echo $user_name; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><img src='../user/userImages/<?php echo $user_image; ?> ' class='profile_img'></td>
            <td><?php echo $user_address; ?></td>
            <td><?php echo $user_mobile; ?></td>
        </tr>
        <?php
}
        ?>
        </tbody>
    </table>
</body>
</html>