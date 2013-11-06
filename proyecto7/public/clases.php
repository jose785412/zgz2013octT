<?php

define('MYSTATE', 88);

interface user
{
	public function getEmail();
	public function getPassword();
}


abstract class userClass implements user
{
	public $email;
	public $password;
	protected $username;
	public $state=self::STATE;
	const STATE = MYSTATE;
	
	
	abstract function validateUser();
	
	public function __construct()
	{
		echo "constructor user";
	}
	
	
	public function getEmail()
	{
		echo "concrete email";
	}
	
	public function getPassword()
	{
		echo "concrete password";	
	}
	
	public function createUser()
	{
		echo "esto createuser";
	}
	/*abstract function createUser();
	
	abstract function deleteUser();
	
	abstract function updateUser();
	
	abstract function getUser();
	
	abstract function changePassword();*/
	
	/**
	 * @param field_type $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}
		
	
}


abstract class jugadorClass extends userClass
{
	public function validateUser()
	{
		echo "validate concrete";
	}
	
	abstract function hacerdePortero();
}

class alumnClass implements user
{
	public $curse;
	
	public function getEmail()
	{
		echo "cascasc";
	}
	
	public function getPassword()
	{
		echo "asdklasjkl";
	}
	
	public function __construct($name)
	{
		echo "constructor del alumno";
		$this->username=$name;
		//parent::__construct();
	}
	
	public function __destruct()
	{
		echo "soy destructor alumno";
	}
	
	public function validateUser()
	{
		echo "validate concrete";
	}
	
	
	/*function addcurse();*/
}


class otroClass extends jugadorClass
{
	public function hacerdePortero()
	{
		echo "portero";
	}	

}



class escalador extends userClass implements user
{

	
	
	public function validateUser()
	{
		echo "concrete validate";	
	}

}


$escalador = new escalador();



echo "<pre>";
print_r($escalador);
echo "</pre>";





$cosa = new otroClass();
$cosa->hacerdePortero();


// $user = new userClass();


// var_dump($user);

// echo "<pre>";
// print_r($user);
// echo "</pre>";



$alumn = new alumnClass('caca');


echo "<pre>";
print_r($alumn);
echo "</pre>";



$alumn->name="agustin";
// $alumn->username="agustin";
// $alumn->setUsername('Benjamin');

$alumn2 = new alumnClass('sebastian');

//$alumn2->STATE;

echo "<pre>";
print_r($alumn);
echo "</pre>";


echo "<pre>";
print_r($alumn2);
echo "</pre>";




function cosasRaras(user $user)
{
	
	echo get_class($user);
	
			
	echo "<pre>ryyyyyyyyyyyyyyyyyyyyyyyyyy";
	print_r($user);
	echo "</pre>";
}


cosasRaras($alumn);

























