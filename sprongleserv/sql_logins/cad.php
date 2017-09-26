<?php
require_once 'db_connect.php';

function ExecuteQuery($sql,$messag)
{
  $conn = OpenCon();

  if ($conn->query($sql) === TRUE)
  {
    return $name;
  }
  else {
    $error = "Error manipulating table" $conn->$error;
    CloseCon($conn);

    return $error;
  }

}

function ModifyTable($table,$columnname,$datatype)
{
  $query = "ALTER TABLE ". $table ." MODIFY COLUMN " . $columnname ." ". $datatype;

  $result = ExecuteQuery($query,"Column Modified Successfully");
  return $result;
}

function AddColumn($table,$columnname,$datatype)
{
  $query = "ALTER TABLE ". $table ." ADD ". $columnname ." ". $datatype;

  $result = ExecuteQuery($query,"Column Added Successfully");
  return $result;
}



 ?>
