<?php
session_start();
session_destroy();
/* header('location:../index.php'); */
echo '<script>setTimeout(function() { window.location.href = "../index.php" }, 500);</script>';
?>