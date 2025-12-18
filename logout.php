<?php
session_start();


$_SESSION = [];
session_unset();
session_destroy();


setcookie('id_admin', '', time() - 3600);
setcookie('kunci_rahasia', '', time() - 3600);


header("Location: admin_login.php");
exit;
?>