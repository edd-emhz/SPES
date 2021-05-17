<?php

	function connectme() {
        $dbhost="localhost";
        $dbusername="root";
        $dbpassword="";
        $db=mysql_connect("$dbhost","$dbusername","$dbpassword");
        mysql_select_db("spesdb",$db) or die ("couldn't select databases");
        header("Content-Type: text/html; charset=ISO-8859-1");
    }

    function checkme() {
        session_start() ;
        if(!isset($_SESSION['userId'])) {
            header("location: adminIndex.php") ;
        }
    }
    
    function logout() {
        session_destroy() ;
        header("location: adminLogin.php") ;
    }

?>