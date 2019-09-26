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
        $stmt = $db->query('SELECT * FROM product');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

}
