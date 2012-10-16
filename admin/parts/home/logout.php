<?php
$admin = new Admin();
$admin->logout();
header("Location: ".ADMIN_URL."/");
?>