<?php 
include_once './includes/config.php';
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include_once './includes/links.php'; ?>
        <SCRIPT type="text/javascript">
	window.history.forward();
	function noBack() { window.history.forward(); }
</SCRIPT>
    </head>
    <body>
        <?php
        // put your code here
        include_once './includes/deliveryboyheader.php';
        include_once './includes/deliveryboysidebar.php';
        ?>
        <?php include_once './includes/footerLinks.php'; ?>
    </body>
</html>
