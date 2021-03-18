<?php 


	

	function dads($data)
	{
		return $data;
	}

	$data = array('user' => 'labofa',
				  'uas' => 'sms',
				 );

	$user = dads($data)['user'];

	echo $user;