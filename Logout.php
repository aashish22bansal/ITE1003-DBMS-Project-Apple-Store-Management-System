<?php
    session_start();
    session_destroy();

    echo "<script>window.open('HOME_PAGE.php','_self') </script>";
?>