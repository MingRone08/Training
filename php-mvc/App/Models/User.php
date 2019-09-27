<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM product ORDER BY product_id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProduct($id)
    {
        $db = static::getDB();
        $result = $db->query("SELECT * FROM product WHERE product_id = '$id' ORDER BY product_id DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addProduct($name, $price, $image)
    {
        $db = static::getDB();
        $sql = "INSERT INTO `product`(`product_name`, `price`, `image`) VALUES ('$name', '$price', '$image')";
        if ($db->exec($sql) === false){
            echo "Can't";
        }
        else{
            $result = $db->query($sql);
        }
    }

    public static function deleteProduct($id)
    {
        $db = static::getDB();
        $sql = "DELETE FROM `product` WHERE product_id = $id";
        $db->query($sql);
    }

    public static function filterProduct()
    {
        $db = static::getDB();
        $sql = "SELECT * FROM product WHERE ";

        $exist = 0;

        /*function addAnd($check)
        {
            if($check > 0){
                global $sql;
                $sql  .= " AND ";
            }
        }*/

        if(isset($_POST['submit']))
        {
            $s_name = $_POST['s_name'];
            $s_from_id = $_POST['s_from_id'];
            $s_to_id = $_POST['s_to_id'];
            $s_from_price = $_POST['s_from_price'];
            $s_to_price = $_POST['s_to_price'];


            if(!empty($_POST['s_name'])){
                $exist++;
                $sql .= 'product_name LIKE "%' . $s_name .'%"';
            }
            if(!empty($_POST['s_from_id'])){
                if($exist > 0){
                   $sql  .= " AND "; 
                }
                $sql .= " product_id >= " . $s_from_id;
                $exist++;
            }
            if(!empty($_POST['s_to_id'])){
                if($exist > 0){
                   $sql  .= " AND "; 
                }
                $sql .= " product_id <= " . $s_to_id;
                $exist++;
            }
            if(!empty($_POST['s_from_price'])){
                if($exist > 0){
                   $sql  .= " AND "; 
                }
                $sql .= " price >= " . $s_from_price;
                $exist++;
            }
            if(!empty($_POST['s_to_price'])){
                if($exist > 0){
                   $sql  .= " AND "; 
                }
                $sql .= " price <= " . $s_to_price;
            }
        }

        $sql .= " ORDER BY product_id DESC";
        //echo $exist;
        //echo $sql;
        $result = $db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
        //$result1 = $result->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($result1);
    }

    public static function editProduct()
    {
        $db = static::getDB();
        $id = $_POST['id'];
        $res = User::getProduct($id);

        $new_product_name = $_POST['new_product_name'];
        $new_price = $_POST['new_price'];
        $target = "image/".basename($_FILES['new_image']['name']);
        $new_image = $_FILES['new_image']['name'];
        if( empty($new_image) ){
            $new_image = $res[0]['image'];
        }
        
        $sql = "UPDATE `product` SET `product_name`='$new_product_name',`price`='$new_price',`image`='$new_image' WHERE `product_id`='$id'";
        move_uploaded_file($_FILES['new_image']['tmp_name'], $target);
        $res = $db->query($sql);
    }
}