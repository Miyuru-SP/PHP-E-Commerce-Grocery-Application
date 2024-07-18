<?php

session_start();
session_unset();
session_destroy();
echo "<script>alert('admin loged out')</script>";
echo "<script>window.open('/php/Ecommerce Web/admin/adminLogin.php', '_self')</script>";

?>