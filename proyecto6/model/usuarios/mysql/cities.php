<?php


function getCities($config)
{
	$linkRead=getLinkRead($config);
	$sql="SELECT * FROM cities";
	$result=mysqli_query($linkRead, $sql);
	$rows=mysqli_fetch_assoc($result);
	return $rows;
}

function updateCities($id,$city, $config)
{
	$sql="UPDATE cities SET 
				city = '".$city['city']."'
			WHERE idcities = ".$id;
}




















