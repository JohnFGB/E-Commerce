<?php

//ini sesi logout untuk user keluar dari halaman dan redirect ke halaman login
session_start();
session_destroy();
header('location:login.php');

?>