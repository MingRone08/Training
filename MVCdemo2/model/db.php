<?php

/**
 * 
 */
class dataBase
{
	protected $host_name;
	protected $user_name;
	protected $pass;
	protected $database;
	protected $link;
	
	function __construct()
	{
		$this->host_name = "localhost:3306";
		$this->user_name = "root";
		$this->pass = "";
		$this->database = "traning task 1";
	}

	function connectDB()
	{
		$this->link = mysqli_connect($this->host_name,$this->user_name,$this->pass,$this->database);
		if($this->link === false){
		   die("ERROR: Could not connect. " . mysqli_connect_error());
		}
	}

	function sqlQuery($sql){
		$result = mysqli_query($this->link, $sql);
		return $result;
	}

	function queryDB($id)
	{
		$sql = "select * from product where product_id='$id'";
		$result = mysqli_query($this->link, $sql);
		return $result;
	}

	function insertDB($p_name, $price, $image)
	{
		$sql = "INSERT INTO `product`(`product_name`, `price`, `image`) VALUES ('$p_name','$price','$image')";
		mysqli_query($this->link, $sql);
	}

	function deleteDB($id)
	{
		$sql = "DELETE FROM `product` WHERE product_id = '$id'";
		$result = mysqli_query($this->link, $sql);
		return $result;
	}
}