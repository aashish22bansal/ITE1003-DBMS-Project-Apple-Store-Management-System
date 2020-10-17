<?php
    session_start();
    session_destroy();

    echo "<script>window.open('Admin_Login.php','_self') </script>";
?>