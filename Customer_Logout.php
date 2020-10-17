<?php
    session_start();
    session_destroy();

    echo "<script>window.open('Customer_Login.php','_self') </script>";
?>