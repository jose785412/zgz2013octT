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
			$users=selectUsers($config);
			return $users;
		break;
		case 'txt';
			include_once('txts/usuarios.php');
			$users=readAllUsersFromFile($config);
			return $users;
		break;
	}
}

function readUser($id, $config)
{
	switch($config['adapter'])
	{
		case 'mysql';
			include_once('mysql/usuarios.php');
			$user=selectUser($id, $config);
			return $user;
		break;
		case 'txt';
			include_once('txts/usuarios.php');
			$user=readUserLine($id, $config);
			return $user;
		break;
	}
}

function writeUser($id, $user, $config)
{
	switch($config['adapter'])
	{
		case 'mysql';
			include_once('mysql/usuarios.php');
			updateUser($id, $user, $config);
			return;
		break;
		case 'txt';
			include_once('txts/usuarios.php');
			updateUserLine($user, $id, $user['filename'], $config);
			return;
		break;
	}
}

// function findByEmail($email, $config)


