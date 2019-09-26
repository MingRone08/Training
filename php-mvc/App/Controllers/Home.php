<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
    	$productList = User::getAll();

        View::render('Home/index.phtml', $productList);
    }

  	public function addAction()
  	{
  		if (!isset($_POST['submit']))
  		{
  			View::render('Home/form-add-product.phtml');
  		}
  		else
  		{
  			$target = $target = "../Views/image/".basename($_FILES['image']['name']);
	  		$image = $_FILES['image']['name'];
	  		User::addProduct($_POST['Product_name'], $_POST['Price'], $image);
	  		$addProduct = User::getAll();
	  		View::render('Home/index.phtml', $addProduct);
  		}	
  	}
}
