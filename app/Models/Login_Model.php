<?php
namespace App\Models;

use PDO;

class Login_Model extends \Core\Model
{



// public $errors = [];

// public function __construct($data)
// {
//     foreach ($data as $key => $value) {
//         $this->$key = $value;
//     }
// }



public function validate()
{

if ($this->admin_name == '') {
    $this->errors[] = 'Name is required';
}
    if (strlen($this->password) < 6) {
        $this->errors[] = "Please enter at least 6 characters for password";
    }

    if (preg_match('/.*[a-z]+.*/i', $this->password) == 0) {
        $this->errors[] = "Password needs at least one letter";
    }

    if (preg_match('/.*\d+.*/i', $this->password) == 0) {
        $this->errors[] = "Password needs at least one number";
    }
}

    /**
     * See if a user record already exists with the specified email
     *
     * @param string $email email address to search for
     * @param string $ignore_id Return false anyway if the record found has this ID
     *
     * @return boolean  True if a record already exists with the specified email, false otherwise
     */
    public static function nameExists($admin_name, $ignore_id = null)
    {
        $user = static::findByName($admin_name);

        if ($user) {
            if ($user->admin_id != $ignore_id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Find a user model by email address
     *
     * @param string $email email address to search for
     *
     * @return mixed User object if found, false otherwise
     */
    public static function findByName($admin_name)
    {
        $sql = 'SELECT * FROM tbl_admin  WHERE admin_name= :admin_name ' ;
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':admin_name', $admin_name, PDO::PARAM_STR_CHAR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     //* Authenticate a user by email and password.
     * Authenticate a user by email and password. User account has to be active.
     *
     * @param string $email email address
     * @param string $password password
     *
     * @return mixed  The user object or false if authentication fails
     */
    public static function authenticate($admin_name, $password)
    {
        $user = static::findByName($admin_name);
        if ($user) {

            if ($password === $user->admin_password) {

                return $user;
            }
        }
        return false;
    }

    /**
     * Find a user model by ID
     *
     * @param string $id The user ID
     *
     * @return mixed User object if found, false otherwise
     */
    public static function findByID($admin_id )
    {
        $sql = 'SELECT * FROM tbl_admin WHERE admin_id = :admin_id ';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':admin_id ', $admin_id , PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetch();
    }
}