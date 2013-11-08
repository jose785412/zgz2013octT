<?php

$config=array(
	'server'=>'localhost',
	'username'=>'root',
	'password'=>'',
	'db'=>'mydb'	
);

$linkWrite=mysql_connect($config['server'],
				$config['username'],
				$config['password']);

$linkRead=mysql_connect($config['server'],
		$config['username'],
		$config['password']);

mysql_select_db($config['db'],$linkRead);

$a=1;
$sql="SELECT * FROM users WHERE idusers=".$a;
$sql="SELECT * FROM users";


echo $sql;
$result=mysql_query($sql,$linkRead);

while($row=mysql_fetch_assoc($result))
{
	echo "<pre>";
	print_r($row);
	echo "</pre>";
}

mysql_close($linkRead);




// var_dump($linkRead);

// echo "<pre>link:";
// print_r($linkRead);
// echo "</pre>";










