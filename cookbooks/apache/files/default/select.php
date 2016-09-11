<?php
$host        = "host=192.168.56.103";
$port        = "port=5432";
$dbname      = "dbname=swn";
$credentials = "user=pi password=security++";


$db = pg_connect("$host $port $dbname $credentials");
if (!$db)
  {
  echo "Error : Unable to open database\n";
  }

$sql ="SELECT * from devices";

$ret = pg_query($db, $sql);

if(!$ret){
      echo pg_last_error($db);
      exit;
} 

while($row = pg_fetch_row($ret)){
  echo $row[0] . " " . $row[1];
  echo "<br />";
  }

echo "Operation done successfully\n";
pg_close($db);
?>
