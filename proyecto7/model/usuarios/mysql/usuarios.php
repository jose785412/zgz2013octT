<?php



function getLinkRead($config)
{
	$linkRead=mysqli_connect($config['database.server'],
			$config['database.username'],
			$config['database.password']);
	mysqli_select_db($linkRead,$config['database.db']);
	return $linkRead;
}

function getLinkWrite($config)
{
	$linkWrite=mysqli_connect($config['database.server'],
			$config['database.username'],
			$config['database.password']);
	mysqli_select_db($linkWrite,$config['database.db']);
	return $linkWrite;
}

/**
 * Read all users from text file into array
 * @return array users * 
 */
function selectUsers($config)
{
	$sql="SELECT * FROM users";
	$linkRead=getLinkRead($config);
	$result=mysqli_query($linkRead,$sql);
	
	while($row=mysqli_fetch_assoc($result))
	{
		$users[]=$row;
	}
	
	return $users;
}

function selectUser($id, $config)
{
	
	$linkRead=getLinkRead($config);
	
	$sql="SELECT * FROM users WHERE idusers=".$id;
	$result=mysqli_query($linkRead,$sql);
	
	$user=mysqli_fetch_array($result);
	
	return $user;
}

function updateUser($id, $user, $config)
{
	$linkWrite=getLinkRead($config);
	
	
// 	echo "<pre>";
// 	print_r($user);
// 	echo "</pre>";
	
	$cities=array('zgz'=>1);
	
	
	$sql="UPDATE users SET
				name='".$user['name']."',
				email='".$user['email']."',
				password='".$user['password']."',
				address='".$user['address']."',
				phone='".$user['phone']."',
				cities_idcities=".$cities[$user['cities']]."
		WHERE idusers=".$id;
		
// 	echo $sql;
	
	mysqli_query($linkWrite, $sql);
	
	return;	
	
}




















