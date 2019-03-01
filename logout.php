<?php

session_start();
// session_unset($_SESSION['$username']);
unset($_SESSION['email']);
unset($_SESSION['msg']);
unset($_SESSION['type']);
unset($_SESSION['type']);
unset($_SESSION['msg']);
// unset($_SESSION['link']);
// unset($_SESSION['home']);
// $_SESSION['msg']="";
header("location:.");
?>
?>