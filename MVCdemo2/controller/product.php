<?php
/**
 * 
 */
class product
{
	public $name;
	public $price;
	public $target;
	

	//set product name and price
	function setName($name)
	{
		$this->name = $name;
	}

	function setPrice($price)
	{
		$this->price = $price;
	}

	//get product info
	function getProduct()
	{
		echo $this->product_name;
		echo $this->price;
	}


}