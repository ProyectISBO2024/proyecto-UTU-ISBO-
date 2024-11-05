<?php
session_start();
session_destroy();
header('Location: ?action=login');
exit;
?>
