<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 8.0
 */
class Products extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM products;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getProduct($id)
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM products WHERE product_id=$id;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}