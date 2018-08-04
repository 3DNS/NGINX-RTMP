<?php
include("../includes/auth.php");
 header('Access-Control-Allow-Origin: *');
if (!isset($_GET["channel"])) exit;

$channel = $_GET["channel"];
$online = file_exists("state/" . $channel);
if($online)
{
    echo "Live | ";
} else {
    echo "Offline | ";
}

?>