<?php
session_start();
session_unset();
session_destroy();
header("Location: ../frontend/admin_login.html");
exit();
?>
