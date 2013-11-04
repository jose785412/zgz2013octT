<?php


// function select($id, $config)

// function update($id, $user, $config)

// function delete($id, $config)

// function insert($user, $config)

function selectAllUsers($config)
{
	switch($config['adapter'])
	{
		case 'mysql';
			include_once('mysql/usuarios.php');
			$users=readUsers($config);
			return $users;
		break;
		case 'txt';
			include_once('txts/usuarios.php');
			$users=readAllUsersFromFile($config);
			return $users;
		break;
	}
}

// function findByEmail($email, $config)


