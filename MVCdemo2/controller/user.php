<?php

/**
 * 
 */
class user
{
	private var $user_name;
	private var $pass;
	
	function setUser($name, $pass)
	{
		$this->$user_name = $name;
		$this->$pass = $pass;
	}

	function getUser()
	{
		echo $this->user_name;
		echo $this->pass;
	}
}