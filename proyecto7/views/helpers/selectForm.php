<?php


// $data=array('zgz'=>'Zaragoza',
// 			'bcn'=>'Barcelona',
// 			'mad'=>'Madrid');

function selectForm($name, $data, $userdata)
{
	$html="<select name='".$name."'>";
	
	
	
	foreach($data as $key => $value)
	{
		$html.="<option value='".$key."' ";
		if(isset($userdata[$name]) && $key==$userdata[$name])
			$html.='selected';
		else 
			$html.='';
		
		$html.="> ";
			$html.=$value;			
		$html.="</option>";
	}
	
	
	$html.="</select>";
	return $html;
}
/*	<select name="cities">
		<option value="zgz" <?=(isset($user[10])&&'zgz'==$user[10])?'selected':'';?>>Zaragoza</option>
		<option value="bcn" <?=(isset($user[10])&&'bcn'==$user[10])?'selected':'';?>>Barcelona</option>
		<option value="mad" <?=(isset($user[10])&&'mad'==$user[10])?'selected':'';?>>Madrid</option>
	</select>
*/