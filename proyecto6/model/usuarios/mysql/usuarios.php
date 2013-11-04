<?php



/**
 * Read all users from text file into array
 * @return array users * 
 */
function readUsers($config)
{
	$sql="SELECT * FROM users";
	$linkRead=mysql_connect($config['database.server'],
				$config['database.username'],
				$config['database.password']);
	mysql_select_db($config['database.db'],$linkRead);
	$result=mysql_query($sql,$linkRead);
	
	while($row=mysql_fetch_assoc($result))
	{
		$users[]=$row;
	}
	
	return $users;
}




