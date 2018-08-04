<?php
// PW Change
$genkey =test1337;


if(empty($_GET['key']))
   {
    echo "wrong query input";
    header('HTTP/1.0 404 Not Found');
    exit(1);
   }

else
   {
    $key = $_GET['key'];
   }


if (strcmp($key,$genkey)==0)
      { 
	echo "Key OK! ";

	}

else
      {
	echo "Key Wrong! ";
	header('HTTP/1.0 404 Not Found'); //kein stream
        }

?>