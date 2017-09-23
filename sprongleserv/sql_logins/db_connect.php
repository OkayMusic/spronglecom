<?php
function OpenCon()
{
  $dbhost="localhost";
  $dbuser="spronglesetter";
  $dbpass="2";
  $dbname="sprongle";

  $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die("Connection failed: %s\n". $conn -> error);


  return $conn;
}


function CloseCon($conn)
{
  $conn -> close();
}

 ?>
