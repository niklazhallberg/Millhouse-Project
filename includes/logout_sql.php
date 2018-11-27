<!-- destroy session to logg out user -->
<?php
session_start();
session_destroy();
header('location: /');
?>
