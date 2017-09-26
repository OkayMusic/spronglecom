<?php
require_once db_connect.php
function add_usr($email,$password,$hashkey)
{
  $conn = OpenCon();

  $query = $conn->prepare("INSERT INTO userdb(email, password, hash) VALUES (?,?,?)");
  $query->bind_param("sss",$email,$password,$hashkey);

  if($query->execute())
  {
    CloseCon($conn);
    return true;
  }
  else {
    return $conn->error;
  }
}

function query_usr_exist($email)
{
  $conn = OpenCon();

  $query = $conn->prepare("IF EXISTS (SELECT * FROM userdb WHERE email = ?) BEGIN
   CAST(1 AS BIT) END ELSE BEGIN CAST(0 AS BIT) END");
   $query->bind_param("s",$email);

   if($query->execute())
   {
     CloseCon($conn);
     return true;
   }
   else {
     CloseCon($conn);
     return false;
   }
}



?>
