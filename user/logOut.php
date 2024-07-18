<?php

session_start();
session_unset();
session_destroy();
echo "<script>alert('Aser loged out')</script>";
echo "<script>window.open('/php/Ecommerce Web/index.php', '_self')</script>";

?>