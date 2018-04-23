<?php
session_start();
session_destroy();
echo "<script>location='../../?eks=4';</script>";
?>