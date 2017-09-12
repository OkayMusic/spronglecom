<?php
if(!empty($_POST['data'])){
$data = $_POST['data'];
$file = fopen("data", 'a'); // Open the datafile
fwrite($file, $data);
fclose($file);
}
?>