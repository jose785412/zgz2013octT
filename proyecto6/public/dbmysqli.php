<?php

$config=array(
	'server'=>'localhost',
	'username'=>'root',
	'password'=>'',
	'db'=>'mydb'	
);

$linkWrite=mysqli_connect($config['server'],
				$config['username'],
				$config['password']);

$linkRead=mysqli_connect($config['server'],
		$config['username'],
		$config['password']);

mysqli_select_db($linkRead,$config['db']);

$a=1;
$sql="SELECT * FROM users WHERE idusers=".$a;


echo $sql;
$result=mysqli_query($linkRead,$sql);

while($row=mysqli_fetch_($result))
{
	echo "<pre>";
	print_r($row);
	echo "</pre>";
}
// var_dump($linkRead);

// echo "<pre>link:";
// print_r($linkRead);
// echo "</pre>";



mysqli_close($linkRead);















