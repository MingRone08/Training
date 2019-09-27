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
  			$target = $target = "image/".basename($_FILES['image']['name']);
	  		$image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
	  		User::addProduct($_POST['Product_name'], $_POST['Price'], $image);
	  		header("location:Home",true,301);
  		}	
  	}

    public function deleteAction()
    {
      User::deleteProduct($_SESSION['params']);
      header("location:Home",true,301);
    }

    public function filterAction()
    {
      if(!isset($_POST['submit'])){
        View::render('Home/filter-form.phtml');
      }else{
        $result = User::filterProduct();
        //var_dump($result);
        View::render('Home/index.phtml', $result);
      }
    }

    public function editAction()
    {
      if(!isset($_POST['edited']))
      {
        $result = User::getProduct($_SESSION['params']);
        //var_dump($result);
        View::render('Home/edit-form.phtml', $result);
      }else
      {
        User::editProduct();
        header("location:Home",true,301);
      }
    }
}
