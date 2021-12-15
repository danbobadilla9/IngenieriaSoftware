<?php
session_start();
unset($_SESSION["ticketid"]);
session_destroy();
header("Location: index.php");
?>
