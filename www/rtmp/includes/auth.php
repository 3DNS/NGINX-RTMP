<?php
 header('Access-Control-Allow-Origin: *');
$url = "";

if (!isset($_GET["channel"])) exit;
	$channel = $_GET["channel"];

$StreamFLV = $url . "/flv?port=1935&app=" . $channel . "&stream=stream";
$StreamHLS = $url . "/live/" . $channel . "/hd/stream/index.m3u8";
$StreamState = $url . "/player/state/" . $channel;
?>