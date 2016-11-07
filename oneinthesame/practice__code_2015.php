<?php

require 'doDBi.php';

$result = $doDB->query("SELECT * FROM users") or die($db->error);
if($result->num_rows) {
	echo 'yay';
}
else
{
if (!$result) echo $mysqli->error;

}
var_dump()
?>