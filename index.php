<?php
include 'app/conn_db.php';
include 'app/functions.php';
include 'app/pages.php';
session_start();
define('ROOT', dirname(__DIR__));


//set session expiry after period of no use. 1 hour
$destryin = 3600; //seconds
if (time() >= ($_SESSION["start_time"] + $destryin)) {
    unset($_SESSION["start_time"]);
    session_destroy();
}
else{//reset the timer
    $_SESSION["start_time"] = time();
}

if(!empty($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = "home";   
}

require 'templates/header.php';
require 'templates/navigation.php';

if (!isset($_SESSION["user_id"])) { //go to log in page if session is not set
    require go_to_all("login");
}
else{ 
    if($_SESSION["first_login"] < 1) { //check if user has made a first login, if not redirect to first login page
        if($page == "logout"){
            require go_to_all("logout");
        }
        else{
            require go_to_all("first_login");
        }
    }
    else{
        if($_SESSION["admin"] < 1) { //access admin page if user has admin privilages
            require go_to_user($page);
        }
        else{
            require go_to_admin($page);
        }
    }
}
?>